<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class MatchingJurusan extends Controller
{
    public function index()
    {
        if (session()->get('level') !== 'user') {
            return redirect()->to(base_url('auth/login'))->with('error', 'Akses ditolak.');
        }

        return view('matching_jurusan/index', [
            'title' => 'Sistem PPDB Online',
            'subtitle' => 'Matching Jurusan',
        ]);
    }

    public function submit()
    {
        if (session()->get('level') !== 'user') {
            return $this->response->setStatusCode(403)->setJSON(['ok'=>false,'message'=>'Akses ditolak']);
        }

        $a1 = (string) $this->request->getPost('a1'); // bidang
        $a2 = (string) $this->request->getPost('a2'); // aktivitas
        $a3 = (string) $this->request->getPost('a3'); // gaya kerja
        $a4 = (string) $this->request->getPost('a4'); // mapel
        $a5 = (string) $this->request->getPost('a5'); // karier
        $a6 = (string) $this->request->getPost('a6'); // ketahanan stres/lingkungan (khusus kesehatan/umum)

        $answers = [$a1,$a2,$a3,$a4,$a5,$a6];
        foreach ($answers as $x) {
            if ($x === '') {
                return $this->response->setStatusCode(400)->setJSON([
                    'ok'=>false,'message'=>'Lengkapi semua pertanyaan dulu ya.'
                ]);
            }
        }

        $result = $this->scoreAndRecommend($a1,$a2,$a3,$a4,$a5,$a6);

        return $this->response->setJSON([
            'ok' => true,
            'result' => $result,
        ]);
    }

    private function scoreAndRecommend(string $a1, string $a2, string $a3, string $a4, string $a5, string $a6): array
    {
        // Cluster minat (kamu bisa tambah/ubah jurusan mapping)
        $clusters = [
            'tech' => ['label'=>'Teknologi', 'majors'=>['Informatika','Sistem Informasi','RPL','Teknik Komputer']],
            'health' => ['label'=>'Kesehatan', 'majors'=>['Farmasi','Keperawatan','Kesehatan Masyarakat','Gizi']],
            'business' => ['label'=>'Bisnis', 'majors'=>['Manajemen','Akuntansi','Bisnis Digital','Kewirausahaan']],
            'social' => ['label'=>'Sosial', 'majors'=>['Ilmu Komunikasi','Fisipol','Administrasi Publik','Psikologi']],
            'creative' => ['label'=>'Kreatif', 'majors'=>['DKV','Desain Interior','Multimedia','Broadcasting']],
            'education' => ['label'=>'Pendidikan', 'majors'=>['Pendidikan','BK','PGSD','Pendidikan Bahasa']],
        ];

        $score = array_fill_keys(array_keys($clusters), 0);
        $why = array_fill_keys(array_keys($clusters), []);

        // ---- Q1 Bidang paling bikin semangat
        // a1: tech|health|business|social|creative|education
        if (isset($score[$a1])) {
            $score[$a1] += 28;
            $why[$a1][] = 'Bidang yang kamu pilih paling kamu minati.';
        }

        // ---- Q2 Aktivitas favorit
        // a2: build|help|sell|speak|design|teach
        switch ($a2) {
            case 'build': $score['tech'] += 18; $why['tech'][]='Kamu suka bikin/merakit/membangun sesuatu.'; break;
            case 'help':  $score['health'] += 18; $why['health'][]='Kamu suka membantu orang dan peduli kesehatan.'; break;
            case 'sell':  $score['business'] += 18; $why['business'][]='Kamu suka strategi, jualan, dan target.'; break;
            case 'speak': $score['social'] += 18; $why['social'][]='Kamu suka komunikasi, cerita, dan publik.'; break;
            case 'design':$score['creative'] += 18; $why['creative'][]='Kamu suka visual, desain, dan kreativitas.'; break;
            case 'teach': $score['education'] += 18; $why['education'][]='Kamu suka menjelaskan dan membimbing.'; break;
        }

        // ---- Q3 Gaya kerja
        // a3: logic|empathy|lead|network|art|mentor
        switch ($a3) {
            case 'logic':  $score['tech'] += 14; $why['tech'][]='Kamu nyaman dengan problem solving & logika.'; break;
            case 'empathy':$score['health'] += 14; $score['social'] += 8; $why['health'][]='Kamu empatik dan telaten.'; $why['social'][]='Empati bagus untuk bidang sosial.'; break;
            case 'lead':   $score['business'] += 14; $why['business'][]='Kamu suka memimpin dan mengatur.'; break;
            case 'network':$score['social'] += 14; $why['social'][]='Kamu suka membangun relasi dan kolaborasi.'; break;
            case 'art':    $score['creative'] += 14; $why['creative'][]='Kamu suka eksplor ide dan estetika.'; break;
            case 'mentor': $score['education'] += 14; $why['education'][]='Kamu suka mengajar/membimbing.'; break;
        }

        // ---- Q4 Mata pelajaran paling “klik”
        // a4: math|bio|econ|indo|art|ped
        switch ($a4) {
            case 'math': $score['tech'] += 16; $score['business'] += 8; $why['tech'][]='Kamu kuat di matematika/logika.'; break;
            case 'bio':  $score['health'] += 16; $why['health'][]='Kamu cocok di biologi & sains kesehatan.'; break;
            case 'econ': $score['business'] += 16; $why['business'][]='Kamu klik dengan ekonomi/bisnis.'; break;
            case 'indo': $score['social'] += 16; $why['social'][]='Kamu kuat di bahasa/komunikasi.'; break;
            case 'art':  $score['creative'] += 16; $why['creative'][]='Kamu klik di seni/desain.'; break;
            case 'ped':  $score['education'] += 16; $why['education'][]='Kamu suka dunia pendidikan.'; break;
        }

        // ---- Q5 Target karier
        // a5: engineer|medic|entrepreneur|creator|public|teacher
        switch ($a5) {
            case 'engineer':   $score['tech'] += 16; $why['tech'][]='Arah kariermu cocok dengan dunia teknologi.'; break;
            case 'medic':      $score['health'] += 16; $why['health'][]='Arah kariermu cocok dengan dunia kesehatan.'; break;
            case 'entrepreneur':$score['business'] += 16; $why['business'][]='Arah kariermu cocok dengan bisnis & usaha.'; break;
            case 'creator':    $score['creative'] += 16; $why['creative'][]='Arah kariermu cocok dengan industri kreatif.'; break;
            case 'public':     $score['social'] += 16; $why['social'][]='Arah kariermu cocok dengan komunikasi/publik.'; break;
            case 'teacher':    $score['education'] += 16; $why['education'][]='Arah kariermu cocok dengan pendidikan.'; break;
        }

        // ---- Q6 Ketahanan situasi/ritme (spesifik)
        // a6: calm|fast|people|detail|solo|team
        switch ($a6) {
            case 'calm':  $score['tech'] += 6; $score['creative'] += 6; break;
            case 'fast':  $score['health'] += 10; $score['business'] += 6; $why['health'][]='Kamu siap ritme cepat—bagus untuk kesehatan.'; break;
            case 'people':$score['social'] += 10; $score['education'] += 6; break;
            case 'detail':$score['health'] += 8; $score['tech'] += 6; break;
            case 'solo':  $score['tech'] += 6; $score['creative'] += 6; break;
            case 'team':  $score['business'] += 6; $score['social'] += 6; break;
        }

        // sort cluster by score
        arsort($score);
        $topKeys = array_slice(array_keys($score), 0, 2);

        $top1 = $topKeys[0];
        $top2 = $topKeys[1];

        // recommendations: 3 majors = 2 dari top1 + 1 dari top2
        $majors = [];
        $majors[] = $clusters[$top1]['majors'][0];
        $majors[] = $clusters[$top1]['majors'][1] ?? $clusters[$top1]['majors'][0];
        $majors[] = $clusters[$top2]['majors'][0];

        // build reasons (max 4)
        $reasons = array_slice(array_values(array_unique($why[$top1])), 0, 4);

        return [
            'scores' => $score,
            'top' => [
                ['key'=>$top1,'label'=>$clusters[$top1]['label'],'score'=>$score[$top1]],
                ['key'=>$top2,'label'=>$clusters[$top2]['label'],'score'=>$score[$top2]],
            ],
            'majors' => $majors,
            'reasons' => $reasons,
        ];
    }
}
