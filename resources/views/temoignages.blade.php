<x-layout title="Témoignages clients | OMF code" description="Témoignages clients OMF code : avis sur nos projets web, IA et formations.">
  <section class="relative overflow-hidden hero-glow">
    <div class="absolute inset-0 grid-bg opacity-70"></div>
    <div class="relative max-w-4xl mx-auto px-5 lg:px-8 py-20 text-center">
      <span class="chip">Témoignages</span>
      <h1 class="font-display font-bold text-5xl md:text-6xl mt-4">La parole à nos clients.</h1>
      <p class="mt-6 text-lg text-ink-2">Des retours réels, mesurables, honnêtes.</p>
        @if($testimonials->count() > 0)
        <div class="mt-8 flex justify-center items-center gap-4">
          <div class="flex text-2xl text-yellow-500">★★★★★</div>
          <p class="text-sm text-muted"><span class="font-bold text-ink">4.9/5</span> sur {{ $testimonials->count() }} avis</p>
        </div>
        @endif
    </div>
  </section>

  <section class="max-w-6xl mx-auto px-5 lg:px-8 py-16 grid md:grid-cols-2 lg:grid-cols-3 gap-5">
    @forelse($testimonials as $t)
    <blockquote class="card p-6 reveal">
      <div class="flex text-yellow-500">@for($i=0;$i<$t->rating;$i++)★@endfor</div>
      <p class="mt-3 text-ink-2">« {{ $t->content }} »</p>
      <footer class="mt-5 flex items-center gap-3">
        <span class="w-10 h-10 rounded-full bg-brand-050 text-brand grid place-items-center font-bold">{{ $t->initials }}</span>
        <div><p class="font-semibold text-sm">{{ $t->client_name }}</p><p class="text-xs text-muted">{{ $t->client_role }}</p></div>
      </footer>
    </blockquote>
    @empty
    <div class="md:col-span-3 text-center py-16">
      <p class="text-4xl mb-4">💬</p>
      <p class="font-display font-bold text-2xl text-ink">Témoignages en cours de collecte !</p>
      <p class="text-muted mt-2">Nos premiers clients sont en train de rédiger leurs retours. Revenez bientôt !</p>
    </div>
    @endforelse
  </section>

  <section class="max-w-6xl mx-auto px-5 lg:px-8 pb-20 grid md:grid-cols-2 gap-8 items-start">
    <div class="card p-10 reveal text-center md:text-left h-full flex flex-col justify-between">
      <div>
        <p class="font-display font-bold text-3xl">Prêt à rejoindre nos clients satisfaits ?</p>
        <p class="text-muted mt-3">Discutons de votre projet de développement web, d'IA ou de formation sur mesure.</p>
      </div>
      <a href="/rendez-vous" class="btn btn-primary mt-6 w-max mx-auto md:mx-0">Démarrer un projet</a>
    </div>

    <div class="card p-6 md:p-8 reveal">
      <h3 class="font-display font-bold text-xl mb-4">Laisser un avis</h3>
      <form id="testimonialForm" onsubmit="submitTestimonial(event)" class="grid gap-4">
        @csrf
        <div class="grid sm:grid-cols-2 gap-4">
          <label class="block">
            <span class="text-sm font-medium">Votre nom</span>
            <input name="client_name" required class="mt-1 w-full px-3 py-2 rounded-lg bg-app border border-line ring-brand" />
          </label>
          <label class="block">
            <span class="text-sm font-medium">Rôle / Entreprise (Optionnel)</span>
            <input name="client_role" class="mt-1 w-full px-3 py-2 rounded-lg bg-app border border-line ring-brand" placeholder="ex: CEO chez LogiPME" />
          </label>
        </div>

        <div class="block">
          <span class="text-sm font-medium">Note globale</span>
          <div class="flex items-center gap-1 mt-1 text-2xl" id="star-selector">
            <span class="cursor-pointer text-yellow-500" data-val="1">★</span>
            <span class="cursor-pointer text-yellow-500" data-val="2">★</span>
            <span class="cursor-pointer text-yellow-500" data-val="3">★</span>
            <span class="cursor-pointer text-yellow-500" data-val="4">★</span>
            <span class="cursor-pointer text-yellow-500" data-val="5">★</span>
          </div>
          <input type="hidden" name="rating" id="ratingInput" value="5" />
        </div>

        <label class="block">
          <span class="text-sm font-medium">Votre témoignage</span>
          <textarea name="content" rows="4" required class="mt-1 w-full px-3 py-2 rounded-lg bg-app border border-line ring-brand" placeholder="Parlez de votre expérience de travail avec nous..."></textarea>
        </label>

        <button type="submit" id="submitTestimonialBtn" class="btn btn-primary justify-center w-max">Soumettre mon avis</button>
        <p id="testimonialOk" class="hidden text-brand text-sm">✓ Avis envoyé ! Il sera publié après modération de l'administrateur.</p>
      </form>
    </div>
  </section>

  <script>
    // Logique interactive de choix des étoiles
    document.querySelectorAll('#star-selector span').forEach(star => {
      star.addEventListener('click', function() {
        const val = parseInt(this.getAttribute('data-val'));
        document.getElementById('ratingInput').value = val;
        
        // Eteindre ou allumer les étoiles
        document.querySelectorAll('#star-selector span').forEach(s => {
          const sVal = parseInt(s.getAttribute('data-val'));
          if (sVal <= val) {
            s.classList.add('text-yellow-500');
            s.classList.remove('text-gray-300', 'dark:text-gray-600');
          } else {
            s.classList.remove('text-yellow-500');
            s.classList.add('text-gray-300', 'dark:text-gray-600');
          }
        });
      });
    });

    async function submitTestimonial(e) {
      e.preventDefault();
      const form = e.target;
      const formData = new FormData(form);
      const data = Object.fromEntries(formData.entries());

      const btn = document.getElementById('submitTestimonialBtn');
      const oldText = btn.innerText;
      btn.innerText = 'Envoi...';
      btn.disabled = true;

      try {
        const response = await fetch('{{ route("temoignages") }}', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
          },
          body: JSON.stringify(data)
        });

        if (response.ok) {
          form.reset();
          document.getElementById('testimonialOk').classList.remove('hidden');
          
          // Remettre à 5 étoiles
          document.querySelectorAll('#star-selector span').forEach(s => {
            s.classList.add('text-yellow-500');
            s.classList.remove('text-gray-300', 'dark:text-gray-600');
          });
          document.getElementById('ratingInput').value = "5";
        } else {
          alert("Une erreur s'est produite lors de la soumission de votre avis.");
        }
      } catch (error) {
        alert("Une erreur s'est produite lors de la soumission de votre avis.");
      } finally {
        btn.innerText = oldText;
        btn.disabled = false;
      }
    }
  </script>
</x-layout>
