<x-layout title="Demander un devis | OMF code" description="Demandez un devis gratuit à OMF code pour votre site, application ou projet IA.">
  {{-- Hero --}}
  <section class="relative overflow-hidden hero-glow">
    <div class="absolute inset-0 grid-bg opacity-70"></div>
    <div class="relative max-w-5xl mx-auto px-5 lg:px-8 py-20 text-center">
      <span class="chip">Devis gratuit</span>
      <h1 class="font-display font-bold text-5xl md:text-6xl mt-4">Demandez votre devis.</h1>
      <p class="mt-6 text-lg text-ink-2 max-w-2xl mx-auto">Décrivez votre projet et nous vous répondrons avec une estimation sous 48h ouvrées.</p>
    </div>
  </section>

  <section class="max-w-3xl mx-auto px-5 lg:px-8 py-16">

    @if(session('success'))
      <div class="mb-8 p-5 rounded-2xl bg-green-500/10 border border-green-500/30 text-green-400 text-center font-medium">
        ✅ {{ session('success') }}
      </div>
    @endif

    <div class="card p-8 reveal">
      <h2 class="font-display font-bold text-2xl mb-6">Votre projet en quelques mots</h2>

      <form action="{{ route('devis.store') }}" method="POST" class="space-y-5">
        @csrf

        <div class="grid md:grid-cols-2 gap-5">
          <div>
            <label class="block text-sm font-medium mb-1">Votre nom *</label>
            <input type="text" name="name" value="{{ old('name') }}" required
              class="w-full px-4 py-3 rounded-xl bg-surface border border-line focus:border-brand focus:ring-1 focus:ring-brand outline-none transition"
              placeholder="Jean Dupont">
            @error('name')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
          </div>
          <div>
            <label class="block text-sm font-medium mb-1">Email *</label>
            <input type="email" name="email" value="{{ old('email') }}" required
              class="w-full px-4 py-3 rounded-xl bg-surface border border-line focus:border-brand focus:ring-1 focus:ring-brand outline-none transition"
              placeholder="jean@exemple.com">
            @error('email')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
          </div>
          <div>
            <label class="block text-sm font-medium mb-1">Téléphone</label>
            <input type="tel" name="phone" value="{{ old('phone') }}"
              class="w-full px-4 py-3 rounded-xl bg-surface border border-line focus:border-brand focus:ring-1 focus:ring-brand outline-none transition"
              placeholder="+226 xx xx xx xx">
          </div>
          <div>
            <label class="block text-sm font-medium mb-1">Entreprise</label>
            <input type="text" name="company" value="{{ old('company') }}"
              class="w-full px-4 py-3 rounded-xl bg-surface border border-line focus:border-brand focus:ring-1 focus:ring-brand outline-none transition"
              placeholder="Ma Société">
          </div>
        </div>

        <div class="grid md:grid-cols-2 gap-5">
          <div>
            <label class="block text-sm font-medium mb-1">Type de projet</label>
            <select name="project_type"
              class="w-full px-4 py-3 rounded-xl bg-surface border border-line focus:border-brand focus:ring-1 focus:ring-brand outline-none transition">
              <option value="">Sélectionner...</option>
              <option value="site-web" {{ old('project_type') == 'site-web' ? 'selected' : '' }}>Site Web</option>
              <option value="application" {{ old('project_type') == 'application' ? 'selected' : '' }}>Application Mobile/Web</option>
              <option value="design" {{ old('project_type') == 'design' ? 'selected' : '' }}>Design & Branding</option>
              <option value="ia" {{ old('project_type') == 'ia' ? 'selected' : '' }}>Intelligence Artificielle</option>
              <option value="conseil" {{ old('project_type') == 'conseil' ? 'selected' : '' }}>Conseil / Audit</option>
              <option value="autre" {{ old('project_type') == 'autre' ? 'selected' : '' }}>Autre</option>
            </select>
          </div>
          <div>
            <label class="block text-sm font-medium mb-1">Budget estimé</label>
            <select name="budget"
              class="w-full px-4 py-3 rounded-xl bg-surface border border-line focus:border-brand focus:ring-1 focus:ring-brand outline-none transition">
              <option value="">Non défini</option>
              <option value="< 500€">Moins de 500.000 FCFA</option>
              <option value="500-2000€">500.000 FCFA – 1 000.000 FCFA</option>
              <option value="2000-5000€">2 000.000 FCFA – 5 000.000 FCFA</option>
              <option value="5000-15000€">5 000.000 FCFA – 15 000.000 FCFA</option>
              <option value="> 15000€">Plus de 15 000.000 FCFA</option>
            </select>
          </div>
        </div>

        <div>
          <label class="block text-sm font-medium mb-1">Description du projet *</label>
          <textarea name="description" required rows="6"
            class="w-full px-4 py-3 rounded-xl bg-surface border border-line focus:border-brand focus:ring-1 focus:ring-brand outline-none transition resize-none"
            placeholder="Décrivez votre projet, vos besoins, vos attentes...">{{ old('description') }}</textarea>
          @error('description')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
        </div>

        <button type="submit" class="btn-primary w-full flex items-center justify-center gap-2 py-4">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
          Envoyer ma demande de devis
        </button>
      </form>
    </div>
  </section>
</x-layout>
