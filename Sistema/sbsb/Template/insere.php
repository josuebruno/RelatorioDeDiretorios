<?php
use Phppot\DataSource;
 
require_once 'DataSource.php';
$db = new DataSource();
$conn = $db->getConnection();

if (isset($_POST["import"])) {
    
    $fileName = $_FILES["file"]["tmp_name"];
    
    if ($_FILES["file"]["size"] > 0) {
        
        $file = fopen($fileName, "r");
        
        while (($column = fgetcsv($file, 10000, ";")) !== FALSE) {
            
            $id = "";
            
            $userName = "";
            if (isset($column[1])) {
                $userName = mysqli_real_escape_string($conn, $column[1]);
            }
            $password = "";
            if (isset($column[2])) {
                $password = mysqli_real_escape_string($conn, $column[2]);
            }
            $firstName = "";
            if (isset($column[3])) {
                $firstName = mysqli_real_escape_string($conn, $column[3]);
            }
            $lastName = "";
            if (isset($column[4])) {
                $lastName = mysqli_real_escape_string($conn, $column[4]);
            }
            
            $sqlInsert = "INSERT into users (Id,userName,password,firstName,lastName)
                   values (?,?,?,?,?)";
            $paramType = "issss";
            $paramArray = array(
                $id,
                $userName,
                $password,
                $firstName,
                $lastName
            );
            $insertId = $db->insert($sqlInsert, $paramType, $paramArray);
            
            if (! empty($insertId)) {
                $type = "success";
                $message = "CSV Data Imported into the Database";
            } else {
                $type = "error";
                $message = "Problem in Importing CSV Data";
            }
        }
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>insere</title>
    <script type="text/javascript">
$(document).ready(function() {
    $("#frmCSVImport").on("submit", function () {

        $("#response").attr("class", "");
        $("#response").html("");
        var fileType = ".csv";
        var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + fileType + ")$");
        if (!regex.test($("#file").val().toLowerCase())) {
                $("#response").addClass("error");
                $("#response").addClass("display-block");
            $("#response").html("Invalid File. Upload : <b>" + fileType + "</b> Files.");
            return false;
        }
        return true;
    });
});
</script>
  </head>
  <body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>



<nav class="navbar navbar-expand-lg navbar-light bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand text-light" href="#">Colocar CSV file MYSQL </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    </div>
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

    <div id="response"
        class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>">
        <?php if(!empty($message)) { echo $message; } ?>
    </div>
        <div class="outer-scontainer">
            <div class="row">

                <form class="form-horizontal" action="" method="post"
                    name="frmCSVImport" id="frmCSVImport"
                    enctype="multipart/form-data">
                    <div class="input-row">
                        <label class="col-md-4 control-label">
                            </label>
                                <input type="file" name="file" id="file" accept=".csv" class="btn btn-primary">
                        <button type="submit" id="submit" name="import" class="btn btn-dark">ADD</button>
                        <br />
                    </div>
                </form>

            </div>

                    <div class="container">
                      <div class="row">
                          <div class="col-md-6 col-sm-1 col-lg-12 text-white">
                            relatorios de pastas.
                          </div>
                      </div>
                    </div>

               <?php
            $sqlSelect = "SELECT * from users limit 100";
            $result = $db->select($sqlSelect);
            if (! empty($result)) {
                ?>
            <table class="table table-success table-striped">
            <thead>
                <tr>
                   
                    <th>Caminho completo</th>
                    <th>Ultima escrita</th>
                    <th>Ultima Leitura</th>
                    <th>Tamanho</th>

                </tr>
            </thead>
<?php
                
                foreach ($result as $row) {
                    ?>
                    
                <tbody>
                <tr>

                    <td><?php  echo $row['userName']; ?></td>
                    <td><?php  echo $row['firstName']; ?></td>
                    <td><?php  echo $row['password']; ?></td>
                    <td><?php  echo $row['lastName']; ?></td>
                </tr>
                    <?php
                }
                ?>
                </tbody>
        </table>
        <?php } ?>
    </div>
    </div>
</div>

</body>

</html>