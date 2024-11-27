<?php 
include("../conexao.php");

if(isset($_POST['usuario']) || isset($_POST['senha'])){
    if(strlen($_POST['usuario']) == 0){
        echo 'Preencha seu usuario';
    } else if (strlen($_POST['senha']) == 0){
        echo 'preencha sua senha';
    }

        $usuario = $mysqli->real_escape_string($_POST['usuario']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM adm WHERE usuario = '$usuario' AND senha ='$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1){

            $usuarioBusca = $sql_query->fetch_assoc();

            if(!isset($_SESSION)){
                session_start();
            }
        
            $_SESSION['id'] = $usuarioBusca['id'];
            $_SESSION['usuario'] = $usuarioBusca['usuario'];

            header("Location: painel_adm.php");
        
        } else {
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">Falha ao logar! E-mail ou senha incorretos</div>';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login ADM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

    <div class="container vh-100 d-flex justify-content-center align-items-center">
    <div class="card shadow-lg p-4" style="width: 100%; max-width: 400px;">
      <h3 class="text-center mb-4">Login ADM</h3>
      <form method="POST">
        <!-- Campo Usuário -->
        <div class="mb-3">
          <label for="usuario" class="form-label">Usuário</label>
          <input 
            type="text" 
            class="form-control" 
            name="usuario" 
            placeholder="Digite seu usuário" 
            required
          >
        </div>
        <!-- Campo Senha -->
        <div class="mb-3">
          <label for="senha" class="form-label">Senha</label>
          <input 
            type="password" 
            class="form-control" 
            name="senha" 
            placeholder="Digite sua senha" 
            required
          >
        </div>
        <!-- Botão de login -->
        <button type="submit" class="btn btn-primary w-100">Entrar</button>
      </form>
    </div>
  </div>

</body>
</html>