<?php require "../bootstrap.php";?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Sistema Inicial</title>
        <!-- Bootstrap online -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>
    </head>
    <body>
      
       <!-- Criando um container div para chamar as pagina internas ---> 
       <div class="container">
            <!-- Chamada para as paginas HTML -->
            <?php 
            
                try {
                
                    require load(); 
                
                } catch (Exception $e) {
                    //tramento
                    echo $e->getMessage();
                
                }
                
            ?>
       </div>


    </body>
</html>

