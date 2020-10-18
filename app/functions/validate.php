<?php

    function validate(array $fields) {
    
        $request = request();  //IDENTIFICA se é POST ou GET.

        $validate = []; //array para validate

        foreach($fields as $field => $type) {
          
            switch ($type) {
                
                case 's' :      //i de string aplica o filtro de input de entrada para string.
                    $validate[$field] = filter_var($request[$field], FILTER_SANITIZE_STRING);
                    break;

                case 'i' :      //i inteiro aplica o filtro de input de entrada para int. 
                    $validate[$field] = filter_var($request[$field], FILTER_SANITIZE_INT);
                    break;

                case 'e' :      //i inteiro aplica o filtro de input de entrada para int. 
                    $validate[$field] = filter_var($request[$field], FILTER_SANITIZE_EMAIL);
                    break;

            }
          
        }
        //Retorna como objeto o array validate.

     
        return (object)$validate;

    }


    function isEmpty() {
        //Percore se há algum imput vazio.
        $request = request();
      
        $empty = false;

        foreach($request as $key => $value) {
                //Verifica se há um campo vazio no formulario
                if(empty($request[$key])){
                    $empty = true;
                } 

        }
      
        return $empty;

    }

?>