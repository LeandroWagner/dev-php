<?php

    //Pegar o valor do get //Faz toda a logica para carregar paginas
   function load() {

      $page = filter_input(INPUT_GET,'page', FILTER_SANITIZE_STRING);

      //Se não existe page chamo o home senão chamamo a page.
      $page = (!$page) ? 'pages/home.php' : "pages/{$page}.php";

      if(!file_exists($page)){

         throw new \Exception("Algo deu errado!");
      }

      return $page;
    }

?>