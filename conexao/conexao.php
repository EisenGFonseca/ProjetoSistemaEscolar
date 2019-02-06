<?php
//
// //ONLINE
// $HOST = "phpmyadmin.spacedevapp.com"; //servidor onde esta instalado o Mysql
// //localhost = servidor local
// //caso não esteja local colocar o ip
// $USER = "fop_user"; //usuário criado no banco de dados
// $PASSWORD = "a2042505-2944"; //senha do usuário
// $DATABASE = "fop_db"; //base de dados que será acessada
// //Tenta conectar e selecionar o banco de dados
// $conn = new PDO('mysql:host=' . $HOST . ';dbname=' . $DATABASE . ';charset=utf8', $USER, $PASSWORD);


// OFFLINE
$HOST = "localhost"; //servidor onde esta instalado o Mysql
//localhost = servidor local
//caso não esteja local colocar o ip
$USER = "EisenFonseca"; //usuário criado no banco de dados
$PASSWORD = "warmachine2"; //senha do usuário
$DATABASE = "fop_db"; //base de dados que será acessada
//Tenta conectar e selecionar o banco de dados
$conn = new PDO('mysql:host=' . $HOST . ';dbname=' . $DATABASE . ';charset=utf8', $USER, $PASSWORD);


?>
