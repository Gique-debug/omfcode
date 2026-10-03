<x-layout title="À propos | OMF code" description="À propos d'OMF code : studio tech à Ouagadougou spécialisé en développement web, IA et formation au Burkina Faso.">
  <section class="relative overflow-hidden hero-glow">
    <div class="absolute inset-0 grid-bg opacity-70"></div>
    <div class="relative max-w-5xl mx-auto px-5 lg:px-8 py-24 lg:py-32 text-center">
      <span class="chip">À propos</span>
      <h1 class="font-display font-bold text-5xl md:text-6xl mt-4">Nous codons l'Afrique de demain.</h1>
      <p class="mt-6 text-lg text-ink-2 max-w-2xl mx-auto">OMF &lt;code/&gt; est un studio technologique qui met le développement, l'IA et la formation au service des entreprises ambitieuses.</p>
    </div>
  </section>

  <section class="max-w-7xl mx-auto px-5 lg:px-8 py-20 grid lg:grid-cols-2 gap-12 items-center">
    <div class="reveal">
      <span class="chip">Notre mission</span>
      <h2 class="font-display font-bold text-4xl mt-3">Rendre la tech utile, accessible, mesurable.</h2>
      <p class="mt-4 text-ink-2">Nous croyons que chaque PME mérite les mêmes outils qu'une grande entreprise. Nous concevons, développons et déployons des solutions numériques robustes, accompagnées de formations qui autonomisent vos équipes.</p>
      <div class="mt-8 grid grid-cols-2 gap-6">
        <div><p class="font-display font-bold text-3xl text-brand">+80</p><p class="text-sm text-muted">Projets livrés</p></div>
        <div><p class="font-display font-bold text-3xl text-brand">+500</p><p class="text-sm text-muted">Apprenants</p></div>
        <div><p class="font-display font-bold text-3xl text-brand">4</p><p class="text-sm text-muted">Pays clients</p></div>
        <div><p class="font-display font-bold text-3xl text-brand">98%</p><p class="text-sm text-muted">Satisfaction</p></div>
      </div>
    </div>
    <div class="card p-8 reveal">
      <div class="aspect-square rounded-2xl bg-app-2 flex items-center justify-center p-8 border border-line">
        <img src="{{ asset('assets/img/logo.png') }}" alt="OMF Logo" class="w-full h-full object-contain" />
      </div>
    </div>
  </section>

  <section class="bg-app-2 border-y border-line py-20">
    <div class="max-w-7xl mx-auto px-5 lg:px-8">
      <div class="text-center max-w-2xl mx-auto mb-14 reveal">
        <span class="chip">Nos valeurs</span>
        <h2 class="font-display font-bold text-4xl mt-3">Ce qui nous fait avancer.</h2>
      </div>
      <div class="grid md:grid-cols-3 gap-5">
        <div class="card p-6 reveal"><p class="text-3xl">⚡</p><h3 class="font-display font-bold text-xl mt-3">Livraison rapide</h3><p class="text-sm text-muted mt-2">Sprints courts, démos hebdomadaires, résultats visibles.</p></div>
        <div class="card p-6 reveal"><p class="text-3xl">🔍</p><h3 class="font-display font-bold text-xl mt-3">Transparence</h3><p class="text-sm text-muted mt-2">Code sur votre repo. Devis clair. Zéro surprise.</p></div>
        <div class="card p-6 reveal"><p class="text-3xl">🌍</p><h3 class="font-display font-bold text-xl mt-3">Impact local</h3><p class="text-sm text-muted mt-2">Solutions pensées pour les réalités africaines.</p></div>
      </div>
    </div>
  </section>

  <section class="max-w-7xl mx-auto px-5 lg:px-8 py-20">
    <div class="text-center max-w-2xl mx-auto mb-14 reveal">
      <span class="chip">Équipe</span>
      <h2 class="font-display font-bold text-4xl mt-3">Des humains derrière chaque ligne.</h2>
    </div>
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5">
      <div class="card p-5 text-center reveal">
        <!-- 📸 AJOUTEZ LA PHOTO ICI -->
        <!-- Exemple : src="{{ asset('assets/img/ousmane.jpg') }}" -->
        <img src="https://ui-avatars.com/api/?name=Ousmane+K&background=1e3aff&color=fff&size=200" alt="Ousmane M." class="w-24 h-24 mx-auto rounded-full object-cover shadow-lg border-2 border-app-2" />
        <h3 class="font-display font-bold mt-4">P. Ousmane .F K.</h3>
        <p class="text-sm text-muted">Co-fondateur · CEO</p>
      </div>
      <div class="card p-5 text-center reveal">
        <!-- 📸 AJOUTEZ LA PHOTO ICI -->
        <!-- Exemple : src="{{ asset('assets/img/fatimata.jpg') }}" -->
        <img src="https://ui-avatars.com/api/?name=Martial+M&background=10b981&color=fff&size=200" alt="Fatimata D." class="w-24 h-24 mx-auto rounded-full object-cover shadow-lg border-2 border-app-2" />
        <h3 class="font-display font-bold mt-4">Martial M.</h3>
        <p class="text-sm text-muted">Co-fondateur · COO</p>
      </div>
      <div class="card p-5 text-center reveal">
        <!-- 📸 AJOUTEZ LA PHOTO ICI -->
        <!-- Exemple : src="{{ asset('assets/img/moctar.jpg') }}" -->
        <img src="https://ui-avatars.com/api/?name=Faissal+D&background=f97316&color=fff&size=200" alt="Moctar S." class="w-24 h-24 mx-auto rounded-full object-cover shadow-lg border-2 border-app-2" />
        <h3 class="font-display font-bold mt-4">W. Faissal D.</h3>
        <p class="text-sm text-muted">Co-fondateur · CTO</p>
      </div>
    </div>
  </section>
</x-layout>
