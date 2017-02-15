<?php
/**
 * Created by PhpStorm.
 * User: DEMONTIE
 * Date: 13/02/2017
 * Time: 22:16
 */
if(isset($_FILES['arquivo']))
{

    $dir = 'D:/uploads/'; //Diretório para os arquivos enviados
    if(!file_exists($dir)){
        mkdir($dir);
    }

    $ext = strtolower(substr($_FILES['arquivo']['name'],-4)); //Pegando extensão do arquivo
    //Coloquei esse, para os arquivos não se repetirem, por que, quando faz o uploa, ele esta fazendo o upload simultaneamente.
    $new_name = (time() + rand(1,9000)) . $ext; //Definindo um novo nome para o arquivo
    //Poderia simplesmente utilizar o proprio nome do arquivo
    //$new_name = $_FILES['arquivo']['name']; //Definindo um novo nome para o arquivo

    $dados['nome_original_arquivo'] = $_FILES['arquivo']['name'];
    $dados['novo_nome_arquivo'] = $new_name;
    $dados['caminho_completo_arquivo'] = $dir.$new_name;

    move_uploaded_file($_FILES['arquivo']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
    echo json_encode($dados);
}