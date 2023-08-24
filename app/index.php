<?php
  include_once "../app/classes/database.php";

  $database = new Database();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
    crossorigin="anonymous"></script>
  <title>MEDTIME</title>
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <ion-icon class="logo-medic" name="medical"></ion-icon>
        <a class="navbar-brand logo-typho" href="#">MEDTIME</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Acessar medicamentos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Consultar agenda</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <main class="main-page">
    <aside class="form-medication">
      <h3>Cadastrar medicamento</h3>
      <form action="../actions/add_medication.php?" class="w-10" method="POST">
        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="floatingInput" placeholder="Medicamento" name="name">
          <label for="floatingInput">Medicamento</label>
        </div>
        <div class="form-floating mb-3">
          <input type="time" class="form-control" id="floatingInput" name="hour">
          <label for="floatingInput">Tomar a cada</label>
        </div>
        <div class="form-floating mb-3">
          <input type="date" class="form-control" id="floatingInput" name="date_start">
          <label for="floatingInput">Data de início</label>
        </div>
        <div class="form-floating mb-3">
          <input type="date" class="form-control" id="floatingInput" name="date_end">
          <label for="floatingInput">Data de término</label>
        </div>
        <button type="submit" class="btn btn-success">Confirmar</button>
      </form>
    </aside>
    <div>
      <h3>Lista de medicamentos</h3>
      <ul class="list-group">
        <?php
          $medication = $database->select("*");
          $ativo = false;
          foreach ($medication as $data) {
            if($data['status'] == "Ativo") $ativo = true;
        ?>
          <li class='list-group-item medication-item'>
            <div class='d-flex align-items-center justify-content-between'>
              <span class='medication-card'>
                <p class='fw-medium h-0'>
                  <?php echo $data['date_start'];?> - <?php echo $data['date_end'];?>
                </p>
                <h4><?=$data["name"]?></h4>
              </span>
              <span class='d-flex align-items-center gap-1 me-2'>
              <?=$data["hour"]?>
                <span class='medication-status'>
                  <?php 
                    echo $ativo ? "<ion-icon name='time-sharp'></ion-icon>" : "<ion-icon class='time' name='checkmark-sharp'></ion-icon>"
                    ?>
                </span>
              </span>
            </div>
          </li>
        <?php
          }  
        ?>
      </ul>
    </div>
  </main>

</body>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
  integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"
  integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</html>

<!--
<?php
        
      ?>
-->