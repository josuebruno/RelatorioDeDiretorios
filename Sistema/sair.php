<?php
  session_start();
if(!$_SESSION['userdn']) {
  header('Location: http://paginainicial.com.br');
  exit();
}



if (!empty($_SERVER['HTTP_CLIENT_IP']))   
    {
      $ip_address = $_SERVER['HTTP_CLIENT_IP'];
    }
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))  
    {
      $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
  else
    {
      $ip_address = $_SERVER['REMOTE_ADDR'];
    }
$user = $_SESSION['userdn'];
#echo $user;
$t45n = (explode("=",$user));
$t46n = (explode(",",$t45n[1]));
#echo $t46n[0];
#echo $ip_address;
  //echo $user;
  //echo $password;
  //echo $domain;
  $data = date("d/m/Y-H:i:s");
  $usuario = $t46n[0];
  $InfoLog = $usuario." ".$data;
  
  #CN=Josue Soares Bruno - CONTA DE SERVIÇO,OU=TI,OU=DF - SIA,OU=Contas Administrativas,OU=Departamento de Tecnologia,DC=call,DC=br 04/12/2019
  $array = explode(' ', $InfoLog);
  $logsi = "[ ".$array[0]." ".$array[1]. " | Ação: Saiu!, IP: ". $ip_address ." ]\r\n";
  #echo $logsi;
 
        $Logs = $logsi;
        $dat = date("dmY");
        //Variável arquivo armazena o nome e extensão do arquivo.
        $arquivo = "/var/www/html/createuserad/log/".$dat."_".$t46n[0].".txt";
         
        //Variável $fp armazena a conexão com o arquivo e o tipo de ação.
        $fp = fopen($arquivo, "a+",0);
       
        //Escreve no arquivo aberto.
        fwrite($fp, $Logs, strlen($Logs));
         
        //Fecha o arquivo.
        fclose($fp);
  
  
  
  
				


session_destroy();
header('Location: http://relatoriodir/');
exit();

?>