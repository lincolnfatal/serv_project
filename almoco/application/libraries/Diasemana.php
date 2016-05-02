<?php 



 if (!defined('BASEPATH')) exit('No direct script access allowed');

class Diasemana{
   
   ////////////////////////////////////////////////////
   //Converte data de mysql para espanhol
   ////////////////////////////////////////////////////
   function data_espanhol_a_mysql($data){
      return $data;
   }

   function dia_semana($data){  
      
                // Traz o dia da semana para qualquer data informada
            $dia =  substr($data,0,2);
            $mes =  substr($data,3,2);
            $ano =  substr($data,6,9);
            $diasemana = date("w", mktime(0,0,0,$mes,$dia,$ano) );
            switch($diasemana){  	
                case"0": $diasemana = "Domingo";	   break;  				
                case"1": $diasemana = "Segunda"; break;  				
                case"2": $diasemana = "Terça";   break;  				
                case"3": $diasemana = "Quarta";  break;  				
                case"4": $diasemana = "Quinta";  break;  				
                case"5": $diasemana = "Sexta";   break;  				
                case"6": $diasemana = "Sábado";		break;  			
            }
            
            Return ($diasemana);
    }
    
    function semana_do_ano($data){
        
        $dia =  substr($data,0,2);
        $mes =  substr($data,3,2);
        $ano =  substr($data,6,9);
        $var=intval( date('z', mktime(0,0,0,$mes,$dia,$ano) ) / 7 ) + 1;

        return $var;
    } 
  
}

    
    
    
