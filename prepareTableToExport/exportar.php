<?php
session_start();

$tabela = $_SESSION['tabela'];
$arquivo =$_SESSION['arquivo'];


  // Força o Download do Arquivo Gerado
  header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
  header ("Content-Type: text/html; charset='ISO-8859-1'");
  header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
  header ("Cache-Control: no-cache, must-revalidate");
  header ("Pragma: no-cache");
  header ("Content-type: application/x-msexcel");
  header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
  header ("Content-Description: PHP Generated Data" );
  echo chr(255).chr(254).iconv("UTF-8", "UTF-16LE//IGNORE", $tabela); 
  
?>