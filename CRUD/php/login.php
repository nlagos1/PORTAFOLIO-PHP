<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $password = md5($_POST['password']);

  $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  $result = $conn->query($sql);

  if ($result->num_rows === 1) {
    $_SESSION['user'] = $username;
    header("Location: index.php");
  } else {
    echo "Credenciales incorrectas.";
  }
}
?>

<link rel="stylesheet" href="..\assets\css\login-style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>


  <header>
    <a href="">
      <img src="https://www.devilmaycry.com/5/assets/img/age/logo.png" alt="">
    </a>
  </header>

  <section id="login">
    <div class="container">
      <h2 class="text-center mb-4">Inicia Sesión!</h2>
      <div class="row justify-content-center">
        <div class="col-md-6">
          <form  method="post">
          <input class="form-control" type="text" name="username" placeholder="Usuario" required><br>
          <input class="form-control" type="password" name="password" placeholder="Contraseña" required><br>
          <button class="btn btn-primary" type="submit">Iniciar Sesión</button>
        </form>
        </div>
      </div>
    </div>

  </section>
