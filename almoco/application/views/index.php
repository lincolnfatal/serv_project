<?php 
$this->load->view('includes/header');//INCLUI A VIEW DENTRO DA PASTA VIEW/INCLUDE/HEADER.PHP
$this->load->view('includes/menu');//INCLUI A VIEW DENTRO DA PASTA VIEW/INCLUDE/MENU.PHP
if($tela != '') $this->load->view('telas/'.$tela);//VERIFICA SE FOI PASSADA A VIEW PELO CONTROLLER SE NÃO ELE USA O CONTROLLER INDEX COMO PADRÃO
$this->load->view('includes/footer');//INCLUI A VIEW DENTRO DA PASTA VIEW/INCLUDE/FOOTER.PHP