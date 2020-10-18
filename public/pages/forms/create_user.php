<?php

 //Tratar os dados recebidos, com filter_input()
 require "../../../bootstrap.php";
 
 if(isEmpty()){
    
     flash('message','Prencha todos os campos');
   
     return redirect('create_user'); 

 }


 //validando os dados recebidos do formulario para evitar fraudes de scripts
  $validate = validate([
     'name'      => 's',
     'sobrenome' => 's',
     'email'     => 'e',
     'password'  => 's'
     
 ]);

 


$cadastrado = create('users', $validate);   //primeiro parametro a tabela, o segundo os atributos recebidos.


//dd($cadastrado);


if($cadastrado) {

    flash('message','Cadastrado com sucesso', 'success');

    return redirect('create_user');

}
flash('message','Erro ao cadastrar');

redirect('create_user');


?>