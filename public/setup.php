<?php

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Support\Facades\Artisan;

/**
 * OMF Code — Assistant de déploiement LWS (sans SSH)
 * ⚠️ Supprimez ce fichier une fois la configuration terminée !
 *
 * Accès : https://omfcode.com/setup.php?token=omf2024secret
 */
error_reporting(E_ALL);
ini_set('display_errors', '1');

define('SECRET_TOKEN', 'omf2024secret');

// Détection dynamique de la racine (que setup.php soit dans htdocs/ ou dans htdocs/public/)
define('ROOT', is_dir(__DIR__.'/vendor') ? __DIR__ : dirname(__DIR__));

if (($_GET['token'] ?? '') !== SECRET_TOKEN) {
    http_response_code(403);
    exit('<!DOCTYPE html><html><body style="font-family:sans-serif;background:#0f172a;color:#fff;display:flex;align-items:center;justify-content:center;height:90vh;margin:0;"><div style="background:#1e293b;padding:30px;border-radius:12px;border:1px solid #334155;text-align:center;"><h2 style="color:#ef4444;margin:0 0 10px;">Accès protégé</h2><p style="color:#94a3b8;margin:0 0 15px;">Ajoutez votre jeton secret à la fin de l\'URL :</p><code style="background:#0f172a;padding:8px 12px;border-radius:6px;color:#a855f7;">?token='.SECRET_TOKEN.'</code></div></body></html>');
}

$action = $_GET['action'] ?? 'home';
$messages = [];

function runArtisan(string $command): array
{
    $root = ROOT;

    if (function_exists('exec') && ! in_array('exec', array_map('trim', explode(',', (string) ini_get('disable_functions'))))) {
        $php = PHP_BINARY ?: 'php';
        $cmd = "$php $root/artisan $command 2>&1";
        @exec($cmd, $output, $code);
        if (! empty($output)) {
            return [
                'success' => ($code === 0),
                'method' => 'exec',
                'command' => "php artisan $command",
                'output' => implode("\n", $output),
            ];
        }
    }

    try {
        if (! file_exists($root.'/vendor/autoload.php')) {
            throw new Exception("Le dossier vendor/ est introuvable à : $root/vendor");
        }
        require_once $root.'/vendor/autoload.php';
        $app = require_once $root.'/bootstrap/app.php';

        $kernel = $app->make(Kernel::class);
        $kernel->bootstrap();

        $code = Artisan::call($command);
        $output = Artisan::output();

        return [
            'success' => ($code === 0),
            'method' => 'Artisan::call()',
            'command' => "Artisan::call('$command')",
            'output' => $output ?: '(Succès sans message)',
        ];
    } catch (Throwable $e) {
        return [
            'success' => false,
            'method' => 'erreur',
            'command' => "artisan $command",
            'output' => $e->getMessage(),
        ];
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save_db'])) {
    $envPath = ROOT.'/.env';
    if (file_exists($envPath)) {
        $envContent = file_get_contents($envPath);

        $replacements = [
            'DB_CONNECTION' => $_POST['db_connection'] ?? 'mysql',
            'DB_HOST' => $_POST['db_host'] ?? '127.0.0.1',
            'DB_PORT' => $_POST['db_port'] ?? '3306',
            'DB_DATABASE' => $_POST['db_database'] ?? '',
            'DB_USERNAME' => $_POST['db_username'] ?? '',
            'DB_PASSWORD' => $_POST['db_password'] ?? '',
            'APP_URL' => $_POST['app_url'] ?? 'https://omfcode.com',
            'APP_ENV' => 'production',
            'APP_DEBUG' => isset($_POST['app_debug']) ? 'true' : 'false',
        ];

        foreach ($replacements as $key => $val) {
            if (preg_match("/^#?\s*{$key}=.*/m", $envContent)) {
                $envContent = preg_replace("/^#?\s*{$key}=.*/m", "{$key}={$val}", $envContent);
            } else {
                $envContent .= "\n{$key}={$val}";
            }
        }

        file_put_contents($envPath, $envContent);
        $messages[] = ['type' => 'success', 'text' => 'Fichier .env mis à jour avec succès !'];
        $action = 'test_db';
    } else {
        $messages[] = ['type' => 'error', 'text' => '.env introuvable dans '.ROOT];
    }
}

$currentEnv = [];
if (file_exists(ROOT.'/.env')) {
    foreach (file(ROOT.'/.env', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $line) {
        if (str_starts_with(trim($line), '#') || ! str_contains($line, '=')) {
            continue;
        }
        [$k, $v] = explode('=', $line, 2);
        $currentEnv[trim($k)] = trim($v, " \t\n\r\0\x0B\"'");
    }
}

if ($action === 'check') {
    $checks = [
        'Version PHP >= 8.2' => [PHP_VERSION_ID >= 80200, 'Actuelle : '.PHP_VERSION],
        'Dossier vendor/ présent' => [is_dir(ROOT.'/vendor'), is_dir(ROOT.'/vendor') ? 'Trouvé' : 'MANQUANT'],
        'Fichier .env présent' => [file_exists(ROOT.'/.env'), file_exists(ROOT.'/.env') ? 'Trouvé' : 'MANQUANT'],
        'Dossier storage/ inscriptible' => [is_writable(ROOT.'/storage'), is_writable(ROOT.'/storage') ? 'Inscriptible' : 'Exécutez Permissions'],
        'Dossier bootstrap/cache inscriptible' => [is_writable(ROOT.'/bootstrap/cache'), is_writable(ROOT.'/bootstrap/cache') ? 'Inscriptible' : 'Exécutez Permissions'],
        'Extension PDO' => [extension_loaded('pdo'), extension_loaded('pdo') ? 'Activée' : 'Désactivée'],
        'Extension PDO MySQL' => [extension_loaded('pdo_mysql'), extension_loaded('pdo_mysql') ? 'Activée' : 'Désactivée'],
        'Extension OpenSSL' => [extension_loaded('openssl'), extension_loaded('openssl') ? 'Activée' : 'Désactivée'],
        'Extension Mbstring' => [extension_loaded('mbstring'), extension_loaded('mbstring') ? 'Activée' : 'Désactivée'],
    ];
    foreach ($checks as $title => [$ok, $desc]) {
        $messages[] = ['type' => $ok ? 'success' : 'error', 'text' => "<strong>$title</strong> : $desc"];
    }
}

if ($action === 'test_db') {
    $driver = $currentEnv['DB_CONNECTION'] ?? 'mysql';
    if ($driver === 'sqlite') {
        $dbPath = ROOT.'/database/'.($currentEnv['DB_DATABASE'] ?? 'database.sqlite');
        $messages[] = file_exists($dbPath)
            ? ['type' => 'success', 'text' => "Base SQLite trouvée : $dbPath"]
            : ['type' => 'error', 'text' => "Fichier SQLite introuvable : $dbPath"];
    } else {
        $host = $currentEnv['DB_HOST'] ?? '127.0.0.1';
        $port = $currentEnv['DB_PORT'] ?? '3306';
        $db = $currentEnv['DB_DATABASE'] ?? '';
        $user = $currentEnv['DB_USERNAME'] ?? '';
        $pass = $currentEnv['DB_PASSWORD'] ?? '';

        try {
            $dsn = "mysql:host=$host;port=$port;dbname=$db;charset=utf8mb4";
            $pdo = new PDO($dsn, $user, $pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_TIMEOUT => 5]);
            $tables = $pdo->query('SHOW TABLES')->fetchAll(PDO::FETCH_COLUMN);
            $messages[] = ['type' => 'success', 'text' => 'Connexion MySQL réussie ! ('.count($tables)." table(s) dans `$db`)."];
        } catch (PDOException $e) {
            $messages[] = ['type' => 'error', 'text' => 'Erreur MySQL : '.htmlspecialchars($e->getMessage())];
        }
    }
}

if ($action === 'key_generate') {
    if (empty($currentEnv['APP_KEY']) || $currentEnv['APP_KEY'] === 'SomeRandomString') {
        $key = 'base64:'.base64_encode(random_bytes(32));
        $envPath = ROOT.'/.env';
        if (file_exists($envPath)) {
            $env = file_get_contents($envPath);
            $env = preg_match('/^APP_KEY=.*/m', $env) ? preg_replace('/^APP_KEY=.*/m', "APP_KEY=$key", $env) : $env."\nAPP_KEY=$key";
            file_put_contents($envPath, $env);
            $messages[] = ['type' => 'success', 'text' => "Nouvelle clé générée dans .env : <code>$key</code>"];
        }
    } else {
        $messages[] = ['type' => 'success', 'text' => 'APP_KEY déjà configurée.'];
    }
}

if ($action === 'permissions') {
    $dirs = [
        ROOT.'/storage', ROOT.'/storage/app', ROOT.'/storage/app/public',
        ROOT.'/storage/framework', ROOT.'/storage/framework/cache', ROOT.'/storage/framework/cache/data',
        ROOT.'/storage/framework/sessions', ROOT.'/storage/framework/views',
        ROOT.'/storage/logs', ROOT.'/bootstrap/cache',
    ];
    foreach ($dirs as $dir) {
        if (! is_dir($dir)) {
            @mkdir($dir, 0775, true);
        }
        @chmod($dir, 0775);
    }
    $messages[] = ['type' => 'success', 'text' => 'Dossiers storage et cache passés en écriture (0775).'];
}

if ($action === 'storage_link') {
    $target = ROOT.'/storage/app/public';
    $link = ROOT.'/public/storage';
    if (! is_dir($target)) {
        @mkdir($target, 0775, true);
    }

    if (file_exists($link) || is_link($link)) {
        $messages[] = ['type' => 'success', 'text' => 'Le lien storage existe déjà.'];
    } else {
        if (@symlink($target, $link)) {
            $messages[] = ['type' => 'success', 'text' => 'Lien symbolique public/storage créé.'];
        } else {
            $r = runArtisan('storage:link');
            $messages[] = ['type' => $r['success'] ? 'success' : 'warn', 'text' => htmlspecialchars($r['output'])];
        }
    }
}

if ($action === 'migrate') {
    $r = runArtisan('migrate --force');
    $messages[] = [
        'type' => $r['success'] ? 'success' : 'error',
        'text' => '<strong>Migration :</strong><pre>'.htmlspecialchars($r['output']).'</pre>',
    ];
}

if ($action === 'clear_cache') {
    $res = [];
    foreach (['optimize:clear', 'config:clear', 'cache:clear', 'view:clear', 'route:clear'] as $cmd) {
        $r = runArtisan($cmd);
        $res[] = "<strong>$cmd</strong>: ".htmlspecialchars($r['output']);
    }
    $messages[] = ['type' => 'success', 'text' => implode('<br>', $res)];
}

if ($action === 'optimize') {
    $res = [];
    foreach (['config:cache', 'route:cache', 'view:cache'] as $cmd) {
        $r = runArtisan($cmd);
        $res[] = "<strong>$cmd</strong>: ".htmlspecialchars($r['output']);
    }
    $messages[] = ['type' => 'success', 'text' => implode('<br>', $res)];
}

if ($action === 'self_destruct') {
    foreach ([ROOT.'/setup.php', ROOT.'/public/setup.php', __FILE__] as $f) {
        if (file_exists($f)) {
            @unlink($f);
        }
    }
    exit('<!DOCTYPE html><html><body style="font-family:sans-serif;background:#0f172a;color:#fff;display:flex;align-items:center;justify-content:center;height:90vh;margin:0;"><div style="background:#1e293b;padding:30px;border-radius:12px;text-align:center;"><h2 style="color:#22c55e;">Sécurité activée</h2><p style="color:#94a3b8;">Le script setup.php a été supprimé.</p><a href="/" style="display:inline-block;padding:10px 20px;border-radius:8px;background:#7c3aed;color:#fff;text-decoration:none;">Aller sur le site</a></div></body></html>');
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Assistant Déploiement LWS — OMF Code</title>
<style>
  * { box-sizing: border-box; }
  body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; background: #0b0f19; color: #f1f5f9; margin: 0; padding: 24px 16px; }
  .container { max-width: 900px; margin: 0 auto; }
  .header { display: flex; align-items: center; justify-content: space-between; margin-bottom: 24px; padding-bottom: 16px; border-bottom: 1px solid #1e293b; }
  h1 { font-size: 24px; font-weight: 700; color: #a855f7; margin: 0; }
  .badge { background: #7c3aed22; color: #c084fc; border: 1px solid #7c3aed44; padding: 4px 10px; border-radius: 999px; font-size: 12px; }
  .card { background: #131b2e; border: 1px solid #1e293b; border-radius: 12px; padding: 20px; margin-bottom: 20px; }
  .card-title { font-size: 16px; font-weight: 600; color: #e2e8f0; margin-top: 0; margin-bottom: 14px; }
  .grid-steps { display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 10px; }
  .btn { display: inline-flex; align-items: center; justify-content: center; padding: 10px 14px; border-radius: 8px; font-size: 13px; font-weight: 600; text-decoration: none; cursor: pointer; border: none; color: white; background: #334155; }
  .btn:hover { opacity: 0.9; }
  .btn-primary { background: #7c3aed; } .btn-success { background: #16a34a; } .btn-danger { background: #dc2626; }
  .alert { padding: 12px 16px; border-radius: 8px; margin-bottom: 12px; font-size: 13px; }
  .alert-success { background: #064e3b44; border: 1px solid #059669; color: #6ee7b7; }
  .alert-error { background: #7f1d1d44; border: 1px solid #dc2626; color: #fca5a5; }
  .alert-warn { background: #78350f44; border: 1px solid #d97706; color: #fcd34d; }
  pre { background: #0a0e17; padding: 12px; border-radius: 6px; font-size: 12px; overflow-x: auto; color: #94a3b8; }
  code { font-size: 12px; color: #c084fc; }
  .form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; }
  .form-group { display: flex; flex-direction: column; gap: 4px; }
  .form-group.full { grid-column: span 2; }
  label { font-size: 12px; font-weight: 600; color: #94a3b8; }
  input { background: #0a0e17; border: 1px solid #334155; border-radius: 6px; color: #f1f5f9; padding: 8px 12px; font-size: 13px; }
</style>
</head>
<body>
<div class="container">
  <div class="header">
    <div>
      <h1>⚡ OMF Code — Déploiement LWS</h1>
      <small style="color:#64748b;">Tout dans <code>htdocs/</code></small>
    </div>
    <span class="badge">Racine : <?= htmlspecialchars(ROOT) ?></span>
  </div>

  <?php if ($messages) { ?>
  <div class="card">
    <div class="card-title">📋 Résultat</div>
    <?php foreach ($messages as $m) { ?>
      <div class="alert alert-<?= $m['type'] ?>"><?= $m['text'] ?></div>
    <?php } ?>
  </div>
  <?php } ?>

  <div class="card">
    <div class="card-title">🚀 Actions rapides</div>
    <div class="grid-steps">
      <a class="btn" href="?token=<?= SECRET_TOKEN ?>&action=check">1. Vérifications</a>
      <a class="btn" href="?token=<?= SECRET_TOKEN ?>&action=permissions">2. Permissions</a>
      <a class="btn" href="?token=<?= SECRET_TOKEN ?>&action=key_generate">3. Clé APP_KEY</a>
      <a class="btn" href="?token=<?= SECRET_TOKEN ?>&action=storage_link">4. Storage Link</a>
      <a class="btn btn-primary" href="?token=<?= SECRET_TOKEN ?>&action=migrate">5. Migrer Base BDD</a>
      <a class="btn" href="?token=<?= SECRET_TOKEN ?>&action=clear_cache">6. Vider Caches</a>
      <a class="btn btn-success" href="?token=<?= SECRET_TOKEN ?>&action=optimize">7. Optimiser Prod</a>
    </div>
  </div>

  <div class="card">
    <div class="card-title">🗄️ Configuration Base de Données (MySQL LWS)</div>
    <form method="POST" action="?token=<?= SECRET_TOKEN ?>">
      <div class="form-grid">
        <div class="form-group">
          <label>Type de base (DB_CONNECTION)</label>
          <input type="text" name="db_connection" value="<?= htmlspecialchars($currentEnv['DB_CONNECTION'] ?? 'mysql') ?>" required>
        </div>
        <div class="form-group">
          <label>Serveur MySQL (DB_HOST)</label>
          <input type="text" name="db_host" value="<?= htmlspecialchars($currentEnv['DB_HOST'] ?? '127.0.0.1') ?>" required>
        </div>
        <div class="form-group">
          <label>Port (DB_PORT)</label>
          <input type="text" name="db_port" value="<?= htmlspecialchars($currentEnv['DB_PORT'] ?? '3306') ?>" required>
        </div>
        <div class="form-group">
          <label>Nom de la base (DB_DATABASE)</label>
          <input type="text" name="db_database" value="<?= htmlspecialchars($currentEnv['DB_DATABASE'] ?? '') ?>" required>
        </div>
        <div class="form-group">
          <label>Utilisateur MySQL (DB_USERNAME)</label>
          <input type="text" name="db_username" value="<?= htmlspecialchars($currentEnv['DB_USERNAME'] ?? '') ?>" required>
        </div>
        <div class="form-group">
          <label>Mot de passe MySQL (DB_PASSWORD)</label>
          <input type="password" name="db_password" value="<?= htmlspecialchars($currentEnv['DB_PASSWORD'] ?? '') ?>">
        </div>
        <div class="form-group full">
          <label>URL du site (APP_URL)</label>
          <input type="text" name="app_url" value="<?= htmlspecialchars($currentEnv['APP_URL'] ?? 'https://omfcode.com') ?>" required>
        </div>
      </div>
      <div style="margin-top:16px;display:flex;gap:10px;">
        <button type="submit" name="save_db" class="btn btn-primary">Enregistrer & Tester connexion</button>
        <a class="btn" href="?token=<?= SECRET_TOKEN ?>&action=test_db">Tester connexion actuelle</a>
      </div>
    </form>
  </div>

  <div class="card" style="border-color:#dc262644;">
    <div class="card-title" style="color:#f87171;">🔒 Fin de configuration & Sécurité</div>
    <a class="btn btn-danger" onclick="return confirm('Confirmez-vous la suppression de setup.php ?')" href="?token=<?= SECRET_TOKEN ?>&action=self_destruct">🗑️ Supprimer setup.php du serveur</a>
    <a class="btn btn-success" href="/" target="_blank" style="margin-left:8px;">Voir le site en direct ↗</a>
  </div>
</div>
</body>
</html>
