<?php
include 'auth.php';
include 'db.php';

# Envio de datos al servidor mediante post

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $titulo = $_POST['titulo'];
  $descripcion = $_POST['descripcion'];
  $url_github = $_POST['url_github'];
  $url_produccion = $_POST['url_produccion'];

  $imagen = $_FILES['imagen']['name'];
  $tmp = $_FILES['imagen']['tmp_name'];
  move_uploaded_file($tmp, "../uploads/$imagen");

# Preparar la consulta segura

  $stmt = $conn->prepare("INSERT INTO proyectos (titulo, descripcion, url_github, url_produccion, imagen) VALUES (?, ?, ?, ?, ?)");
  $stmt->bind_param("sssss", $titulo, $descripcion, $url_github, $url_produccion, $imagen);
  $stmt->execute();

  header("Location: index.php");
  exit();
}
?>

<link rel="stylesheet" href="..\assets\css\add-style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>



 <header>
    <a href="index.php">
      <img src="https://www.devilmaycry.com/5/assets/img/age/logo.png" alt="">
    </a>
  </header>
  
  <nav>
      <ul>
        <li>
          <a href="add.php">Agregar Proyecto</a> 
        </li>
        <li>
          <a href="logout.php">Cerrar sesión</a>
        </li>
      </ul>
  </nav>

<section id="add">
  <div class="container">
    <h2 class="text-center mb-4">Agrega un proyecto</h2>
    <div class="row justify-content-center">
      <div class="col-md-6">
          <form method="post" enctype="multipart/form-data">
            <label for="">Titulo</label>
            <input class="form-control" type="text" name="titulo" placeholder="Titulo del proyecto" required><br>
            <label class="form-label" for="">Descripcion</label>
            <textarea class="form-control" name="descripcion" maxlength="200" placeholder="Descripción del proyecto(máx 200 palabras)" required></textarea><br>
            <label class="form-label" for="">URL GitHub</label>
            <input class="form-control" type="url" name="url_github" placeholder="URL GitHub"><br>
            <label class="form-label" for="">URL Producción</label>
            <input class="form-control" type="url" name="url_produccion" placeholder="URL Producción"><br>
            <label class="form-label" for="">Adjunte la portada del proyecto</label>
            <input class="form-control" type="file" name="imagen" required><br>
          <button class="btn btn-primary" type="submit">Guardar</button>
      </form>
      </div>
    </div>
  </div>
</section>

