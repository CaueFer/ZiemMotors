<?php
if (isset($_POST)) {
    include_once('../conta/login/config.php');

    $data = file_get_contents("php://input");

    $sql = "SELECT * FROM carros";

    $result = mysqli_query($conexao, $sql);

    $carros = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // limpar memoria  
    mysqli_free_result($result);
    mysqli_close($conexao);

    
    echo json_encode($carros);
}

?>