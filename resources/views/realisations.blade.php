<x-layout title="Nos réalisations | OMF code" description="Nos réalisations : sites, applications et projets IA livrés par OMF code au Burkina Faso et ailleurs.">
  <section class="relative overflow-hidden hero-glow">
    <div class="absolute inset-0 grid-bg opacity-70"></div>
    <div class="relative max-w-5xl mx-auto px-5 lg:px-8 py-20 text-center">
      <span class="chip">Réalisations</span>
      <h1 class="font-display font-bold text-5xl md:text-6xl mt-4">Ce que nous avons construit.</h1>
      <p class="mt-6 text-lg text-ink-2 max-w-2xl mx-auto">Chaque projet est une preuve. Découvrez nos livraisons récentes.</p>
    </div>
  </section>

  <section class="max-w-7xl mx-auto px-5 lg:px-8 py-16">
    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
      @forelse($projects as $project)
      <a href="{{ $project->link ?? '#' }}" class="card overflow-hidden card-hover reveal">
        <div class="aspect-[4/3] bg-gradient-to-br {{ $project->gradient_classes ?? 'from-blue-600 to-indigo-900' }}"></div>
        <div class="p-5">
          <p class="text-xs text-brand font-semibold">{{ strtoupper($project->category) }}</p>
          <h3 class="font-display font-bold text-xl mt-1">{{ $project->title }}</h3>
          <p class="text-sm text-muted mt-2">{{ $project->description }}</p>
          @if($project->stack)<p class="text-xs text-muted mt-3 font-mono">{{ $project->stack }}</p>@endif
        </div>
      </a>
      @empty
      <div class="md:col-span-3 text-center py-16">
        <p class="text-4xl mb-4">🚧</p>
        <p class="font-display font-bold text-2xl text-ink">Nos réalisations arrivent bientôt !</p>
        <p class="text-muted mt-2">Nous préparons la mise en ligne de notre portfolio. Revenez vite.</p>
        <a href="/contact" class="btn btn-primary mt-6">Discuter de votre projet →</a>
      </div>
      @endforelse
    </div>
  </section>
</x-layout>
