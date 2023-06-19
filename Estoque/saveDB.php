<?php
if(isset($_POST)){
    include_once('../conta/login/config.php');

    $data = file_get_contents("php://input");

    $carros = json_decode($data, true); // vai retornar uma array php

    $nome = $carros[0]['nome'];
    $marca = $carros[0]['marca'];
    $modelo = $carros[0]['modelo'];
    $versao = $carros[0]['versao'];
    $ano = $carros[0]['ano'];
    $preco = $carros[0]['preco'];
    $transmissao = $carros[0]['transmissao'];
    $infos = $carros[0]['infos'];
    $img1 = $carros[0]['img1'];
    $img2 = $carros[0]['img2'];
    $img3 = $carros[0]['img3'];
    $img4 = $carros[0]['img4'];
    $img5 = $carros[0]['img5'];

    $sql = "SELECT * FROM carros WHERE nome = '$nome'";

    $validacao = $conexao->query($sql);

    if (mysqli_num_rows($validacao) < 1) {
        $result = mysqli_query($conexao, "INSERT INTO carros(nome,marca,modelo,versao,ano,preco,transmissao,infos,img1,img2,img3,img4,img5)
         VALUES('$nome','$marca','$modelo','$versao','$ano','$preco','$transmissao','$infos','$img1','$img2','$img3','$img4','$img5')");
    }
}
?>