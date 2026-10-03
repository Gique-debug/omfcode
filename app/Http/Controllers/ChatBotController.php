<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ChatBotController extends Controller
{
    // Prompt système qui donne son contexte à l'IA
    private string $systemPrompt = <<<'PROMPT'
Tu es l'assistant IA officiel de OMF <code/> (Ousmane Martial & Faissal), une agence de solutions numériques basée à Ouagadougou, Burkina Faso.
Tu dois répondre UNIQUEMENT dans le contexte de l'agence OMF et de ses services.
Sois chaleureux, professionnel et concis (3-5 phrases max sauf si on demande des détails).

SERVICES DISPONIBLES :
- Développement web (sites vitrine, e-commerce, applications web)
- Développement mobile (iOS, Android)
- Design & Identité visuelle (logos, chartes graphiques, UI/UX)
- Intelligence Artificielle & Automatisation
- Conseil & Audit numérique
- Formation digitale

RÈGLES ABSOLUES :
1. Prix/tarif/coût → Dis que les tarifs varient selon le projet et propose de [demander un devis](/devis)
2. Question hors-sujet → Invite à [envoyer un message](/contact)
3. Rendez-vous → Lien : [Prendre rendez-vous](/rendez-vous)
4. Réalisations → Lien : [Voir nos réalisations](/realisations)
5. Blog → Lien : [Lire notre blog](/blog)
6. TOUJOURS répondre en français. Ne jamais citer de concurrents.
7. Ne jamais inventer de prix ou de délais précis.
PROMPT;

    public function chat(Request $request)
    {
        $request->validate(['message' => 'required|string|max:500']);

        $userMessage = $request->input('message');
        $history = $request->input('history', []);

        try {
            // Construire les messages pour l'API
            $messages = [
                ['role' => 'system', 'content' => $this->systemPrompt],
            ];

            // Ajouter l'historique (limité aux 10 derniers échanges pour éviter les tokens excessifs)
            $recentHistory = array_slice($history, -10);
            foreach ($recentHistory as $msg) {
                if (isset($msg['role'], $msg['content'])) {
                    $messages[] = ['role' => $msg['role'], 'content' => $msg['content']];
                }
            }

            // Ajouter le message de l'utilisateur
            $messages[] = ['role' => 'user', 'content' => $userMessage];

            // Groq API — 100% gratuit, ultra-rapide
            $response = Http::withToken(env('GROQ_API_KEY'))
                ->timeout(15)
                ->post('https://api.groq.com/openai/v1/chat/completions', [
                    'model' => 'llama-3.1-8b-instant',  // ~500ms — ultra-rapide
                    'messages' => $messages,
                    'max_tokens' => 400,
                    'temperature' => 0.6,
                ]);

            if ($response->successful()) {
                $data = $response->json();
                $reply = $data['choices'][0]['message']['content'] ?? null;

                // Nettoyer les balises <think>...</think> si présentes
                if ($reply) {
                    $reply = preg_replace('/<think>.*?<\/think>/s', '', $reply);
                    $reply = trim($reply);
                }

                $reply = $reply ?: 'Je suis désolé, je n\'ai pas pu formuler une réponse. Veuillez [nous contacter directement](/contact).';
            } else {
                $errorBody = $response->json();
                $errorMsg = '';
                if (is_array($errorBody)) {
                    $errorMsg = $errorBody['error']['message'] ?? ($errorBody['error'] ?? '');
                }

                if (is_string($errorMsg) && (str_contains($errorMsg, 'rate_limit') || str_contains($errorMsg, 'quota'))) {
                    $reply = 'Je suis momentanément très sollicité 🙏 Réessayez dans quelques instants ou [envoyez-nous un message](/contact).';
                } else {
                    $reply = 'Je rencontre une difficulté technique. Veuillez [nous envoyer un message](/contact) ou [prendre rendez-vous](/rendez-vous).';
                }
            }
        } catch (\Exception $e) {
            Log::error('Groq API Exception', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            $reply = 'Je rencontre une difficulté technique. Veuillez [nous envoyer un message](/contact) ou [prendre rendez-vous](/rendez-vous).';
        }

        return response()->json(['reply' => $reply]);
    }
}
