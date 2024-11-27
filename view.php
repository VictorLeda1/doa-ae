<?php 
require 'conexao.php';
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
                        <h4>Visualizar Doação
                            <a href="index.php" class="btn btn-danger float-end">
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
                            <div class="mb-3">
                                <label>Titulo</label>
                                <p class="form-control">
                                <?= $doacao['titulo'] ?>
                                </p>
                            </div>
                            <div class="mb-3">
                                <label>Descricao</label>
                                <p class="form-control">
                                <?= $doacao['descricao'] ?>
                                </p>
                            </div>
                            <div class="mb-3">
                                <label>Tipo</label>
                                <p class="form-control">
                                <?= $doacao['tipo'] ?>
                                </p>
                            </div>
                            <div class="mb-3">
                                <label>Instituição</label>
                                <p class="form-control">
                                <?= $doacao['nome'] ?>
                                </p>
                            </div>
                            <div class="mb-3">
                                <label>Endereço</label>
                                <p class="form-control">
                                <?= $doacao['endereco'] ?>
                                </p>
                            </div>
                            <div class="mb-3">
                                <label>Cidade</label>
                                <p class="form-control">
                                <?= $doacao['cidade'] ?>
                                </p>
                            </div>
                            <div class="mb-3">
                                <label>Telefone</label>
                                <p class="form-control">
                                <?= $doacao['telefone'] ?>
                                </p>
                            </div>
                            <?php 
                                }else{
                                    echo "<h5>Instituição não encontrada</h5>";
                                }
                            }
                            ?>
                        </form>
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