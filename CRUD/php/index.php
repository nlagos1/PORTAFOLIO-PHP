<?php
include 'auth.php';
include 'db.php';
$result = $conn->query("SELECT * FROM proyectos ORDER BY created_at DESC");
?>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
<link rel="stylesheet" href="..\assets\css\index-style.css">

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
  <main>
    <h2 class="text-center my-4">Proyectos</h2>
<div class="container">
  <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-4">
    <?php while($row = $result->fetch_assoc()): ?>
      <div class="col">
        <div class="card h-100 shadow-sm">
          <img src="../uploads/<?= $row['imagen'] ?>" class="card-img-top" alt="Imagen del proyecto">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title"><?= $row['titulo'] ?></h5>
            <p class="card-text"><?= $row['descripcion'] ?></p>
            <div class="mt-auto">
              <div class="mb-2">
                <a href="<?= $row['url_github'] ?>" class="btn btn-outline-dark btn-sm me-2">GitHub</a>
                <a href="<?= $row['url_produccion'] ?>" class="btn btn-outline-primary btn-sm">Produccion</a>
              </div>
              <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm me-2">Editar</a>
              <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro?')">Eliminar</a>
            </div>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
</div>
</main>
  