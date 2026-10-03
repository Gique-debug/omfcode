<x-layout :schema="$schema">
  <!-- HERO -->
  <section class="relative overflow-hidden hero-glow grain">
    <!-- Animated background layers -->
    <div class="aurora">
      <div class="blob b1"></div>
      <div class="blob b2"></div>
      <div class="blob b3"></div>
      <div class="blob b4"></div>
    </div>
    <div class="beam-sweep"></div>
    <div class="absolute inset-0 grid-bg opacity-40 z-[1]"></div>
    <canvas id="heroCanvas" class="hero-canvas"></canvas>

    <div class="relative z-10 max-w-7xl mx-auto px-5 lg:px-8 pt-20 pb-28 lg:pt-32 lg:pb-40">
      <div class="max-w-3xl reveal">
        <span class="chip backdrop-blur-md"> Startup Dev · IA · Formation</span>
        <h1 class="font-display font-bold text-5xl md:text-7xl mt-6 leading-[1.02] reveal-blur">
          OMF <span class="shine-text">code,</span> pour que vos idées <span class="gradient-text">prennent vie</span>.
        </h1>
        <p class="mt-6 text-lg text-ink-2 max-w-2xl reveal">
          De l'idée au produit, nous livrons sites, applications, agents IA et formations sur mesure pour PME, startups, institutions et ONG.
        </p>
        <div class="mt-8 flex flex-wrap gap-3 reveal">
          <a href="/contact" class="btn btn-primary">Consultation gratuite →</a>
          <a href="#" class="btn btn-ghost backdrop-blur-md">Découvrir nos services</a>
        </div>
        <div class="mt-10 grid grid-cols-3 gap-6 max-w-xl">
          <div><p class="font-display text-3xl font-bold text-ink"><span class="counter" data-count="80" data-prefix="+">0</span></p><p class="text-xs text-muted">Projets livrés</p></div>
          <div><p class="font-display text-3xl font-bold text-ink"><span class="counter" data-count="500" data-prefix="+">0</span></p><p class="text-xs text-muted">Apprenants formés</p></div>
          <div><p class="font-display text-3xl font-bold text-ink">24/7</p><p class="text-xs text-muted">Support IA</p></div>
        </div>
      </div>

      <!-- Floating code card -->
      <div class="hidden lg:block absolute right-8 top-28 w-[420px] card gradient-border p-5 shadow-2xl floaty reveal backdrop-blur-xl bg-card/70">
        <div class="flex gap-1.5 mb-3">
          <span class="w-2.5 h-2.5 rounded-full bg-red-400"></span>
          <span class="w-2.5 h-2.5 rounded-full bg-yellow-400"></span>
          <span class="w-2.5 h-2.5 rounded-full bg-green-400"></span>
        </div>
        <pre class="text-xs text-ink-2 leading-relaxed font-mono"><span class="text-brand">const</span> omf = {
  build: <span class="text-brand">'web · mobile · IA'</span>,
  teach: <span class="text-brand">'humains + agents'</span>,
  advise: <span class="text-brand">'PME → digital'</span>,
  deliver: () => <span class="text-brand">'excellence'</span>,
}</pre>
      </div>
    </div>

    <!-- Marquee -->
    <div class="relative z-10 border-y border-line py-4 overflow-hidden bg-app/60 backdrop-blur-md">
      <div class="flex gap-12 marquee-track whitespace-nowrap text-sm font-medium text-muted">
        <script>
          const items=['Laravel','React','Next.js','TypeScript','Python','FastAPI','LangChain','OpenAI','Flutter','PostgreSQL','Tailwind','Node.js','Docker','AWS'];
          document.write((items.concat(items)).map(i=>`<span>◆ ${i}</span>`).join(''));
        </script>
      </div>
    </div>
  </section>

  <!-- SERVICES -->
  <section class="max-w-7xl mx-auto px-5 lg:px-8 py-24 spotlight">
    <div class="flex flex-wrap items-end justify-between gap-6 mb-12 reveal">
      <div>
        <span class="chip">Nos expertises</span>
        <h2 class="font-display font-bold text-4xl md:text-5xl mt-3 section-heading">Quatre pôles, une équipe.</h2>
      </div>
      <a href="#" class="text-brand font-medium link-slide">Tous les services →</a>
    </div>
    <div class="grid gap-5 md:grid-cols-2 lg:grid-cols-4 stagger reveal">
      <a data-tilt href="#" class="card card-hover p-6">
        <div class="icon-badge w-11 h-11 rounded-xl text-brand grid place-items-center mb-4 bob">&lt;/&gt;</div>
        <h3 class="font-display font-bold text-xl mb-2">Développement</h3>
        <p class="text-sm text-muted">Sites, apps web & mobile, logiciels sur mesure. Code propre, livré vite.</p>
      </a>
      <a data-tilt href="#" class="card card-hover p-6">
        <div class="icon-badge w-11 h-11 rounded-xl text-brand grid place-items-center mb-4 bob-slow">✦</div>
        <h3 class="font-display font-bold text-xl mb-2">Intelligence artificielle</h3>
        <p class="text-sm text-muted">Chatbots, agents, automatisation, prompt engineering pour PME.</p>
      </a>
      <a data-tilt href="#" class="card card-hover p-6">
        <div class="icon-badge w-11 h-11 rounded-xl text-brand grid place-items-center mb-4 bob">◎</div>
        <h3 class="font-display font-bold text-xl mb-2">Formation</h3>
        <p class="text-sm text-muted">IA, dev web, bureautique,  individuelle, groupe, entreprise.</p>
      </a>
      <a data-tilt href="#" class="card card-hover p-6">
        <div class="icon-badge w-11 h-11 rounded-xl text-brand grid place-items-center mb-4 bob-slow">◆</div>
        <h3 class="font-display font-bold text-xl mb-2">Conseil</h3>
        <p class="text-sm text-muted">Audit, transformation numérique, accompagnement stratégique.</p>
      </a>
    </div>
  </section>

  <!-- PROCESS -->
  <section class="bg-app-2 border-y border-line">
    <div class="max-w-7xl mx-auto px-5 lg:px-8 py-24 grid lg:grid-cols-5 gap-12">
      <div class="lg:col-span-2 reveal">
        <span class="chip">Notre méthode</span>
        <h2 class="font-display font-bold text-4xl mt-3 leading-tight">De l'audit au lancement, en 4 étapes.</h2>
        <p class="mt-4 text-ink-2">Un processus éprouvé qui garantit visibilité, qualité et livraison rapide , même pour les projets IA les plus techniques.</p>
        <a href="/contact" class="btn btn-primary mt-6">Démarrer un projet</a>
      </div>
      <div class="lg:col-span-3 grid sm:grid-cols-2 gap-4" id="process-steps">
        <!-- Rempli par le javascript du template -->
      </div>
    </div>
  </section>

  <!-- CASE STUDIES -->
  <section class="max-w-7xl mx-auto px-5 lg:px-8 py-24">
    <div class="flex flex-wrap items-end justify-between gap-6 mb-12 reveal">
      <div>
        <span class="chip">Réalisations</span>
        <h2 class="font-display font-bold text-4xl md:text-5xl mt-3">Le travail parle.</h2>
      </div>
      <a href="/realisations" class="text-brand font-medium">Voir tout →</a>
    </div>
    <div class="grid gap-6 md:grid-cols-3 stagger reveal">
      @forelse($projects as $project)
      <a href="{{ $project->link ?? '#' }}" class="card overflow-hidden card-hover block" data-tilt>
        <div class="aspect-[4/3] bg-gradient-to-br {{ $project->gradient_classes ?? 'from-blue-600 to-indigo-900' }}"></div>
        <div class="p-5">
          <p class="text-xs text-brand font-semibold">{{ strtoupper($project->category) }}</p>
          <h3 class="font-display font-bold text-lg mt-1">{{ $project->title }}</h3>
          <p class="text-sm text-muted mt-2">{{ $project->description }}</p>
          @if($project->stack)<p class="text-xs text-muted mt-3 font-mono">{{ $project->stack }}</p>@endif
        </div>
      </a>
      @empty
      <div class="col-span-3 py-12 text-center text-muted">
        <p class="text-4xl mb-4"></p>
        <p class="font-display font-bold text-xl">Les réalisations arrivent bientôt.</p>
        <p class="text-sm mt-2">Ajoutez vos projets depuis <a href="/admin" class="text-brand underline">l'espace admin</a>.</p>
      </div>
      @endforelse
    </div>
    <div class="mt-10 text-center reveal">
      <a href="/contact" class="btn btn-primary">Discuter de votre projet →</a>
    </div>
  </section>

  <!-- TESTIMONIALS -->
  <section class="bg-app-2 border-y border-line">
    <div class="max-w-7xl mx-auto px-5 lg:px-8 py-24">
      <div class="flex flex-wrap items-end justify-between gap-6 mb-12 reveal">
        <div>
          <span class="chip">Témoignages</span>
          <h2 class="font-display font-bold text-4xl md:text-5xl mt-3">Ce que disent nos clients.</h2>
        </div>
        <div class="flex gap-3 items-center">
          <a href="{{ route('temoignages') }}#testimonialForm" class="btn btn-ghost border border-line">Laisser un avis</a>
          <a href="{{ route('temoignages') }}" class="text-brand font-medium">Voir tout →</a>
        </div>
      </div>
      <div class="grid gap-5 md:grid-cols-3">
        @forelse($testimonials as $t)
        <blockquote class="card p-6 reveal">
          <p class="text-ink-2">« {{ $t->content }} »</p>
          <footer class="mt-4 flex items-center gap-3">
            <span class="w-10 h-10 rounded-full bg-brand-050 text-brand grid place-items-center font-bold">{{ $t->initials }}</span>
            <div>
              <p class="font-semibold text-sm">{{ $t->client_name }}</p>
              <p class="text-xs text-muted">{{ $t->client_role }}</p>
            </div>
          </footer>
        </blockquote>
        @empty
        <div class="col-span-3 py-12 text-center text-muted">
          <p class="text-4xl mb-4">💬</p>
          <p class="font-display font-bold text-xl">Les témoignages arrivent bientôt.</p>
          <p class="text-sm mt-2">Soyez le premier à donner votre avis !</p>
          <a href="{{ route('temoignages') }}#testimonialForm" class="btn btn-primary mt-4">Laisser un avis</a>
        </div>
        @endforelse
      </div>
    </div>
  </section>

  <!-- OUAGA / LOCAL ROOTS -->
  <section class="max-w-7xl mx-auto px-5 lg:px-8 pb-8">
    <div class="card overflow-hidden grid md:grid-cols-2 reveal">
      <div class="relative min-h-[280px] bg-cover bg-center" style="background-image:linear-gradient(135deg,rgba(30,58,255,.55),rgba(2,6,23,.6)),url('{{ asset('assets/img/ouaga.jpg') }}')">
        <span class="absolute top-5 left-5 chip bg-white/10 text-white border-white/20 backdrop-blur-md">📍 Ouagadougou · Burkina Faso</span>
      </div>
      <div class="p-8 md:p-10">
        <h2 class="font-display font-bold text-3xl md:text-4xl">Une équipe basée à <span class="gradient-text">Ouaga</span>, un impact continental.</h2>
        <p class="mt-4 text-ink-2">Nous sommes une jeune startup burkinabè. Pas encore de local physique et c'est un choix : nous restons agiles, 100% à distance, avec des rendez-vous en visio ou directement chez vous, à Ouaga et partout au Faso.</p>
        <ul class="mt-6 space-y-2 text-sm text-ink-2">
          <li class="flex gap-2"><span class="text-brand">✓</span> Visio HD via Google Meet ou WhatsApp</li>
          <li class="flex gap-2"><span class="text-brand">✓</span> Déplacement chez le client à Ouagadougou (gratuit)</li>
          <li class="flex gap-2"><span class="text-brand">✓</span> Paiement en FCFA, Mobile Money accepté</li>
        </ul>
        <div class="mt-8 flex flex-wrap gap-3">
          <a href="#" class="btn btn-primary">Réserver une visio</a>
          <a href="https://wa.me/22600000000" class="btn btn-ghost flex items-center gap-2"><svg class="w-5 h-5 text-[#25D366]" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 0C5.385 0 .002 5.385.002 12.03c0 2.126.554 4.198 1.607 6.023L0 24l6.108-1.597c1.765 1.01 3.766 1.543 5.92 1.543h.004c6.645 0 12.032-5.385 12.032-12.032 0-3.222-1.254-6.252-3.532-8.53C18.254 1.253 15.226 0 12.031 0zm0 21.996h-.003c-1.802 0-3.568-.484-5.114-1.401l-.367-.217-3.8.995.998-3.705-.238-.378a10.046 10.046 0 0 1-1.536-5.26c0-5.541 4.508-10.049 10.05-10.049 2.686 0 5.21 1.047 7.108 2.946A10.013 10.013 0 0 1 22.062 12.03c0 5.54-4.51 10.048-10.052 10.048zm5.509-7.534c-.302-.15-1.785-.882-2.063-.984-.277-.101-.479-.15-.681.15-.202.302-.782.984-.959 1.185-.176.201-.354.227-.655.076-.302-.151-1.274-.469-2.428-1.5-1.025-.907-1.716-2.025-1.917-2.327-.2-.302-.021-.465.13-.615.136-.135.302-.352.453-.528.151-.176.202-.302.302-.503.1-.202.05-.378-.025-.529-.076-.15-.681-1.642-.933-2.25-.246-.593-.496-.513-.681-.522-.176-.009-.378-.009-.579-.009-.202 0-.528.076-.805.378-.277.302-1.057 1.033-1.057 2.518s1.082 2.92 1.233 3.12c.151.202 2.128 3.25 5.155 4.557.72.311 1.282.497 1.722.637.721.229 1.378.196 1.895.119.58-.086 1.785-.73 2.037-1.435.252-.705.252-1.309.176-1.435-.075-.126-.277-.202-.579-.353z"/></svg> WhatsApp</a>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <section class="max-w-7xl mx-auto px-5 lg:px-8 pb-24">
    <div class="card p-10 md:p-16 text-center relative overflow-hidden reveal-scale corner-glow">
      <div class="absolute inset-0 bg-cover bg-center opacity-20" style="background-image:url('https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=1600&q=70')"></div>
      <div class="absolute inset-0 grid-bg opacity-50"></div>
      <div class="relative">
        <span class="chip">🇧🇫 Burkina Faso</span>
        <h2 class="font-display font-bold text-4xl md:text-5xl mt-4">Prêt à digitaliser votre <span class="gradient-text">entreprise</span> ?</h2>
        <p class="mt-4 text-ink-2 max-w-xl mx-auto">Consultation gratuite de 30 min en visio. Nous étudions vos besoins, sans engagement.</p>
        <div class="mt-8 flex flex-wrap justify-center gap-3">
          <a href="/contact" class="btn btn-primary">Prendre rendez-vous</a>
          <a href="https://wa.me/22600000000" class="btn btn-ghost flex items-center gap-2"><svg class="w-5 h-5 text-[#25D366]" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 0C5.385 0 .002 5.385.002 12.03c0 2.126.554 4.198 1.607 6.023L0 24l6.108-1.597c1.765 1.01 3.766 1.543 5.92 1.543h.004c6.645 0 12.032-5.385 12.032-12.032 0-3.222-1.254-6.252-3.532-8.53C18.254 1.253 15.226 0 12.031 0zm0 21.996h-.003c-1.802 0-3.568-.484-5.114-1.401l-.367-.217-3.8.995.998-3.705-.238-.378a10.046 10.046 0 0 1-1.536-5.26c0-5.541 4.508-10.049 10.05-10.049 2.686 0 5.21 1.047 7.108 2.946A10.013 10.013 0 0 1 22.062 12.03c0 5.54-4.51 10.048-10.052 10.048zm5.509-7.534c-.302-.15-1.785-.882-2.063-.984-.277-.101-.479-.15-.681.15-.202.302-.782.984-.959 1.185-.176.201-.354.227-.655.076-.302-.151-1.274-.469-2.428-1.5-1.025-.907-1.716-2.025-1.917-2.327-.2-.302-.021-.465.13-.615.136-.135.302-.352.453-.528.151-.176.202-.302.302-.503.1-.202.05-.378-.025-.529-.076-.15-.681-1.642-.933-2.25-.246-.593-.496-.513-.681-.522-.176-.009-.378-.009-.579-.009-.202 0-.528.076-.805.378-.277.302-1.057 1.033-1.057 2.518s1.082 2.92 1.233 3.12c.151.202 2.128 3.25 5.155 4.557.72.311 1.282.497 1.722.637.721.229 1.378.196 1.895.119.58-.086 1.785-.73 2.037-1.435.252-.705.252-1.309.176-1.435-.075-.126-.277-.202-.579-.353z"/></svg> WhatsApp</a>
          <a href="{{ route('contact') }}" class="btn btn-ghost">Nous écrire</a>
        </div>
      </div>
    </div>
  </section>

  <!-- SCRIPTS SPECIFIQUES A LA PAGE D'ACCUEIL -->
  <script>
    // Inject process steps
    const steps=[
      ['01','Discovery','On écoute, on cadre, on chiffre, clair et honnête.'],
      ['02','Design','Maquettes cliquables, validation avant une ligne de code.'],
      ['03','Build','Sprints courts, démos hebdo, code sur votre repo.'],
      ['04','Launch','Mise en prod, formation équipe, support 3 mois inclus.'],
    ];
    const el=document.getElementById('process-steps');
    if(el) el.innerHTML=steps.map(([n,t,d])=>`<div class="card p-5 reveal"><p class="font-display text-brand font-bold">${n}</p><h3 class="font-display font-bold text-lg mt-1">${t}</h3><p class="text-sm text-muted mt-2">${d}</p></div>`).join('');

    // ===== Hero particle network animation =====
    (function(){
      const canvas = document.getElementById('heroCanvas');
      if(!canvas) return;
      const ctx = canvas.getContext('2d');
      let W, H, DPR, particles = [], mouse = {x:-9999,y:-9999};
      const COUNT = window.innerWidth < 768 ? 40 : 90;
      const MAX_DIST = 140;
      function resize(){
        DPR = Math.min(window.devicePixelRatio || 1, 2);
        const r = canvas.getBoundingClientRect();
        W = r.width; H = r.height;
        canvas.width = W * DPR; canvas.height = H * DPR;
        ctx.setTransform(DPR,0,0,DPR,0,0);
      }
      function init(){
        particles = [];
        for(let i=0;i<COUNT;i++){
          particles.push({ x: Math.random()*W, y: Math.random()*H, vx:(Math.random()-.5)*0.4, vy:(Math.random()-.5)*0.4, r: Math.random()*1.6+0.6 });
        }
      }
      function color(){
        return document.documentElement.classList.contains('dark')
          ? {dot:'rgba(140,160,255,0.9)', line:'rgba(140,160,255,'}
          : {dot:'rgba(30,58,255,0.9)',   line:'rgba(30,58,255,'};
      }
      function tick(){
        ctx.clearRect(0,0,W,H);
        const c = color();
        for(const p of particles){
          p.x += p.vx; p.y += p.vy;
          if(p.x<0||p.x>W) p.vx*=-1;
          if(p.y<0||p.y>H) p.vy*=-1;
          const mdx = p.x - mouse.x, mdy = p.y - mouse.y, md = Math.hypot(mdx,mdy);
          if(md < 120){ p.x += mdx/md*0.6; p.y += mdy/md*0.6; }
          ctx.beginPath(); ctx.fillStyle = c.dot;
          ctx.arc(p.x,p.y,p.r,0,Math.PI*2); ctx.fill();
        }
        for(let i=0;i<particles.length;i++){
          for(let j=i+1;j<particles.length;j++){
            const a=particles[i], b=particles[j];
            const dx=a.x-b.x, dy=a.y-b.y, d=Math.hypot(dx,dy);
            if(d<MAX_DIST){
              ctx.strokeStyle = c.line + (1 - d/MAX_DIST).toFixed(3) + ')';
              ctx.lineWidth = 0.6;
              ctx.beginPath(); ctx.moveTo(a.x,a.y); ctx.lineTo(b.x,b.y); ctx.stroke();
            }
          }
        }
        requestAnimationFrame(tick);
      }
      window.addEventListener('resize', ()=>{ resize(); init(); });
      canvas.parentElement.addEventListener('mousemove', e=>{
        const r = canvas.getBoundingClientRect();
        mouse.x = e.clientX - r.left; mouse.y = e.clientY - r.top;
      });
      canvas.parentElement.addEventListener('mouseleave', ()=>{ mouse.x=-9999; mouse.y=-9999; });
      resize(); init(); tick();
    })();
  </script>
</x-layout>
