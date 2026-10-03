<x-layout :title="$service->title.' | OMF code'" :description="$service->short_description" :schema="$schema">
  <section class="relative overflow-hidden hero-glow">
    <div class="absolute inset-0 grid-bg opacity-70"></div>
    <div class="relative max-w-5xl mx-auto px-5 lg:px-8 py-20 text-center">
      <a href="{{ route('services') }}" class="chip hover:bg-brand-050 mb-4 inline-block">← Retour aux services</a>
      <h1 class="font-display font-bold text-5xl md:text-6xl mt-4">{{ $service->title }}</h1>
      <p class="mt-6 text-xl text-ink-2 max-w-2xl mx-auto">{{ $service->short_description }}</p>
    </div>
  </section>

  <section class="max-w-4xl mx-auto px-5 lg:px-8 py-16">
    <div class="card p-8 md:p-12 prose prose-lg dark:prose-invert max-w-none reveal">
      @if($service->image)
        <img src="{{ Storage::url($service->image) }}" alt="{{ $service->title }}" class="w-full h-auto rounded-xl mb-8 object-cover aspect-video" />
      @endif
      
      {!! $service->content !!}
    </div>

    <div class="mt-16 text-center reveal">
      <h2 class="font-display font-bold text-3xl mb-6">Un projet autour de ce service ?</h2>
      <a href="{{ route('rendez-vous') }}" class="btn btn-primary">Démarrer un projet</a>
    </div>
  </section>
</x-layout>
