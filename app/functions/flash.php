<?php
    //Adiciona a mensagem
    function flash($key, $message, $type = 'danger') {

        //Se não tiver setado eu cria o função
        if (!isset($_SESSION['flash']['$key'])) {

            $_SESSION['flash']['$key'] = '<div class="alert alert-'.$type.'">'.$message. '</div>';

        }
 
    }
    
    //Resgata a mensagem.
    function get($key) {
      
        //Se não tiver setado eu cria o função
           if(isset($_SESSION['flash']['$key'])) {

               $message = $_SESSION['flash']['$key'];
      
               unset($_SESSION['flash']['$key']);

               return $message ?? '';   

            }
                          
    }


?>