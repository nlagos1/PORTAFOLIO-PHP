<?php
include 'auth.php';
include 'db.php';

$id = $_GET['id'];
$proyecto = $conn->query("SELECT * FROM proyectos WHERE id=$id")->fetch_assoc();

# Verificación de existencia de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $titulo = $_POST['titulo'];
  $descripcion = $_POST['descripcion'];
  $url_github = $_POST['url_github'];
  $url_produccion = $_POST['url_produccion'];

  if ($_FILES['imagen']['name']) {
    $imagen = $_FILES['imagen']['name'];
    move_uploaded_file($_FILES['imagen']['tmp_name'], "uploads/$imagen");
    $img_sql = ", imagen='$imagen'";
  } else {
    $img_sql = "";
  }

# Envio de datos a la base de datos

  $sql = "UPDATE proyectos SET titulo='$titulo', descripcion='$descripcion', url_github='$url_github', url_produccion='$url_produccion' $img_sql WHERE id=$id";
  $conn->query($sql);
  header("Location: index.php");
}
?>

<link rel="stylesheet" href="..\assets\css\edit-style.css">
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

  <section id="edit">
    <div class="container">
      <h2 class="text-center mb-4">Editar</h2>
      <div class="row justify-content-center">
        <form method="post" enctype="multipart/form-data">
          <label class="form-label" for="">Titulo del proyecto</label>
          <input class="form-control" type="text" name="titulo" value="<?= $proyecto['titulo'] ?>" required><br>
          <label class="form-label" for="">Descripcion del proyecto</label>
          <textarea class="form-control" name="descripcion"><?= $proyecto['descripcion'] ?></textarea><br>
          <label class="form-label" for="">URL de GitHub</label>
          <input class="form-control" type="url" name="url_github" value="<?= $proyecto['url_github'] ?>"><br>
          <label class="form-label" for="">URL Produccion</label>
          <input class="form-control" type="url" name="url_produccion" value="<?= $proyecto['url_produccion'] ?>"><br>
          <label class="form-label" for="">Adjunte la portada del proyecto</label>
          <input class="form-control" type="file" name="imagen"><br>
          <button class="btn btn-primary" type="submit">Actualizar</button>
        </form>
      </div>
    </div>
  </section>
