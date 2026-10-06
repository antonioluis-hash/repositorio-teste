<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Paróquia Nossa Senhora</title>

  <style>
:root{
  --azul:#102d68;
  --azul2:#1c4a9e;
  --dourado:#d4af37;
  --dourado2:#f2d675;
  --claro:#f7f9fc;
  --texto:#243247;
  --cinza:#697586;
  --branco:#fff;
  --sombra:0 15px 45px rgba(16,45,104,.12);
}
*{margin:0;padding:0;box-sizing:border-box}
html{scroll-behavior:smooth}
body{
  font-family:"Segoe UI",Arial,sans-serif;
  color:var(--texto);
  background:linear-gradient(135deg,#f8fafc,#edf3fb);
  line-height:1.7;
}
header{
  background:rgba(16,45,104,.97);
  color:#fff;
  min-height:76px;
  padding:14px 5%;
  display:flex;
  align-items:center;
  justify-content:space-between;
  gap:25px;
  position:sticky;
  top:0;
  z-index:1000;
  border-bottom:2px solid var(--dourado);
  box-shadow:0 8px 25px rgba(0,0,0,.15);
}
header h1{
  font-family:Georgia,serif;
  font-size:clamp(20px,3vw,29px);
  letter-spacing:.3px;
}
nav{display:flex;align-items:center;flex-wrap:wrap;gap:5px}
nav a{
  color:#fff;
  text-decoration:none;
  font-weight:600;
  padding:9px 14px;
  border-radius:25px;
  transition:.25s ease;
}
nav a:hover{background:rgba(255,255,255,.1);color:var(--dourado2);transform:translateY(-2px)}

.hero{
  min-height:76vh;
  position:relative;
  overflow:hidden;
  display:flex;
  flex-direction:column;
  align-items:center;
  justify-content:center;
  text-align:center;
  color:#fff;
  padding:100px 20px;
  background:
    linear-gradient(125deg,rgba(5,19,48,.88),rgba(16,45,104,.58)),
    url("paroquia_.webp") center/cover no-repeat;
}
.hero:after{
  content:"";
  position:absolute;
  left:-5%;
  right:-5%;
  bottom:-70px;
  height:130px;
  background:#f7f9fc;
  border-radius:50% 50% 0 0;
}
.hero h2{
  position:relative;
  z-index:1;
  max-width:950px;
  font-family:Georgia,serif;
  font-size:clamp(40px,6vw,70px);
  line-height:1.08;
  text-shadow:0 5px 25px rgba(0,0,0,.45);
  margin-bottom:20px;
}
.hero p{
  position:relative;
  z-index:1;
  font-size:clamp(18px,2.5vw,24px);
  color:#f8f5ea;
  margin-bottom:35px;
}
.hero a{
  position:relative;
  z-index:2;
  display:inline-flex;
  align-items:center;
  gap:10px;
  padding:15px 30px;
  border-radius:50px;
  background:linear-gradient(135deg,var(--dourado2),var(--dourado));
  color:#132e66;
  text-decoration:none;
  font-weight:800;
  box-shadow:0 12px 30px rgba(0,0,0,.3);
  transition:.3s ease;
}
.hero a:before{content:"✝";font-size:17px}
.hero a:hover{transform:translateY(-4px);box-shadow:0 18px 38px rgba(0,0,0,.38)}

.section{
  width:min(1120px,92%);
  margin:auto;
  padding:75px 0;
}
.section h2{
  text-align:center;
  color:var(--azul);
  font-family:Georgia,serif;
  font-size:clamp(30px,4vw,42px);
  margin-bottom:16px;
}
.section h2:after{
  content:"";
  display:block;
  width:65px;
  height:3px;
  margin:13px auto 25px;
  border-radius:5px;
  background:linear-gradient(90deg,var(--dourado),var(--dourado2));
}
.section>p{
  max-width:780px;
  margin:0 auto;
  text-align:center;
  color:var(--cinza);
  font-size:18px;
}
.cards{
  display:grid;
  grid-template-columns:repeat(3,1fr);
  gap:24px;
  margin-top:40px;
}
.card{
  position:relative;
  overflow:hidden;
  background:rgba(255,255,255,.96);
  padding:35px 25px;
  border-radius:20px;
  border:1px solid rgba(16,45,104,.08);
  box-shadow:var(--sombra);
  text-align:center;
  transition:.3s ease;
}
.card:before{
  content:"";
  display:block;
  width:48px;
  height:48px;
  margin:0 auto 17px;
  border-radius:50%;
  background:linear-gradient(135deg,var(--azul),var(--azul2));
}
.card:nth-child(1):after{content:"✝"}
.card:nth-child(2):after{content:"♥"}
.card:nth-child(3):after{content:"✦"}
.card:after{
  position:absolute;
  top:43px;
  left:50%;
  transform:translateX(-50%);
  color:var(--dourado2);
  font-size:20px;
}
.card:hover{
  transform:translateY(-9px);
  box-shadow:0 25px 55px rgba(16,45,104,.18);
}
.card h3{
  color:var(--azul);
  font-family:Georgia,serif;
  font-size:23px;
  margin-bottom:8px;
}
.card p{color:var(--cinza)}

#contato{
  margin-bottom:35px;
}
#contato p{
  margin:5px auto;
}
.footer{
  background:linear-gradient(135deg,#091f4d,var(--azul));
  color:#fff;
  text-align:center;
  padding:32px 20px;
  border-top:3px solid var(--dourado);
}
button{
  border:0;
  border-radius:50px;
  padding:12px 23px;
  background:var(--azul);
  color:#fff;
  font-weight:700;
  cursor:pointer;
  transition:.25s ease;
}
button:hover{background:#091f4d;transform:translateY(-2px)}

@media(max-width:800px){
  header{flex-direction:column;padding:15px 20px}
  nav{justify-content:center}
  nav a{padding:7px 9px;font-size:14px}
  .hero{min-height:70vh;padding:80px 18px}
  .cards{grid-template-columns:1fr}
  .section{padding:55px 0}
}
@media(max-width:480px){
  nav a{font-size:13px;padding:6px 7px}
  .hero h2{font-size:38px}
  .hero p{font-size:17px}
}
</style>
</head>
<body>
<?php
require_once "includes/cabecalho.php";
?>
<section class="hero">
  <h2>Bem-vindo à nossa comunidade</h2>
  <p>Fé, esperança e amor para todos</p>
  <a href="missas/listar_missas.php">Ver Horários de Missas</a>
  <br><br>
  <a href="logout.php">sair</a>

  
</section>

<section class="section">
  <h2>Sobre a Paróquia</h2>
  <p>Nossa missão é acolher, evangelizar e servir a comunidade com amor e dedicação.</p>
</section>

<section class="section">
  <h2>Próximos Eventos</h2>
  <div class="cards">
    <div class="card">
      <h3>Missa Dominical</h3>
      <p>Domingo às 9h</p>
    </div>
    <div class="card">
      <h3>Grupo de Jovens</h3>
      <p>Sexta às 19h</p>
    </div>
    <div class="card">
      <h3>Adoração</h3>
      <p>Quarta às 18h</p>
    </div>
  </div>
</section>

<section class="section" id="contato">
  <h2>Entre em Contato</h2>
  <p>✉ contato@paroquia.com</p>
  <p>☎ (62) 99999-9999</p>
</section>

<?php
  require_once "includes/foter.php";

?>