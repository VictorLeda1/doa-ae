<?php 
session_start();
include("../includes/protect.php");
require '../conexao.php';
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
    <?php 
    include("../includes/navbar.php")
    ?>
    <div class="container mt-4">
        <?php include('mensagem.php') ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Lista de Instituições
                            <a href="inst_create.php" class="btn btn-primary float-end">Cadastrar Instituição</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Endereço</th>
                                    <th>Cidade</th>
                                    <th>Telefone</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $sql = 'SELECT * FROM inst';
                                $instituicoes = mysqli_query($mysqli, $sql);
                                if (mysqli_num_rows($instituicoes) > 0) {
                                    foreach ($instituicoes as $instituicao) {
                                ?>
                                <tr>
                                    <td><?= $instituicao['id'] ?></td>
                                    <td><?= $instituicao['nome'] ?></td>
                                    <td><?= $instituicao['endereco'] ?></td>
                                    <td><?= $instituicao['cidade'] ?></td>
                                    <td><?= $instituicao['telefone'] ?></td>
                                    <td>
                                        <a href="inst_view.php?id=<?=$instituicao['id']?>" class="btn btn-secondary btn-sm">Visualizar</a>
                                        <a href="inst_edit.php?id=<?=$instituicao['id']?>" class="btn btn-success btn-sm">Editar</a>
                                        <form action="acoes.php" method="POST" class="d-inline">
                                            <button onclick="return confirm('Tem certeza que deseja excluir?')" type="submit" name="delete_inst" value="<?=$instituicao['id']?>" class="btn btn-danger btn-sm">
                                                Excluir
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <?php 
                                }
                                    }else{
                                        echo '<h5>Nenhuma Instituição encontrada</h5>';
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <p>
        
    </p>
    <script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </script>
</body>
</html>