<?php


if(isset($_POST['email']) && !empty($_POST['email'])){



    #$send = "suporte@castgroup.com.br";
    $usuario = $_POST['usuario'];
    $email = $_POST['email'];
    $motivo = $_POST['motivo'];

    $to = "suporte@contoso.com.br";
    $subject = "permissao";
    $body = "nome: ".$usuario. "\n".
            "email: ".$email. "\n".
            "mensagem: ".$motivo;

    $header = "From:".$email."\r\n"."Replay-TO".$email."\e\n"."x+mailer:PHP".phpversion();

    if (mail($to, $subject, $body)) {

      ?>

      <div class="sucesso">
        <script type="text/javascript">
          alert('E-mail envido com Sucesso');
          window.location='index.php';
        </script>
      </div>


<?php

        #echo "e-mail enviado com sucesso";
        #header("Location: index.php");
    }else{
      

        echo "Nao enviado";
    }



    
}




?>