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
                            <a href="painel_inst.php" class="btn btn-danger float-end">
                                Voltar
                            </a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php 
                        if (isset($_GET['id'])) {
                            $doa_id = mysqli_real_escape_string($mysqli, $_GET['id']);
                            $sql = "SELECT * FROM doacao WHERE id='$doa_id'";
                            $query = mysqli_query($mysqli, $sql);

                            if (mysqli_num_rows($query) > 0) {
                                $doacao = mysqli_fetch_array($query);
                        ?>
                        <form action="acoes.php" method="POST">
                            <input type="hidden" name="doa_id" value="<?=$doacao['id']?>">
                            <div class="mb-3">
                                <label>Titulo</label>
                                <input type="text" name="titulo" value="<?=$doacao['titulo']?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Descrição</label>
                                <input type="text" name="descricao" value="<?=$doacao['descricao']?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Tipo da doação</label>
                                <select name="tipo" class="form-control">
                                    <option value="Roupas">Roupas</option>
                                    <option value="Mantimentos">Mantimentos</option>
                                    <option value="Brinquedos">Brinquedos</option>
                                    <option value="Livro e Material Escolar">Livros e Material Escolar</option>
                                    <option value="Moveis ou Eletrodomésticos">Móveis ou Eletrodomésticos</option>
                                    <option value="Sangue ou Orgãos">Sangue ou Orgãos</option>
                                    <option value="Outros">Outros</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Endereço</label>
                                <input type="text" name="endereco" value="<?=$doacao['endereco']?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Telefone</label>
                                <input type="number" name="telefone" value="<?=$doacao['telefone']?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="update_doa" class="btn btn-primary">Salvar</button>
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