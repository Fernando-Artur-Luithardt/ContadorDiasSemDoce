<?php

require_once 'banco.php';

$sql = "INSERT into diassemdoce (`dias`) values ('0')";
$resultado = mysqli_query($conn, $sql);

if (!$resultado) {
    $response = array('mensagem' => "Erro do servidor");
    $responseJson = json_encode($response);
    http_response_code(500);
    echo $responseJson;
    exit;
}else{
    header("Location: http://localhost/ContadorDiasSemDoce/index.php");
}