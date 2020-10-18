<?php
/*
//Envia email - não seguro
function send($data) {
    
    //Para onde envio
    $to = 'leandro.santoswagner@gmail.com';
    
    //Assunto
    $subject = $data->subject;
    
    //Mensagem
    $message = $data->message;

    //Cabeçalho.
    $headers = "From: {$data->email}" ."\r\n".

    'Reply-to: contato@devclass.com.br' . ."\r\n".
    'X-Mailer: PHP/' . phpversion();

    return mail($to, $subject, $message, $headers);
    

}
*/

//Usando phpmailer ...
function send(array $data) {

  
    // Instantiation and passing `true` enables exceptions
    $mail = new \PHPMailer\PHPMailer\PHPMailer;
   
    
    try {
        //Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $mail->Charset = 'UTF-8';
        $mail->SMTPSecure = 'plain';  //plain       
        $mail->isSMTP();                                             // Send using SMTP
        $mail->Host       = '';                                      // Set the SMTP server to send through
        $mail->Port       = 587;                                     // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        $mail->SMTPAuth   = true;                                    // Enable SMTP authentication
        $mail->Username   = '';                                      // SMTP username - 'c162280e3700f4';  
        $mail->Password   = '';                                      // SMTP password - 'b862cfc601ef62';
        $mail->isHTML(true);   
        $mail->setFrom($data['quem']);
        $mail->FromName = $data['quem'];
        $mail->addAddress($data['para']);                            // Add a recipient
        $mail->Body    = $data['mensagem'];
        $mail->Subject = $data['assunto'];
        $mail->AltBody = 'Para ver esse email tenha certeza de estar vendo em um programa que aceita ver html';
        $mail->MsgHTML($data['mensagem']);


        return $mail->send();
        
    } catch (Exception $e) {
        return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

}

?>