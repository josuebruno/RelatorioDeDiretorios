<!doctype html>
<?php
  session_start();
if(!$_SESSION['userdn']) {
  header('Location: http://paginainicial.contoso.com.br');
  exit();
}
?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Exibe</title>
  </head>
  <body>
<?php
  use Phppot\DataSource;

  require_once '../DataSource.php';
  $db = new DataSource();
  $conn = $db->getConnection();

?>

    <!--<h1></h1>-->

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->

<nav class="navbar navbar-expand-lg navbar-light bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand text-light" href="#">Relatorio </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      
<div class="container">
  <div class="row">
    <div class="col-sm">
      
    </div>
    <div class="col-sm">
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Pesquisar" aria-label="Search">
        <button class="btn btn-outline-success bg-light" type="submit">Pesquisar</button>
      </form>
    </div>
    <div class="col-sm">
     
    </div>
  </div>
</div>

    </div>
    <button type="button" class="btn btn-dark" onclick="SairPagina()">SAIR</button>
  </div>
</nav>
<div class="container">
  <div class="row">
      <div class="col-md-6 col-sm-1 col-lg-12 text-white">
        relatorios de pastas.
      </div>
  </div>
</div>

<div class="container">
  <div class="row justify-content-md-center">
    <?php

      $pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;



            $sqlSelect = "SELECT * FROM `users` ORDER BY `users`.`firstName` limit 10000";
            $result = $db->select($sqlSelect);

              $outraq = mysqli_query($conn, $sqlSelect);


      $total_cursos = $outraq -> num_rows;
      $quantidade_pg = 50;
      $num_pagina = ceil($total_cursos/$quantidade_pg);
      $inicio = ($quantidade_pg*$pagina)-$quantidade_pg;

$result_cursos = "SELECT * FROM `users` ORDER BY `users`.`firstName` limit $inicio, $quantidade_pg";
$resultado_cursos = $db->select($result_cursos);
$total_cursos = $outraq -> num_rows;

#echo $inicio;


            if (! empty($resultado_cursos)) {
    ?>
    <table class="table table-success table-striped">
      
      <thead>
        <tr>
          <th scope="col">Caminho</th>
          <th scope="col">
            
<a class="btn fw-bold" href="http://relatoriodir.contoso.com.br/sbsb/sbsb2dptiescritadecre.php"> Ultima_Escrita </a> </th>
          <th scope="col">

<a class="btn fw-bold" href="http://relatoriodir.contoso.com.br/sbsb/sbsb2dpti.php">
            Ultima_Leitura

        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-short" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v5.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L7.5 10.293V4.5A.5.5 0 0 1 8 4z"/>
</svg>
</a>
          </th>
          <th scope="col"><a class="btn fw-bold" href="http://relatoriodir.contoso.com.br/sbsb/sbsb2dptibytesdecre.php">Bytes</a></th>
        </tr>
      </thead>
      <tbody>
        <?php
                
                foreach ($resultado_cursos as $row) {
                    ?>
                    
                <tbody>
                <tr>

                    <td><?php  echo $row['userName']; ?></td>
                    <td><?php  echo $row['password']; ?></td>
                    <td><?php  echo $row['firstName']; ?></td>
                    <td><?php  echo $row['lastName']; ?></td>
                </tr>
                    <?php } ?>
      </tbody>

    </table>
<?php } ?>
</div>  
</div>
<?php 
  $paginanterior = $pagina - 1;
  $paginaposterior = $pagina + 1;
?>


<div class="container">
  <div class="row text-center">
    <div class="col-sm">
      
    </div>
    <div class="col-sm">
              <nav aria-label="Page navigation example" class="">
                <ul class="pagination">
                  <li class="page-item">

              <?php 

                if ($paginanterior != 0) { ?>
                        <a class="page-link" href="http://relatoriodir.contoso.com.br/sbsb/sbsb2dptiacesscresc.php?pagina=<?php echo $paginanterior; ?> " aria-label="Previous">
                          <span aria-hidden="true">&laquo;</span>
                        </a>
               <?php }  ?>

                  </li>
                  <?php for($i = 1; $i < 9 ; $i++){ ?>
                  <li class="page-item"><a class="page-link" href="http://relatoriodir.contoso.com.br/sbsb/sbsb2dptiacesscresc.php?pagina=<?php echo $i; ?> "><?php echo $i; ?></a></li>
                  <?php } ?>


                  <li class="page-item">
                    <?php 
              if ($paginanterior != 0) { ?>
                      <a class="page-link" href="http://relatoriodir.contoso.com.br/sbsb/sbsb2dptiacesscresc.php?pagina=<?php echo $paginaposterior; ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                      </a>
               <?php }  ?>

                    
                  </li>
                </ul>
              </nav>
            </div>
            <div class="col-sm">  </div>
     
    </div>
  </div>

<footer class="bg-light text-center text-lg-start bg-dark">
              <!-- Copyright -->
              <div class="text-center p-3 text-white">
                © 2020 Copyright:
                <a class="text-white" href="https://mdbootstrap.com/">josue</a>
              </div>
              <!-- Copyright -->
            </footer>
  </body>
  <script>
function SairPagina() {
  window.location.href = "http://sair.php";
}
</script>

</html>