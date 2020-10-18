<?php
    //funções que pode ser utiliza em qualquer parte do projeto php
  
    function dd($dump) {

        var_dump($dump);
        die();
    
    }

    //trabalhando com POST ou GET
    function request() {
        $request = $_SERVER['REQUEST_METHOD'];

        if($request == 'POST') {
            return $_POST;
        }
        
        return $_GET;
    }

    //Função de redirecionamento
    function redirect($target) {

        return header("location:/?page={$target}");


    }

    //Função de redirecionamento
    function redirectToHome() {
        return header("location:/");

    }
    

?>