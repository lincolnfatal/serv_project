<?php
class Inicial extends CI_Controller {	
	
 function index()
  {
     $this->load->view('menu');
  
 
    $this->load->view('erro_dia_semana');
  }
}
?>

