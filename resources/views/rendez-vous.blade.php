<x-layout title="Prendre rendez-vous | OMF code" description="Prenez rendez-vous avec OMF code : visio ou déplacement à Ouagadougou pour discuter de votre projet.">
  <section class="relative overflow-hidden hero-glow">
    <div class="absolute inset-0 grid-bg opacity-70"></div>
    <div class="relative max-w-4xl mx-auto px-5 lg:px-8 py-16 text-center">
      <span class="chip">Rendez-vous</span>
      <h1 class="font-display font-bold text-5xl md:text-6xl mt-4">Réservez votre créneau.</h1>
      <p class="mt-6 text-lg text-ink-2 max-w-2xl mx-auto">Consultation gratuite, audit, formation ou accompagnement — en 4 étapes.</p>
    </div>
  </section>

  <section class="max-w-4xl mx-auto px-5 lg:px-8 pb-20">
    <div class="card p-6 md:p-10 reveal">
      <!-- Steps indicator -->
      <div class="flex items-center justify-between mb-8">
        <div class="flex-1 flex items-center gap-2"><span id="dot1" class="w-8 h-8 rounded-full bg-brand text-white grid place-items-center font-bold text-sm">1</span><span class="text-sm hidden sm:inline">Type</span></div>
        <div class="flex-1 flex items-center gap-2"><span id="dot2" class="w-8 h-8 rounded-full bg-app-2 text-muted grid place-items-center font-bold text-sm">2</span><span class="text-sm hidden sm:inline">Date</span></div>
        <div class="flex-1 flex items-center gap-2"><span id="dot3" class="w-8 h-8 rounded-full bg-app-2 text-muted grid place-items-center font-bold text-sm">3</span><span class="text-sm hidden sm:inline">Coordonnées</span></div>
        <div class="flex items-center gap-2"><span id="dot4" class="w-8 h-8 rounded-full bg-app-2 text-muted grid place-items-center font-bold text-sm">4</span><span class="text-sm hidden sm:inline">Canal</span></div>
      </div>

      <form id="rdvForm" onsubmit="finish(event)">
        <div id="step1">
          <h2 class="font-display font-bold text-2xl mb-4">Quel type de rendez-vous ?</h2>
          <div class="grid sm:grid-cols-2 gap-3" id="type-grid">
            <!-- Injecté par JS -->
          </div>
        </div>

        <div id="step2" class="hidden">
          <h2 class="font-display font-bold text-2xl mb-4">Choisissez date et heure</h2>
          <div class="grid sm:grid-cols-2 gap-4">
            <label class="block"><span class="text-sm font-medium">Date</span><input type="date" name="date" required class="mt-1 w-full px-3 py-2 rounded-lg bg-app border border-line ring-brand"/></label>
            <label class="block"><span class="text-sm font-medium">Heure</span>
              <select name="time" required class="mt-1 w-full px-3 py-2 rounded-lg bg-app border border-line ring-brand">
                <option value="">Sélectionner…</option>
                <option>09:00</option><option>10:00</option><option>11:00</option>
                <option>14:00</option><option>15:00</option><option>16:00</option><option>17:00</option>
              </select>
            </label>
          </div>
        </div>

        <div id="step3" class="hidden">
          <h2 class="font-display font-bold text-2xl mb-4">Vos coordonnées</h2>
          <div class="grid sm:grid-cols-2 gap-4">
            <label class="block"><span class="text-sm font-medium">Nom complet</span><input name="name" required class="mt-1 w-full px-3 py-2 rounded-lg bg-app border border-line ring-brand"/></label>
            <label class="block"><span class="text-sm font-medium">Email</span><input type="email" name="email" required class="mt-1 w-full px-3 py-2 rounded-lg bg-app border border-line ring-brand"/></label>
            <label class="block"><span class="text-sm font-medium">Téléphone</span><input type="tel" name="phone" required class="mt-1 w-full px-3 py-2 rounded-lg bg-app border border-line ring-brand"/></label>
            <label class="block"><span class="text-sm font-medium">Entreprise</span><input name="company" class="mt-1 w-full px-3 py-2 rounded-lg bg-app border border-line ring-brand"/></label>
            <label class="block sm:col-span-2"><span class="text-sm font-medium">Message</span><textarea name="message" rows="3" class="mt-1 w-full px-3 py-2 rounded-lg bg-app border border-line ring-brand"></textarea></label>
          </div>
        </div>

        <div id="step4" class="hidden">
          <h2 class="font-display font-bold text-2xl mb-4">Comment souhaitez-vous être contacté ?</h2>
          <div class="grid sm:grid-cols-3 gap-3" id="canal-grid">
            <label class="rdv-card card p-4 cursor-pointer transition-all duration-200"><input type="radio" name="canal" value="tel" class="hidden peer"/><div><p class="text-2xl">📞</p><p class="font-display font-bold mt-2">Téléphone</p></div></label>
            <label class="rdv-card card p-4 cursor-pointer transition-all duration-200">
              <input type="radio" name="canal" value="wa" class="hidden peer"/>
              <div>
                <div class="mb-2">
                  <svg class="w-8 h-8 text-[#25D366]" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 0C5.385 0 .002 5.385.002 12.03c0 2.126.554 4.198 1.607 6.023L0 24l6.108-1.597c1.765 1.01 3.766 1.543 5.92 1.543h.004c6.645 0 12.032-5.385 12.032-12.032 0-3.222-1.254-6.252-3.532-8.53C18.254 1.253 15.226 0 12.031 0zm0 21.996h-.003c-1.802 0-3.568-.484-5.114-1.401l-.367-.217-3.8.995.998-3.705-.238-.378a10.046 10.046 0 0 1-1.536-5.26c0-5.541 4.508-10.049 10.05-10.049 2.686 0 5.21 1.047 7.108 2.946A10.013 10.013 0 0 1 22.062 12.03c0 5.54-4.51 10.048-10.052 10.048zm5.509-7.534c-.302-.15-1.785-.882-2.063-.984-.277-.101-.479-.15-.681.15-.202.302-.782.984-.959 1.185-.176.201-.354.227-.655.076-.302-.151-1.274-.469-2.428-1.5-1.025-.907-1.716-2.025-1.917-2.327-.2-.302-.021-.465.13-.615.136-.135.302-.352.453-.528.151-.176.202-.302.302-.503.1-.202.05-.378-.025-.529-.076-.15-.681-1.642-.933-2.25-.246-.593-.496-.513-.681-.522-.176-.009-.378-.009-.579-.009-.202 0-.528.076-.805.378-.277.302-1.057 1.033-1.057 2.518s1.082 2.92 1.233 3.12c.151.202 2.128 3.25 5.155 4.557.72.311 1.282.497 1.722.637.721.229 1.378.196 1.895.119.58-.086 1.785-.73 2.037-1.435.252-.705.252-1.309.176-1.435-.075-.126-.277-.202-.579-.353z"/></svg>
                </div>
                <p class="font-display font-bold mt-2">WhatsApp</p>
              </div>
            </label>
            <label class="rdv-card card p-4 cursor-pointer transition-all duration-200"><input type="radio" name="canal" value="meet" class="hidden peer"/><div><p class="text-2xl">🎥</p><p class="font-display font-bold mt-2">Google Meet</p></div></label>
          </div>
        </div>

        <div id="stepDone" class="hidden text-center py-10">
          <div class="w-16 h-16 mx-auto rounded-full bg-brand-050 text-brand grid place-items-center text-3xl">✓</div>
          <h2 class="font-display font-bold text-3xl mt-4">Rendez-vous confirmé !</h2>
          <p class="text-ink-2 mt-2">Vous recevrez un email de confirmation dans quelques minutes.</p>
          <a href="/" class="btn btn-primary mt-6">Retour à l'accueil</a>
        </div>

        <div id="nav" class="mt-8 flex justify-between">
          <button type="button" id="prev" onclick="go(-1)" class="btn btn-ghost hidden">← Précédent</button>
          <span></span>
          <button type="button" id="next" onclick="go(1)" class="btn btn-primary">Suivant →</button>
          <button type="submit" id="submit" class="btn btn-primary hidden">Confirmer le rendez-vous</button>
        </div>
      </form>
    </div>
  </section>
  <script>
    const types=[
      ['gratuite','Consultation gratuite','30 min pour cadrer vos besoins.'],
      ['audit','Audit','Diagnostic complet de votre SI.'],
      ['formation','Formation','Séance individuelle ou groupe.'],
      ['dev','Développement','Cadrage d\'un projet tech.'],
      ['ia','Accompagnement IA','Feuille de route IA sur mesure.'],
    ];
    document.getElementById('type-grid').innerHTML = types.map(([v,t,d])=>`
      <label class="rdv-card card p-5 cursor-pointer transition-all duration-200">
        <input type="radio" name="type" value="${v}" class="sr-only"/>
        <div>
          <p class="font-display font-bold text-lg">${t}</p>
          <p class="text-sm text-muted mt-1">${d}</p>
        </div>
      </label>`).join('');

    // Ajouter le retour visuel sur toutes les grilles de cartes
    function initCardSelection(gridId) {
      const grid = document.getElementById(gridId);
      if (!grid) return;
      grid.querySelectorAll('.rdv-card').forEach(label => {
        label.addEventListener('click', () => {
          // Retirer l'highlight de toutes les cartes du groupe
          grid.querySelectorAll('.rdv-card').forEach(l => {
            l.style.borderColor = '';
            l.style.boxShadow = '';
            l.querySelector('div').style.color = '';
          });
          // Appliquer l'highlight sur la carte sélectionnée
          label.style.borderColor = 'var(--color-brand, #0238e8)';
          label.style.boxShadow = '0 0 0 3px rgba(2, 56, 232, 0.15)';
          label.querySelector('div').style.color = 'var(--color-brand, #0238e8)';
        });
      });
    }
    // Initialiser les deux grilles de cartes
    initCardSelection('type-grid');
    initCardSelection('canal-grid');

    let step=1;
    function updateNav(){
      document.getElementById('prev').classList.toggle('hidden', step===1);
      document.getElementById('next').classList.toggle('hidden', step===4);
      document.getElementById('submit').classList.toggle('hidden', step!==4);
      for(let i=1;i<=4;i++){
        const dot=document.getElementById('dot'+i);
        if(i<=step){ dot.classList.remove('bg-app-2','text-muted'); dot.classList.add('bg-brand','text-white'); }
        else { dot.classList.add('bg-app-2','text-muted'); dot.classList.remove('bg-brand','text-white'); }
      }
    }
    function go(delta){
      if(delta>0){
        const cur=document.getElementById('step'+step);
        if(step === 1) {
            const types = cur.querySelectorAll('input[name="type"]');
            if(!Array.from(types).some(t => t.checked)) {
                alert("Veuillez sélectionner un type de rendez-vous.");
                return;
            }
        } else {
            const inputs=cur.querySelectorAll('input[required],select[required]');
            for(const i of inputs){ if(!i.reportValidity()) return; }
        }
      }
      document.getElementById('step'+step).classList.add('hidden');
      step+=delta;
      document.getElementById('step'+step).classList.remove('hidden');
      updateNav();
    }
    async function finish(e){
      e.preventDefault();
      
      const form = e.target;
      const canals = form.querySelectorAll('input[name="canal"]');
      if(!Array.from(canals).some(c => c.checked)) {
          alert("Veuillez sélectionner un canal de contact.");
          return;
      }

      const formData = new FormData(form);
      const data = Object.fromEntries(formData.entries());
      
      const submitBtn = document.getElementById('submit');
      const originalText = submitBtn.innerText;
      submitBtn.innerText = 'Envoi en cours...';
      submitBtn.disabled = true;

      try {
          const response = await fetch('/rendez-vous', {
              method: 'POST',
              headers: {
                  'Content-Type': 'application/json',
                  'Accept': 'application/json',
                  'X-CSRF-TOKEN': '{{ csrf_token() }}'
              },
              body: JSON.stringify(data)
          });

          if (response.ok) {
              document.getElementById('step4').classList.add('hidden');
              document.getElementById('stepDone').classList.remove('hidden');
              document.getElementById('nav').classList.add('hidden');
          } else {
              alert("Une erreur s'est produite lors de la réservation.");
              submitBtn.innerText = originalText;
              submitBtn.disabled = false;
          }
      } catch (error) {
          alert("Une erreur s'est produite lors de la réservation.");
          submitBtn.innerText = originalText;
          submitBtn.disabled = false;
      }
    }
  </script>
</x-layout>
