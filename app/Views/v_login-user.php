<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Admin Login | PPDB Online</title>

<link rel="stylesheet" href="<?= base_url('assets/AdminLTE/plugins/fontawesome-free/css/all.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/AdminLTE/dist/css/adminlte.min.css') ?>">

<style>
:root{
    --blue-dark:#081a3c;
    --blue-dark-2:#020c22;
    --gold:#d4af37;
}

/* ===== BACKGROUND ===== */
body{
    min-height:100vh;
    background:
    linear-gradient(-45deg,#020c22,#081a3c,#0f2b66,#081a3c);
background-size:400% 400%;
animation:bgMove 12s ease infinite;
display:flex;
    align-items:center;
    justify-content:center;
    font-family:'Segoe UI',sans-serif;
}

@keyframes bgMove{
    0%{background-position:0% 50%}
    50%{background-position:100% 50%}
    100%{background-position:0% 50%}
}

/* ===== CARD ===== */
.login-box{
    width:410px;
    animation:fadeUp 1s ease;
}

@keyframes fadeUp{
    from{opacity:0;transform:translateY(60px)}
    to{opacity:1;transform:translateY(0)}
}

.card{
    background:rgba(255,255,255,0.88);
    backdrop-filter:blur(18px);
    border-radius:22px;
    box-shadow:0 40px 80px rgba(0,0,0,.5);
    overflow:hidden;
}

/* GOLD ACCENT */
.card::before{
    content:'';
    height:4px;
    width:100%;
    background:linear-gradient(90deg,var(--gold),#f6e27a,var(--gold));
    display:block;
}

/* ===== HEADER ===== */
.card-header{
    text-align:center;
    border:none;
    padding:35px 20px 10px;
}

.admin-icon{
    width:80px;
    height:80px;
    margin:auto;
    border-radius:50%;
    background:linear-gradient(135deg,var(--gold),#b8962e);
    display:flex;
    align-items:center;
    justify-content:center;
    color:var(--blue-dark);
    font-size:34px;
    box-shadow:0 12px 30px rgba(0,0,0,.4);
}

.card-header h3{
    margin-top:12px;
    font-weight:700;
    color:var(--blue-dark);
}

.card-header small{
    color:#666;
}

/* ===== INPUT ===== */
.form-control{
    height:50px;
    border-radius:16px;
    padding-right:48px;
}

.input-group-text{
    background:transparent;
    border-left:none;
}

.toggle-password{
    cursor:pointer;
    color:#777;
}
.toggle-password:hover{color:var(--blue-dark);}

/* ===== BUTTON ===== */
.btn-login{
    height:50px;
    border-radius:30px;
    background:linear-gradient(135deg,var(--gold),#b8962e);
    color:var(--blue-dark);
    font-weight:700;
    letter-spacing:.5px;
    transition:.4s;
}

.btn-login:hover{
    transform:translateY(-3px);
    box-shadow:0 14px 35px rgba(0,0,0,.45);
}

/* ===== LOADING OVERLAY ===== */
.loading{
    position:fixed;
    inset:0;
    background:rgba(2,12,34,.75);
    display:none;
    align-items:center;
    justify-content:center;
    z-index:9999;
}

.spinner{
    width:70px;
    height:70px;
    border:6px solid rgba(255,255,255,.3);
    border-top:6px solid var(--gold);
    border-radius:50%;
    animation:spin 1s linear infinite;
}

@keyframes spin{
    to{transform:rotate(360deg)}
}
</style>
</head>

<body>

<!-- LOADING -->
<div class="loading" id="loading">
    <div class="spinner"></div>
</div>

<div class="login-box">
    <div class="card">

        <div class="card-header">
            <div class="admin-icon">
                <i class="fas fa-user-shield"></i>
            </div>
            <h3>ADMIN LOGIN</h3>
            <small>PPDB Online 2025</small>
        </div>

        <div class="card-body px-4 pb-4">
            <form action="<?= base_url('auth/cek_login_user') ?>" method="post" onsubmit="showLoading()">

                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email Admin" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <i class="fas fa-envelope"></i>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-4">
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                    <div class="input-group-append">
                        <div class="input-group-text toggle-password" onclick="togglePassword()">
                            <i class="fas fa-eye" id="eye"></i>
                        </div>
                    </div>
                </div>

                <button class="btn btn-login btn-block" id="btnLogin">
                    <i class="fas fa-sign-in-alt"></i> LOGIN
                </button>

            </form>
        </div>

        <div class="card-footer text-center bg-transparent border-0">
            <small>
                <i class="fas fa-globe"></i>
                <a href="<?= base_url('') ?>">Kembali ke Website</a>
            </small>
        </div>

    </div>
</div>

<script>
function togglePassword(){
    const p=document.getElementById('password');
    const i=document.getElementById('eye');
    if(p.type==='password'){
        p.type='text'; i.classList.replace('fa-eye','fa-eye-slash');
    }else{
        p.type='password'; i.classList.replace('fa-eye-slash','fa-eye');
    }
}

function showLoading(){
    document.getElementById('loading').style.display='flex';
    document.getElementById('btnLogin').disabled=true;
}
</script>

<!-- jQuery -->
<script src="<?= base_url('assets/AdminLTE/plugins/jquery/jquery.min.js')?>"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/AdminLTE/dist/js/adminlte.min.js')?>"></script>

</body>
</html>
