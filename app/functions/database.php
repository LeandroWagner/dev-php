<?php

//Conecta com o banco
function connect(){

    $pdo = new \PDO("mysql:host=localhost;dbname=blog;charset=utf8", "root", "");
    //Chamo o tipo erro
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Resgatar os dados como objeto .
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

    return $pdo;
    

}

//Cria os dados
function create($table , $fields) {

    //Tem que cadastrar em formato de array
    if(!is_array($fields)) {
        $fields = (array) $fields;
    }

    //Criando o sql para insert    
    $sql = "insert into {$table}";
    $sql .= "(". implode(',', array_keys($fields)).")";
    $sql .= " values(" .":".implode(',:',array_keys($fields)).")";

    $pdo = connect();

    $insert = $pdo->prepare($sql);

    return $insert->execute($fields);

}
//Lista todos os usuarios
function all($table) {

    $pdo = connect();

    $sql = "select * from {$table}";

 
    $list = $pdo->query($sql);

    $list->execute();

    return $list->fetchAll();


}

//Atualiza os dados
function update($table,$fields, $where) {

    //Tem que cadastrar em formato de array
    if(!is_array($fields)) {
        $fields = (array) $fields;
    }

    $pdo = connect();


    //Mapea o array para pegar os index
    //Função callback
    $data = array_map(function($field) {

        return "{$field}  = :{$field}";

    }, array_keys($fields));
    
    $sql = "update {$table} set ";

    $sql .= implode(',', $data);

    $sql .= " where {$where[0]} = :{$where[0]}";

    $data = array_merge($fields, [$where[0] => $where[1]]);


    $update = $pdo->prepare($sql);

    $update->execute($data);

    //numero de linhas retornadas
    return $update->rowCount();
    
}

//Encontra dados 
function find($table, $field, $value) {

    $pdo = connect();

    //Filtrando o entrada de dados para o formulario
    $value = filter_var($value, FILTER_SANITIZE_NUMBER_INT);


    $sql = "select * from {$table} where {$field} = :{$field}";

    $find = $pdo->prepare($sql);

    $find->bindValue($field, $value);

    $find->execute();

    return $find->fetch();

}

//Delete dados
function delete($table, $field, $value) {

    $pdo = connect();

    $sql = "delete from {$table} where {$field}";

    $delete = $pdo->prepare($sql);

    $delete->bindValue($field, $value);

    return  $delete->execute();
;

    //return $delete->execute();


}


?>