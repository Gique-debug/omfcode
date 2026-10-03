<x-layout title="Contact | OMF code" description="Contactez OMF code pour vos projets web, IA ou formation. Réponse rapide, consultation gratuite de 30 min.">
  <section class="relative overflow-hidden hero-glow">
    <div class="absolute inset-0 grid-bg opacity-70"></div>
    <div class="relative max-w-5xl mx-auto px-5 lg:px-8 py-20 text-center">
      <span class="chip">Contact</span>
      <h1 class="font-display font-bold text-5xl md:text-6xl mt-4">Parlons de votre projet.</h1>
      <p class="mt-6 text-lg text-ink-2 max-w-2xl mx-auto">Choisissez le canal qui vous convient. Réponse sous 24h ouvrées.</p>
    </div>
  </section>

  <section class="max-w-6xl mx-auto px-5 lg:px-8 py-16 grid lg:grid-cols-2 gap-10">
    <div class="reveal">
      <h2 class="font-display font-bold text-3xl">Nous joindre directement</h2>
      <div class="mt-6 space-y-3">
        <a href="https://wa.me/22600000000" class="card p-5 flex items-center gap-4 card-hover">
          <svg class="w-8 h-8 text-[#25D366]" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 0C5.385 0 .002 5.385.002 12.03c0 2.126.554 4.198 1.607 6.023L0 24l6.108-1.597c1.765 1.01 3.766 1.543 5.92 1.543h.004c6.645 0 12.032-5.385 12.032-12.032 0-3.222-1.254-6.252-3.532-8.53C18.254 1.253 15.226 0 12.031 0zm0 21.996h-.003c-1.802 0-3.568-.484-5.114-1.401l-.367-.217-3.8.995.998-3.705-.238-.378a10.046 10.046 0 0 1-1.536-5.26c0-5.541 4.508-10.049 10.05-10.049 2.686 0 5.21 1.047 7.108 2.946A10.013 10.013 0 0 1 22.062 12.03c0 5.54-4.51 10.048-10.052 10.048zm5.509-7.534c-.302-.15-1.785-.882-2.063-.984-.277-.101-.479-.15-.681.15-.202.302-.782.984-.959 1.185-.176.201-.354.227-.655.076-.302-.151-1.274-.469-2.428-1.5-1.025-.907-1.716-2.025-1.917-2.327-.2-.302-.021-.465.13-.615.136-.135.302-.352.453-.528.151-.176.202-.302.302-.503.1-.202.05-.378-.025-.529-.076-.15-.681-1.642-.933-2.25-.246-.593-.496-.513-.681-.522-.176-.009-.378-.009-.579-.009-.202 0-.528.076-.805.378-.277.302-1.057 1.033-1.057 2.518s1.082 2.92 1.233 3.12c.151.202 2.128 3.25 5.155 4.557.72.311 1.282.497 1.722.637.721.229 1.378.196 1.895.119.58-.086 1.785-.73 2.037-1.435.252-.705.252-1.309.176-1.435-.075-.126-.277-.202-.579-.353z"/></svg>
          <div>
            <p class="font-display font-bold">WhatsApp</p>
            <p class="text-sm text-muted">+226 00 00 00 00</p>
          </div>
        </a>
        <a href="tel:+22600000000" class="card p-5 flex items-center gap-4 card-hover"><span class="text-3xl">📞</span><div><p class="font-display font-bold">Téléphone</p><p class="text-sm text-muted">+226 00 00 00 00</p></div></a>
        <a href="mailto:contact@omfcode.com" class="card p-5 flex items-center gap-4 card-hover"><span class="text-3xl">✉</span><div><p class="font-display font-bold">Email</p><p class="text-sm text-muted">contact@omfcode.com</p></div></a>
        <div class="card p-5 flex items-center gap-4"><span class="text-3xl">📍</span><div><p class="font-display font-bold">Basés à Ouagadougou</p><p class="text-sm text-muted">Burkina Faso · 100% à distance pour l'instant, rendez-vous en visio ou sur site client.</p></div></div>
      </div>
      <div class="mt-8 aspect-video rounded-2xl overflow-hidden border border-line">
        <iframe title="Ouagadougou" class="w-full h-full" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
          src="https://www.google.com/maps?q=Ouagadougou,Burkina+Faso&output=embed"></iframe>
      </div>
    </div>

    <div class="reveal">
      <div class="card p-6 md:p-8">
        <h2 class="font-display font-bold text-3xl">Envoyer un message</h2>
        <form id="contactForm" onsubmit="submitContact(event)" class="mt-6 grid gap-4">
          @csrf
          <label class="block"><span class="text-sm font-medium">Nom complet</span><input name="name" required class="mt-1 w-full px-3 py-2 rounded-lg bg-app border border-line ring-brand"/></label>
          <label class="block"><span class="text-sm font-medium">Email</span><input type="email" name="email" required class="mt-1 w-full px-3 py-2 rounded-lg bg-app border border-line ring-brand"/></label>
          <label class="block"><span class="text-sm font-medium">Téléphone</span><input type="tel" name="phone" class="mt-1 w-full px-3 py-2 rounded-lg bg-app border border-line ring-brand"/></label>
          <label class="block"><span class="text-sm font-medium">Sujet</span>
            <select name="subject" class="mt-1 w-full px-3 py-2 rounded-lg bg-app border border-line ring-brand">
              <option>Demande de devis</option><option>Question générale</option><option>Formation</option><option>Partenariat</option><option>Autre</option>
            </select>
          </label>
          <label class="block"><span class="text-sm font-medium">Message</span><textarea name="message" rows="5" required class="mt-1 w-full px-3 py-2 rounded-lg bg-app border border-line ring-brand"></textarea></label>
          <button type="submit" id="submitContactBtn" class="btn btn-primary justify-center">Envoyer</button>
          <p id="ok" class="hidden text-brand text-sm">✓ Message envoyé, nous vous répondons sous 24h.</p>
        </form>
        
        <script>
            async function submitContact(e) {
                e.preventDefault();
                const form = e.target;
                const formData = new FormData(form);
                const data = Object.fromEntries(formData.entries());
                
                const btn = document.getElementById('submitContactBtn');
                const oldText = btn.innerText;
                btn.innerText = 'Envoi...';
                btn.disabled = true;
                
                try {
                    const response = await fetch('/contact', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify(data)
                    });
                    
                    if(response.ok) {
                        form.reset();
                        document.getElementById('ok').classList.remove('hidden');
                    } else {
                        alert("Erreur lors de l'envoi du message.");
                    }
                } catch(err) {
                    alert("Erreur lors de l'envoi du message.");
                } finally {
                    btn.innerText = oldText;
                    btn.disabled = false;
                }
            }
        </script>
      </div>
    </div>
  </section>
</x-layout>
