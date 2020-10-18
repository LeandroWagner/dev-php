<?php
    //Tratar os dados recebidos, com filter_input()
    require "../../../bootstrap.php";
 
    if(isEmpty()){
       
        flash('message','Prencha todos os campos');
      
        return redirect('contato'); 

    }


    $validate = validate([
        'name'    => 's',
        'email'   => 'e',
        'subject' => 's',
        'message' => 's'
    ]);


    //Passado para um array

    $data = [
        'quem'     => $validate->email,
        'para'     => '',  //your email
        'mensagem' => $validate->message,
        'assunto'  => $validate->subject
    ];    
  
 
    if(send($data)) {

        flash('message' , 'Email enviado com sucesso','success');

        return redirect('contato'); 
    }
?>