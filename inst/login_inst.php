<?php 
include("../conexao.php");

if(isset($_POST['user']) || isset($_POST['password'])){
    if(strlen($_POST['user']) == 0){
        echo 'Preencha seu email';
    } else if (strlen($_POST['password']) == 0){
        echo 'preencha sua senha';
    }

        $user = $mysqli->real_escape_string($_POST['user']);
        $password = $mysqli->real_escape_string($_POST['password']);

        $sql_code = "SELECT * FROM inst WHERE usuario = '$user' AND senha ='$password'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1){

            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)){
                session_start();
            }
        
            $_SESSION['id'] = $usuario['id'];
            $_SESSION['usuario'] = $usuario['usuario'];
            

            header("Location: painel_inst.php");
        
        } else {
            echo 'Falha ao logar! E-mail ou senha incorretos';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container vh-100 d-flex justify-content-center align-items-center">
    <div class="card shadow-lg p-4" style="width: 100%; max-width: 400px;">
      <h3 class="text-center mb-4">Login Instituição</h3>
      <form method="POST">
        <!-- Campo Usuário -->
        <div class="mb-3">
          <label for="usuario" class="form-label">Usuário</label>
          <input 
            type="text" 
            class="form-control" 
            name="user" 
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
            name="password" 
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