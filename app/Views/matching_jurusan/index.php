<?= $this->extend('template/template-backend-admin') ?>
<?= $this->section('content') ?>

    <style>
    .mj-hero{
        border-radius: 20px;
        background: linear-gradient(135deg, rgba(246,211,101,.18), rgba(94,231,255,.12), rgba(139,92,255,.10));
        border: 1px solid rgba(0,0,0,.06);
        overflow:hidden;
        position:relative;
    }
    .mj-hero::after{
        content:'';
        position:absolute; inset:-40%;
        background:
        radial-gradient(circle at 25% 30%, rgba(246,211,101,.28), transparent 55%),
        radial-gradient(circle at 75% 35%, rgba(94,231,255,.22), transparent 60%),
        radial-gradient(circle at 60% 80%, rgba(139,92,255,.18), transparent 60%);
        filter: blur(18px);
        opacity:.9;
        pointer-events:none;
    }
    .mj-hero *{position:relative; z-index:1;}

    .mj-card{
        border-radius: 18px;
        border: 1px solid rgba(0,0,0,.06);
        box-shadow: 0 14px 35px rgba(0,0,0,.06);
    }

    .mj-stepper{
        display:flex; gap:10px; flex-wrap:wrap;
        align-items:center;
    }
    .mj-dot{
        width: 34px; height: 34px;
        border-radius: 12px;
        display:grid; place-items:center;
        border: 1px solid rgba(0,0,0,.08);
        background: rgba(255,255,255,.8);
        color:#1f2d3d;
        font-weight: 800;
    }
    .mj-dot.active{
        background: linear-gradient(135deg, #f6d365, #d4af37);
        color:#0b1a3a;
        box-shadow: 0 10px 20px rgba(0,0,0,.10);
    }
    .mj-line{
        flex:1;
        height: 8px;
        border-radius:999px;
        background: rgba(0,0,0,.06);
        overflow:hidden;
        min-width: 120px;
    }
    .mj-line > div{
        height:100%;
        width:0%;
        border-radius:999px;
        background: linear-gradient(90deg, rgba(246,211,101,.95), rgba(94,231,255,.85), rgba(139,92,255,.75));
        transition: .25s ease;
    }

    .mj-qtitle{
        font-weight: 900;
        letter-spacing: .1px;
    }

    .mj-grid{
        display:grid;
        grid-template-columns: repeat(2, minmax(0,1fr));
        gap: 12px;
    }
    @media (max-width: 768px){
        .mj-grid{ grid-template-columns: 1fr; }
    }

    .mj-tile{
        text-align:left;
        border-radius: 16px;
        padding: 14px 14px;
        border: 1px solid rgba(0,0,0,.08);
        background: rgba(255,255,255,.85);
        transition: .18s ease;
        display:flex; gap:12px;
        align-items:flex-start;
        cursor:pointer;
        user-select:none;
    }
    .mj-tile:hover{
        transform: translateY(-2px);
        box-shadow: 0 14px 28px rgba(0,0,0,.08);
    }
    .mj-tile.selected{
        border-color: rgba(94,231,255,.8);
        box-shadow: 0 0 0 4px rgba(94,231,255,.16);
    }
    .mj-ic{
        width: 38px; height: 38px;
        border-radius: 14px;
        display:grid; place-items:center;
        background: rgba(94,231,255,.14);
        border: 1px solid rgba(94,231,255,.25);
        color:#0b1a3a;
        flex:0 0 auto;
    }
    .mj-tile h6{ margin:0; font-weight: 900; }
    .mj-tile p{ margin:4px 0 0; font-size: 12px; color:#6c757d; line-height: 1.35; }

    .mj-actions{
        display:flex; gap:10px; justify-content:space-between; flex-wrap:wrap;
        margin-top: 14px;
    }
    .mj-actions .btn{
        border-radius: 14px;
        padding: 10px 14px;
    }

    .mj-skel{
        border-radius:16px;
        padding: 14px;
        background: rgba(255,255,255,.82);
        border: 1px dashed rgba(0,0,0,.12);
    }

    .mj-bars .bar{
        height: 10px;
        border-radius: 999px;
        background: rgba(0,0,0,.06);
        overflow:hidden;
    }
    .mj-bars .bar > div{
        height:100%;
        width:0%;
        background: linear-gradient(90deg, rgba(94,231,255,.9), rgba(246,211,101,.9));
        transition: .35s ease;
    }
    </style>

    <div class="col-12">

    <div class="card mj-hero mb-3">
        <div class="card-body">
        <div class="d-flex align-items-center justify-content-between flex-wrap">
            <div class="pr-3">
            <h4 class="mb-1 font-weight-bold">
                <i class="fas fa-magic"></i> Matching Jurusan
            </h4>
            <div class="text-muted">
                Jawab <b>6 pertanyaan</b> yang lebih spesifik → dapat rekomendasi jurusan + alasan.
            </div>
            </div>
            <div class="mt-2 mt-md-0">
            <span class="badge badge-pill badge-info px-3 py-2">
                <i class="fas fa-bolt"></i> 1–2 menit selesai
            </span>
            </div>
        </div>

        <div class="mt-3 mj-stepper">
            <div class="mj-dot active" id="dot1">1</div>
            <div class="mj-dot" id="dot2">2</div>
            <div class="mj-dot" id="dot3">3</div>
            <div class="mj-dot" id="dot4">4</div>
            <div class="mj-dot" id="dot5">5</div>
            <div class="mj-dot" id="dot6">6</div>
            <div class="mj-line"><div id="prog"></div></div>
            <div class="text-muted small">Step <span id="stepText">1</span>/6</div>
        </div>
        </div>
    </div>

    <div class="row">
        <!-- FORM -->
        <div class="col-lg-7">
        <div class="card mj-card">
            <div class="card-body">

            <div id="qBox"></div>

            <div class="mj-actions">
                <button class="btn btn-outline-secondary" id="btnBack" type="button">
                <i class="fas fa-arrow-left"></i> Kembali
                </button>

                <div class="d-flex gap-2">
                <button class="btn btn-outline-primary" id="btnSkip" type="button">
                    <i class="fas fa-random"></i> Acak
                </button>

                <button class="btn btn-primary" id="btnNext" type="button">
                    Lanjut <i class="fas fa-arrow-right"></i>
                </button>
                </div>
            </div>

            <input type="hidden" id="a1"><input type="hidden" id="a2"><input type="hidden" id="a3">
            <input type="hidden" id="a4"><input type="hidden" id="a5"><input type="hidden" id="a6">

            </div>
        </div>
        </div>

        <!-- RESULT -->
        <div class="col-lg-5">
        <div class="card mj-card">
            <div class="card-body">
            <h5 class="font-weight-bold mb-2"><i class="fas fa-sparkles"></i> Hasil Rekomendasi</h5>
            <div class="text-muted mb-3">Muncul setelah selesai menjawab 6 pertanyaan.</div>

            <div id="result" class="mj-skel">
                <div class="text-muted">Belum ada hasil. Mulai dari step 1 dulu ya 🙂</div>
            </div>

            <hr>

            <div class="mj-bars" id="bars" style="display:none;">
                <div class="small text-muted mb-2"><b>Skor Minat</b> (bukan nilai ujian)</div>
                <div id="barsInner"></div>
            </div>
            </div>
        </div>
        </div>
    </div>

    </div>

    <?= $this->endSection() ?>

    <?= $this->section('script') ?>
    <script>
    const qs = [
        {
        key:'a1',
        title:'Bidang apa yang paling bikin kamu semangat?',
        opts:[
            {v:'tech', ic:'fa-laptop-code', t:'Teknologi', d:'Ngoding, aplikasi, AI, cybersecurity.'},
            {v:'health', ic:'fa-heartbeat', t:'Kesehatan', d:'Farmasi, keperawatan, gizi, lab.'},
            {v:'business', ic:'fa-briefcase', t:'Bisnis', d:'Manajemen, akuntansi, usaha, marketing.'},
            {v:'social', ic:'fa-comments', t:'Sosial & Komunikasi', d:'Public speaking, relasi, organisasi.'},
            {v:'creative', ic:'fa-palette', t:'Kreatif', d:'Desain, konten, branding, multimedia.'},
            {v:'education', ic:'fa-chalkboard-teacher', t:'Pendidikan', d:'Mengajar, bimbingan, pembinaan.'},
        ]
        },
        {
        key:'a2',
        title:'Aktivitas mana yang paling kamu enjoy?',
        opts:[
            {v:'build', ic:'fa-cogs', t:'Bikin/merakit sesuatu', d:'Proyek, eksperimen, bikin produk.'},
            {v:'help', ic:'fa-hand-holding-heart', t:'Bantu orang langsung', d:'Peduli, telaten, service.'},
            {v:'sell', ic:'fa-bullseye', t:'Target & strategi', d:'Jualan, growth, bisnis.'},
            {v:'speak', ic:'fa-microphone', t:'Ngomong & presentasi', d:'Cerita, debat, public.'},
            {v:'design', ic:'fa-pen-nib', t:'Desain & estetika', d:'Visual, branding, kreatif.'},
            {v:'teach', ic:'fa-book', t:'Jelaskan ke orang', d:'Ngajar, mentoring, sharing.'},
        ]
        },
        {
        key:'a3',
        title:'Gaya kerja yang paling menggambarkan kamu?',
        opts:[
            {v:'logic', ic:'fa-brain', t:'Problem solver', d:'Suka logika, analisis, debugging.'},
            {v:'empathy', ic:'fa-seedling', t:'Empatik & sabar', d:'Telaten, suka membantu.'},
            {v:'lead', ic:'fa-chess-king', t:'Leader/organizer', d:'Ngatur tim, planning.'},
            {v:'network', ic:'fa-users', t:'Networker', d:'Relasi, kolaborasi, teamwork.'},
            {v:'art', ic:'fa-wand-magic-sparkles', t:'Ide kreatif', d:'Eksplor konsep & visual.'},
            {v:'mentor', ic:'fa-user-graduate', t:'Mentor', d:'Bimbing, jelasin, edukasi.'},
        ]
        },
        {
        key:'a4',
        title:'Mata pelajaran yang paling “klik” buat kamu?',
        opts:[
            {v:'math', ic:'fa-square-root-alt', t:'Matematika', d:'Logika & hitung.'},
            {v:'bio', ic:'fa-dna', t:'Biologi', d:'Sains hidup & kesehatan.'},
            {v:'econ', ic:'fa-chart-line', t:'Ekonomi', d:'Bisnis & uang.'},
            {v:'indo', ic:'fa-pen', t:'Bahasa/Indonesia', d:'Menulis & komunikasi.'},
            {v:'art', ic:'fa-paint-brush', t:'Seni', d:'Visual & kreativitas.'},
            {v:'ped', ic:'fa-school', t:'Pendidikan', d:'Materi & mengajar.'},
        ]
        },
        {
        key:'a5',
        title:'Target karier paling kamu pengen?',
        opts:[
            {v:'engineer', ic:'fa-robot', t:'Tech/Engineer', d:'Software, data, keamanan.'},
            {v:'medic', ic:'fa-user-md', t:'Bidang Medis', d:'Klinis, lab, kesehatan.'},
            {v:'entrepreneur', ic:'fa-store', t:'Entrepreneur', d:'Bangun usaha sendiri.'},
            {v:'creator', ic:'fa-camera-retro', t:'Creator', d:'Konten, desain, creative industry.'},
            {v:'public', ic:'fa-bullhorn', t:'Public/Komunikasi', d:'Humas, organisasi, komunikasi.'},
            {v:'teacher', ic:'fa-chalkboard', t:'Pendidik', d:'Guru, pelatih, mentor.'},
        ]
        },
        {
        key:'a6',
        title:'Kamu lebih cocok dengan situasi seperti apa?',
        opts:[
            {v:'calm', ic:'fa-moon', t:'Tenang & fokus', d:'Kerja rapi, minim distraksi.'},
            {v:'fast', ic:'fa-bolt', t:'Ritme cepat', d:'Siap kerja cepat & responsif.'},
            {v:'people', ic:'fa-people-group', t:'Banyak interaksi', d:'Ketemu orang, komunikasi.'},
            {v:'detail', ic:'fa-magnifying-glass', t:'Detail-oriented', d:'Teliti, presisi.'},
            {v:'solo', ic:'fa-user', t:'Mandiri', d:'Nyaman kerja sendiri.'},
            {v:'team', ic:'fa-users-gear', t:'Tim', d:'Suka kerja bareng.'},
        ]
        },
    ];

    let step = 1;

    function setActiveDots(){
        for(let i=1;i<=6;i++){
        document.getElementById('dot'+i).classList.toggle('active', i===step);
        }
        document.getElementById('stepText').textContent = step;
        document.getElementById('prog').style.width = ((step-1)/5*100) + '%';
        document.getElementById('btnBack').disabled = (step===1);
        document.getElementById('btnNext').innerHTML = step===6 ? 'Lihat Hasil <i class="fas fa-sparkles"></i>' : 'Lanjut <i class="fas fa-arrow-right"></i>';
    }

    function renderQuestion(){
        const q = qs[step-1];
        const chosen = document.getElementById(q.key).value;

        const tiles = q.opts.map(o => `
        <div class="mj-tile ${chosen===o.v?'selected':''}" data-k="${q.key}" data-v="${o.v}">
            <div class="mj-ic"><i class="fas ${o.ic}"></i></div>
            <div>
            <h6>${o.t}</h6>
            <p>${o.d}</p>
            </div>
        </div>
        `).join('');

        document.getElementById('qBox').innerHTML = `
        <div class="mb-2">
            <div class="mj-qtitle h5 mb-1">${step}) ${q.title}</div>
            <div class="text-muted small">Pilih 1 yang paling menggambarkan kamu.</div>
        </div>
        <div class="mj-grid">${tiles}</div>
        `;

        setActiveDots();
    }

    function getKey(stepIndex){ return qs[stepIndex-1].key; }
    function isAnswered(stepIndex){
        const k = getKey(stepIndex);
        return !!document.getElementById(k).value;
    }

    document.addEventListener('click', async (e) => {
        const tile = e.target.closest('.mj-tile');
        if(tile){
        const k = tile.dataset.k;
        const v = tile.dataset.v;

        // set value
        document.getElementById(k).value = v;

        // highlight selection
        renderQuestion();
        return;
        }
    });

    document.getElementById('btnBack').addEventListener('click', ()=>{
        if(step>1){ step--; renderQuestion(); }
    });

    document.getElementById('btnSkip').addEventListener('click', ()=>{
        const q = qs[step-1];
        const rnd = q.opts[Math.floor(Math.random()*q.opts.length)].v;
        document.getElementById(q.key).value = rnd;
        renderQuestion();
    });

    document.getElementById('btnNext').addEventListener('click', async ()=>{
        if(!isAnswered(step)){
        // kecil tapi ngena: shake via bootstrap class
        const box = document.getElementById('qBox');
        box.style.transform='translateX(-6px)';
        setTimeout(()=>box.style.transform='translateX(6px)', 80);
        setTimeout(()=>box.style.transform='translateX(0)', 160);
        return;
        }

        if(step < 6){
        step++;
        renderQuestion();
        return;
        }

        // submit
        const payload = new URLSearchParams();
        for(let i=1;i<=6;i++){
        const k = getKey(i);
        payload.append(k, document.getElementById(k).value);
        }

        const res = await fetch("<?= base_url('matching-jurusan/submit') ?>", {
        method:'POST',
        headers:{'Content-Type':'application/x-www-form-urlencoded'},
        body: payload.toString()
        });

        const json = await res.json();
        if(!json.ok){
        document.getElementById('result').innerHTML = `<div class="text-danger"><b>Gagal:</b> ${json.message || 'Error'}</div>`;
        return;
        }

        const r = json.result;
        const majors = (r.majors || []).map((m,i)=>`
        <div class="d-flex align-items-center mb-2">
            <div class="mr-2" style="width:30px;height:30px;border-radius:12px;background:rgba(94,231,255,.18);display:grid;place-items:center;">
            <i class="fas fa-fire"></i>
            </div>
            <div><b>#${i+1}</b> ${m}</div>
        </div>
        `).join('');

        const reasons = (r.reasons || []).map(x=>`<li class="mb-1">${x}</li>`).join('');

        document.getElementById('result').innerHTML = `
        <div class="mb-2"><b>Paling cocok:</b> <span class="badge badge-info">${r.top[0].label}</span>
        <span class="badge badge-light ml-1">Runner-up: ${r.top[1].label}</span></div>

        <div class="mb-2">${majors}</div>

        <div class="mt-3">
            <div class="small text-muted mb-1"><b>Kenapa cocok?</b></div>
            <ul class="small text-muted pl-3 mb-0">${reasons || '<li>Jawabanmu konsisten ke bidang ini.</li>'}</ul>
        </div>

        <div class="mt-3 small text-muted">
            Saran: diskusikan juga dengan orang tua / guru BK ya.
        </div>
        `;

        // bars
        document.getElementById('bars').style.display = 'block';
        const bars = Object.entries(r.scores || {}).map(([k,v])=>{
        const label = {
            tech:'Teknologi', health:'Kesehatan', business:'Bisnis', social:'Sosial', creative:'Kreatif', education:'Pendidikan'
        }[k] || k;
        const pct = Math.min(100, Math.round(v)); // v sudah 0..~100
        return `
            <div class="mb-2">
            <div class="d-flex justify-content-between small text-muted">
                <span>${label}</span><span>${pct}</span>
            </div>
            <div class="bar"><div style="width:${pct}%"></div></div>
            </div>
        `;
        }).join('');
        document.getElementById('barsInner').innerHTML = bars;

        // scroll small
        window.scrollTo({top:0, behavior:'smooth'});
    });

    renderQuestion();
    </script>
    <?= $this->endSection() ?>
