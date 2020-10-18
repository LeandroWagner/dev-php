<h2>Editar usuário</h2>

<?=get('message')?>

<?php

    $user = find('users', 'id', $_GET['id']);

?>

<form action="/pages/forms/update_user.php" method="POST" role="form">
    <div class="form-group">
        <label for="">Nome:</label>
        <input type="text" class="form-control" name="name" value="<?=$user->name?>">
    </div>
    <!--Pegando o id com um campo oculto -->
    <input type="hidden" name="id" value="<?=$user->id?>">

    <div class="form-group">
        <label for="">Sobrenome:</label>
        <input type="text" class="form-control" name="sobrenome" value="<?=$user->sobrenome?>">
    </div>

    <div class="form-group">
        <label for="">Email:</label>
        <input type="email" class="form-control" name="email" value="<?=$user->email?>">
    </div>
    <!--
    <div class="form-group">
        <label for="">Password:</label>
        <input type="password" class="form-control" name="password" value="<?=$user->password?>">
    </div>
    -->
    <button type="submit" class="btn btn-success">Editar</button>

</form>