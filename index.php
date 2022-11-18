<?php 
  require 'funcoes/banco.php';

  $sql = "SELECT dias, id  FROM diassemdoce order by id desc limit 1";
  $contadorDiasSemDoce = mysqli_query($conn, $sql);

  foreach($contadorDiasSemDoce as $dias) {
    $dias = ($dias['dias']);
  }

  $sql = "SELECT MAX(dias), dia FROM diassemdoce";
  $record = mysqli_query($conn, $sql);

  foreach($record as $recor) {
    $recorde = ($recor['MAX(dias)']);
    $dataRecord = ($recor['dia']);
  }


?>

<!DOCTYPE html>
<html>

<head>
  <title>Contador</title>

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      background: #1F012A;
      color: white;
      font-family: Arial, Helvetica, sans-serif;
      text-align: center;
      min-height: 100vh;
      display: grid;
      place-items: center;
      
    }      

    .container {
      max-width: 200px;
      border: 5px solid green;
      border-radius: 20px;
      padding: 20px;
      background-color: #6F012A;

      display: grid;
      place-items: center;
      }

    h1 {
      
    }

    p {
    
      font-size: 100px;
    }

    div.footer {
      padding: 10px;
    }

    button {
      border: 1px solid #6F012A;
      color: #6F012A;
      padding: 10px;
      text-transform: uppercase;
    }

  </style>
</head>

<body>
  <div class="container">
    <h1>Dias Sem Doce</h1>
    <p id="number"><?= $dias ?></p>
    <div class="footer">
      <button style="background-color: green;" onclick="mais()">mais</button>
    </div>
    <button style="background-color: red;" onclick="zerar()">ZERAR</button>
    <span style="padding-top: 8px;">Record: <?= $recorde ?> Dias</span>
    <span style="padding-top: 8px;"><?= $dataRecord?></span>
  </div>
  <script>


      
    const numberElement = document.getElementById("number")

    function zerar() {
      // pegar o valor
      let number = parseInt(numberElement.innerText)

      // subtrar 1 do valor
      number = 0

      // atualizar o valor
      numberElement.innerText = number

      let url = "funcoes/zerar.php";
      location.href = url;
    }

    function mais() {
      // pegar o valor
      let number = parseInt(numberElement.innerText)

      // subtrar 1 do valor
      number = number + 1

      // atualizar o valor
      numberElement.innerText = number

      let url = "funcoes/adiconardia.php?value=<?= $dias + 1?>";
      location.href = url;
    }

  </script>
</body>

</html>