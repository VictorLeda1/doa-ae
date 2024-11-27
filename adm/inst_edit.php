<?php 
session_start();
require '../conexao.php';
include("../includes/protect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel do ADM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Editar usuário
                            <a href="painel_adm.php" class="btn btn-danger float-end">
                                Voltar
                            </a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php 
                        if (isset($_GET['id'])) {
                            $inst_id = mysqli_real_escape_string($mysqli, $_GET['id']);
                            $sql = "SELECT * FROM inst WHERE id='$inst_id'";
                            $query = mysqli_query($mysqli, $sql);

                            if (mysqli_num_rows($query) > 0) {
                                $instituicao = mysqli_fetch_array($query);
                
                        ?>
                        <form action="acoes.php" method="POST">
                            <input type="hidden" name="inst_id" value="<?=$instituicao['id']?>">
                            <div class="mb-3">
                                <label>Nome</label>
                                <input type="text" name="nome" value="<?=$instituicao['nome']?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Usuario</label>
                                <input type="text" name="usuario" value="<?=$instituicao['usuario']?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Senha</label>
                                <input type="password" name="senha" value="<?=$instituicao['senha']?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Telefone</label>
                                <input type="number" name="telefone" value="<?=$instituicao['telefone']?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Cidade</label>
                                <input type="text" name="cidade" value="<?=$instituicao['cidade']?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Endereço</label>
                                <input type="text" name="endereco" value="<?=$instituicao['endereco']?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="update_inst" class="btn btn-primary">Salvar</button>
                            </div>
                        </form>
                        <?php 
                        } else {
                            echo "<h5>Instituição não encontrada</h5>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </script>
</body>
</html>