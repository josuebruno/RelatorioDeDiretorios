<!doctype html>
<?php
  session_start();
if(!$_SESSION['userdn']) {
  header('Location: http://paginainicial.com.br');
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
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

<nav class="navbar navbar-expand-lg navbar-light bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand text-light" href="#">Relatorio </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      

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
		  		<div class="col-md-4">
		          <div class="card mb-4 shadow-sm">
		            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title></title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">\\sbsb2\DPTI\</text></svg>
		            <div class="card-body">
		              <p class="card-text">DIR - \\sbsb2\DPTI\</p>
		              <div class="d-flex justify-content-between align-items-center">
		                <div class="btn-group">
		                  <button type="button" class="btn btn-sm btn-outline-secondary" id="myButton">View</button>
		                  
		                </div>
		                <small class="text-muted">01/2022</small>
		              </div>
		            </div>
		          </div>
		        </div>
		        <div class="col-md-4">
		          <div class="card mb-4 shadow-sm">
		            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">INDISPONIVEL</text></svg>
		            <div class="card-body">
		              <p class="card-text">INDISPONIVEL </p>
		              <div class="d-flex justify-content-between align-items-center">
		                <div class="btn-group">
		                	<!--
		                  <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
		                  <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
		              		-->
		                </div>
		                <!--<small class="text-muted">9 mins</small>-->
		              </div>
		            </div>
		          </div>
		        </div>
		        <div class="col-md-4">
		          <div class="card mb-4 shadow-sm">
		            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">INDISPONIVEL</text></svg>
		            <div class="card-body">
		              <p class="card-text">INDISPONIVEL</p>
		              <div class="d-flex justify-content-between align-items-center">
		                <div class="btn-group">
		                	<!--
		                  <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
		                  <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
		              -->
		                </div>
		                <!--<small class="text-muted">9 mins</small>-->
		              </div>
		            </div>
		          </div>
				</div>

				<div class="col-md-4">
		          <div class="card mb-4 shadow-sm">
		            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">INDISPONIVEL</text></svg>
		            <div class="card-body">
		              <p class="card-text">INDISPONIVEL </p>
		              <div class="d-flex justify-content-between align-items-center">
		                <div class="btn-group">
		                	<!--
		                  <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
		                  <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
		              		-->
		                </div>
		                <!--<small class="text-muted">9 mins</small>-->
		              </div>
		            </div>
		          </div>
		        </div>
		        <div class="col-md-4">
		          <div class="card mb-4 shadow-sm">
		            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">INDISPONIVEL</text></svg>
		            <div class="card-body">
		              <p class="card-text">INDISPONIVEL </p>
		              <div class="d-flex justify-content-between align-items-center">
		                <div class="btn-group">
		                	<!--
		                  <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
		                  <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
		              		-->
		                </div>
		                <!--<small class="text-muted">9 mins</small>-->
		              </div>
		            </div>
		          </div>
		        </div>
		        <div class="col-md-4">
		          <div class="card mb-4 shadow-sm">
		            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">INDISPONIVEL</text></svg>
		            <div class="card-body">
		              <p class="card-text">INDISPONIVEL</p>
		              <div class="d-flex justify-content-between align-items-center">
		                <div class="btn-group">
		                	<!--
		                  <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
		                  <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
		              		-->
		                </div>
		                <!--<small class="text-muted">9 mins</small>-->
		              </div>
		            </div>
		          </div>
				</div>

		</div><!-- row justify-content-md-center-->
</div><!-- CONTAINER-->




<footer class="bg-light text-center text-lg-start bg-dark">
              <!-- Copyright -->
              <div class="text-center p-3 text-white">
                © 2021 Copyright:
                <a class="text-white" href="https://mdbootstrap.com/">Josue Bruno</a>
              </div>
              <!-- Copyright -->
</footer>
  </body>




  <script type="text/javascript">
    document.getElementById("myButton").onclick = function () {
        location.href = "http://link/sbsb/sbsb2dpti.php";
    };

		function SairPagina() {
		  window.location.href = "http://linksair.php";
		};


   </script>

 </html>