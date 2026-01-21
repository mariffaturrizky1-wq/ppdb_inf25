<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Contact PPDB SMA Brebes</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

<style>
body {
    background: linear-gradient(135deg, #0a2a66, #0d47a1);
    min-height: 100vh;
    font-family: 'Segoe UI', sans-serif;
    display: flex;
    align-items: center;
    justify-content: center;
}

.glass-card {
    background: rgba(255,255,255,.15);
    backdrop-filter: blur(15px);
    border-radius: 25px;
    padding: 40px;
    max-width: 420px;
    width: 100%;
    color: #fff;
    box-shadow: 0 25px 50px rgba(0,0,0,.3);
    animation: fadeUp .8s ease;
}

@keyframes fadeUp {
    from {opacity:0; transform: translateY(30px);}
    to {opacity:1; transform: translateY(0);}
}

.profile {
    text-align: center;
}

.profile img {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    border: 4px solid #ffd700;
    margin-bottom: 15px;
}

.profile h4 {
    font-weight: 700;
}

.profile p {
    font-size: 14px;
    opacity: .9;
}

.stats {
    display: flex;
    justify-content: space-around;
    margin: 25px 0;
}

.stats div {
    text-align: center;
}

.stats span {
    font-weight: 700;
    font-size: 18px;
}

.social-btn {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 14px;
    border-radius: 14px;
    text-decoration: none;
    color: #fff;
    margin-bottom: 12px;
    transition: .3s;
}

.social-btn i {
    font-size: 20px;
}

.social-btn.ig {
    background: linear-gradient(45deg, #f58529, #dd2a7b, #8134af);
}

.social-btn.wa {
    background: #25D366;
}

.social-btn.mail {
    background: #1e88e5;
}

.social-btn:hover {
    transform: translateY(-4px);
    box-shadow: 0 10px 20px rgba(0,0,0,.3);
}

.cta {
    text-align: center;
    margin-top: 20px;
}

.cta a {
    color: #ffd700;
    font-weight: 600;
    text-decoration: none;
}
</style>
</head>
<body>

<div class="glass-card">

    <div class="profile">
        <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="PPDB">
        <h4>PPDB SMA Brebes</h4>
        <p>Informasi & Bantuan Pendaftaran<br>SMA se-Kabupaten Brebes</p>
    </div>

    <div class="stats">
        <div>
            <span>52</span>
            <div>SMA</div>
        </div>
        <div>
            <span>2025</span>
            <div>PPDB</div>
        </div>
        <div>
            <span>24/7</span>
            <div>Support</div>
        </div>
    </div>

    <a href="https://instagram.com/ppdbbrebes" class="social-btn ig" target="_blank">
        <i class="fab fa-instagram"></i>
        <div>
            <strong>Instagram</strong><br>
            @ppdbbrebes
        </div>
    </a>

    <a href="https://wa.me/6281234567890?text=Halo%20PPDB%20SMA%20Brebes,%20saya%20ingin%20bertanya"
       class="social-btn wa" target="_blank">
        <i class="fab fa-whatsapp"></i>
        <div>
            <strong>WhatsApp</strong><br>
            Chat langsung panitia
        </div>
    </a>

    <a href="mailto:ppdb@brebes.go.id" class="social-btn mail">
        <i class="fas fa-envelope"></i>
        <div>
            <strong>Email Resmi</strong><br>
            ppdb@brebes.go.id
        </div>
    </a>

    <div class="cta">
        <a href="/register">➡️ Daftar PPDB Sekarang</a>
    </div>

</div>

</body>
</html>
