<?php 
session_start();
require '../conexao.php';
include("../includes/protect.php");

if (isset($_POST['create_doa'])){
    $titulo = mysqli_real_escape_string($mysqli, trim($_POST['titulo']));
    $descricao = mysqli_real_escape_string($mysqli, trim($_POST['descricao']));
    $tipo = mysqli_real_escape_string($mysqli, trim($_POST['tipo']));
    $id_inst = mysqli_real_escape_string($mysqli, trim($_POST['id_inst']));
    $nome = mysqli_real_escape_string($mysqli, trim($_POST['nome']));
    $endereco = mysqli_real_escape_string($mysqli, trim($_POST['endereco']));
    $cidade = mysqli_real_escape_string($mysqli, trim($_POST['cidade']));
    $telefone = mysqli_real_escape_string($mysqli, trim($_POST['telefone']));

    $sql = "INSERT INTO doacao (titulo, descricao, tipo, id_inst, nome, endereco, cidade, telefone) VALUES ('$titulo', '$descricao', '$tipo', '$id_inst', '$nome', '$endereco', '$cidade', '$telefone')";

    mysqli_query($mysqli, $sql);

    if (mysqli_affected_rows($mysqli) > 0){
        $_SESSION['mensagem'] = 'Doação criado com sucesso';
        header('Location: painel_inst.php');
        exit;
    } else {
        $_SESSION['mensagem'] = 'Doação não foi criado';
        header('Location: painel_inst.php');
        exit;
    }
}

if (isset($_POST['update_doa'])){
    $doa_id = mysqli_real_escape_string($mysqli, $_POST['doa_id']);
    $titulo = mysqli_real_escape_string($mysqli, trim($_POST['titulo']));
    $descricao = mysqli_real_escape_string($mysqli, trim($_POST['descricao']));
    $tipo = mysqli_real_escape_string($mysqli, trim($_POST['tipo']));
    $endereco = mysqli_real_escape_string($mysqli, trim($_POST['endereco']));
    $telefone = mysqli_real_escape_string($mysqli, trim($_POST['telefone']));

    $sql = "UPDATE doacao SET titulo = '$titulo', descricao = '$descricao', tipo = '$tipo', endereco = '$endereco', telefone = '$telefone'";

    $sql .= " WHERE id = '$doa_id'";

    mysqli_query($mysqli, $sql);

    if (mysqli_affected_rows($mysqli) > 0){
        $_SESSION['mensagem'] = 'Doação atualizado com sucesso';
        header('Location: painel_inst.php');
        exit;
    } else {
        $_SESSION['mensagem'] = 'Doação não foi atualizado';
        header('Location: painel_inst.php');
        exit;
    }
}

if (isset($_POST['delete_doa'])){
    $doa_id = mysqli_real_escape_string($mysqli, $_POST['delete_doa']);
    $sql = "DELETE FROM doacao WHERE id = '$doa_id'";

    mysqli_query($mysqli, $sql);

    if (mysqli_affected_rows($mysqli) > 0){
        $_SESSION['message'] = 'Doação deletada com sucesso';
        header('Location: painel_inst.php');
        exit;
    } else {
        $_SESSION['message'] = 'Doação não foi deletada';
        header('Location: painel_inst.php');
        exit;
    }
}
?>