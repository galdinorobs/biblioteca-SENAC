<?php
if($_SERVER["REQUEST_METHOD"] == "POST ") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "biblioteca";

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if(!$conn) {
        die("Conexão falhou:".mysqli_connect_erro());
    }

    $nome = mysqli_real_escape_string($conn,$_POST['nome']);
    $nome = mysqli_real_escape_string($conn,$_POST['email']);
    $senha = password_hash($_POST['senha'],PASSWORD_DEFAULT);
    $tipo = mysqli_real_escape_string($conn,$_POST['tipo']);

    $sql = "INSERT INTO usuarios (nome, email, senha, tipo) VALUES ('$nome','$email','$senha','$tipo')";
    if (mysqli_query($conn,$sql)) {
        echo "Novo registro criado com sucesso";
    } else {
        echo "Erro:".$sql."<br>".mysqli_error($conn);
    }

    mysqli_close($conn);

}
?>






<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro de usuário</title>
    <link rel="stylesheet" href="assets/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <h1 class="titulo">Bem vindo a Biblioteca</h1>

    <?php
        include 'cabecalho.php'
    ?>

    <h1>Cadastro de usuário</h1>

    <form method="POST">
        <label for="nome">Nome</label>
        <input type="text" id="nome" name="nome" required>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>
        <label for="senha">Senha</label>
        <input type="password" id="senha" name="senha" required>
        <select name="tipo" id="tipo" required>
            <option value="admin">Admin</option>
            <option value="aluno">Aluno</option>
        </select>
        <button type="submit">Cadastrar</button>
    </form>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
  </body>
</html>