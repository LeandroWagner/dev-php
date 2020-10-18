<?php

 //Tratar os dados recebidos, com filter_input()
 require "../../../bootstrap.php";

 $id = filter_input(INPUT_POST,'id',FILTER_SANITIZE_NUMBER_INT);

 
 if(isEmpty()){
    
    flash('message','Prencha todos os campos');
   
    return redirect('/edit_user&id='.$id); 

 }


 //validando os dados recebidos do formulario para evitar fraudes de scripts
  $validate = validate([
     'name'      => 's',
     'sobrenome' => 's',
     'email'     => 'e',
    // 'password'  => 's'
 ]);

 $atualizadado = update('users', $validate,['id',$id]);   //primeiro parametro a tabela, o segundo os atributos recebidos.


 if( $atualizadado) {

    flash('message','Atualizadado com sucesso', 'success');

    return redirect('/edit_user&id='.$id); 

}
flash('message','Erro ao atualizar');

redirect('/edit_user&id='.$id); 

?>