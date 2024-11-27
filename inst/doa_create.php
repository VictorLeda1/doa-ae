<?php 
include("../includes/protect.php");
require '../conexao.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel da Inst</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php #Captura os dados da Instituição logada
        $idSession = $_SESSION['id'];
        $userSession = $_SESSION['usuario'];
        
        $sql_code = "SELECT * FROM inst WHERE id = '$idSession' AND usuario ='$userSession'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;
        
        if($quantidade == 1){
            $usuario = $sql_query->fetch_assoc();
        } else {
            echo 'Algo deu errado';
        }
        ?>    <?php #Captura os dados da Instituição
        $idSession = $_SESSION['id'];
        $userSession = $_SESSION['usuario'];
        
        $sql_code = "SELECT * FROM inst WHERE id = '$idSession' AND usuario ='$userSession'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;
        
        if($quantidade == 1){
            $usuario = $sql_query->fetch_assoc();
    ?>
    
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Adicionar doação
                            <a href="painel_inst.php" class="btn btn-danger float-end">
                                Voltar
                            </a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="acoes.php" method="POST">
                            <div class="mb-3">
                                <label>Titulo</label>
                                <input type="text" name="titulo" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Descrição da doação</label>
                                <textarea rows="4" cols="50" type="text" name="descricao" class="form-control"></textarea>
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
                                <input type="hidden" name="id_inst" value="<?=$usuario['id']?>">
                                <input type="hidden" name="nome" value="<?=$usuario['nome']?>">
                                <input type="hidden" name="endereco" value="<?=$usuario['endereco']?>">
                                <input type="hidden" name="cidade" value="<?=$usuario['cidade']?>">
                                <input type="hidden" name="telefone" value="<?=$usuario['telefone']?>">
                            <div class="mb-3">
                                <button type="submit" name="create_doa" class="btn btn-primary">Salvar</button>
                            </div>
                        </form>
                        <?php 
                            } else {
                                echo 'Algo deu errado';
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