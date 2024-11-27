<?php 
require 'conexao.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doa-ae</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

    <main>  
      <section class="py-5 text-center container">
        <div class="row py-lg-5">
          <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">Seja Bem Vindo ao projeto Doa-Ae</h1>
            <p>Encontre doações proximas de você e que sejam compativeis com o que você pode doar!</p>
            <br>
            <a href="inst/login_inst.php" class="btn btn-primary">Entrar como Instituição</a>
          </div>
        </div>
      </section>
      <div class="album py-5 bg-body-tertiary">
          <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <?php 
                  $sql = "SELECT * FROM doacao";
                  $doacoes = mysqli_query($mysqli, $sql);
                  if (mysqli_num_rows($doacoes) > 0) {
                  foreach ($doacoes as $doacao) {
              ?>
                <div class="col">
                  <div class="card shadow-sm">
                    <div class="card-body">
                      <h2><?= $doacao['titulo'] ?></h2>
                      <p class="card-text"><?= $doacao['descricao'] ?></p>
                      <p>Instituição: <?= $doacao['nome'] ?></p>
                      <div class="d-flex justify-content-between align-items-center">
                      <div class="btn-group">
                        <a href="view.php?id=<?=$doacao['id']?>" class="btn btn-sm btn-outline-secondary">Visualizar</a>
                      </div>
                        <small class="text-body-secondary"> cidade: <?= $doacao['cidade'] ?></small>
                      </div>
                    </div>
                  </div>
                </div>
              <?php 
                }
                  }else{
                    echo '<div class="text-center"><p>Nenhuma doação encontrada</p></div>';
                  }
              ?>
          </div>        
        </div>
      </main>

</body>
</html>