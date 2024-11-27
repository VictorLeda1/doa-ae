<?php 
session_start();
require '../conexao.php';
include("../includes/protect.php");

if (isset($_POST['create_inst'])){
    $nome = mysqli_real_escape_string($mysqli, trim($_POST['nome']));
    $usuario = mysqli_real_escape_string($mysqli, trim($_POST['usuario']));
    $senha = isset($_POST['senha']) ? mysqli_real_escape_string($mysqli, trim($_POST['senha'])) : '';
    $telefone = mysqli_real_escape_string($mysqli, trim($_POST['telefone']));
    $cidade = mysqli_real_escape_string($mysqli, trim($_POST['cidade']));
    $endereco = mysqli_real_escape_string($mysqli, trim($_POST['endereco']));

    $sql = "INSERT INTO inst (nome, usuario, senha, telefone, cidade, endereco) VALUES ('$nome', '$usuario', '$senha', '$telefone', '$cidade', '$endereco')";

    mysqli_query($mysqli, $sql);

    if (mysqli_affected_rows($mysqli) > 0){
        $_SESSION['mensagem'] = 'Usuário criado com sucesso';
        header('Location: painel_adm.php');
        exit;
    } else {
        $_SESSION['mensagem'] = 'Usuário não foi criado';
        header('Location: painel_adm.php');
        exit;
    }
}

if (isset($_POST['update_inst'])){
    $inst_id = mysqli_real_escape_string($mysqli, $_POST['inst_id']);
    $nome = mysqli_real_escape_string($mysqli, trim($_POST['nome']));
    $usuario = mysqli_real_escape_string($mysqli, trim($_POST['usuario']));
    $senha = isset($_POST['senha']) ? mysqli_real_escape_string($mysqli, trim($_POST['senha'])) : '';
    $telefone = mysqli_real_escape_string($mysqli, trim($_POST['telefone']));
    $cidade = mysqli_real_escape_string($mysqli, trim($_POST['cidade']));
    $endereco = mysqli_real_escape_string($mysqli, trim($_POST['endereco']));

    $sql = "UPDATE inst SET nome = '$nome', usuario = '$usuario', senha = '$senha', telefone = '$telefone', cidade = '$cidade', endereco = '$endereco'";

    $sql .= " WHERE id = '$inst_id'";

    mysqli_query($mysqli, $sql);

    if (mysqli_affected_rows($mysqli) > 0){
        $_SESSION['mensagem'] = 'Usuário atualizado com sucesso';
        header('Location: painel_adm.php');
        exit;
    } else {
        $_SESSION['mensagem'] = 'Usuário não foi atualizado';
        header('Location: painel_adm.php');
        exit;
    }
}

if (isset($_POST['delete_inst'])){
    $inst_id = mysqli_real_escape_string($mysqli, $_POST['delete_inst']);
    $sql = "DELETE FROM inst WHERE id = '$inst_id'";

    mysqli_query($mysqli, $sql);

    if (mysqli_affected_rows($mysqli) > 0){
        $_SESSION['message'] = 'Instituição deletada com sucesso';
        header('Location: painel_adm.php');
        exit;
    } else {
        $_SESSION['message'] = 'Instituição não foi deletada';
        header('Location: painel_adm.php');
        exit;
    }
}
?>