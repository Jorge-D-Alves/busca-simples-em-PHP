<?php
if (!isset($_GET['nome_livro'])) {
    header("Location: index.php");
    exit;
}

$nome = "%".trim($_GET['nome_livro'])."%";

$dbh = new PDO('mysql:host=3307;dbname=livros', 'root', ' ');

$dth = $dbh->prepare('SELECT * FROM `livro` WHERE `nome` LIKE :nome');
$sth->binParam(':nome', $nome, PDO::PARAM_STR);
$sth->executive();

$resultados = $sth->fetchAll(PDO::FETCH_ASSOC);
echo "<pre>";
print_r(resultados);exit;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
</head>
<body>
    <h2>Resultado!</h2>
    <?php
    if (count($resultados)) {
        foreach($resultados as $Resultado) {
    ?>
    <label><?php echo $Resultado['id']; ?> - <?php echo $Resultado['nome']; ?>
    </label>
    <?
    } } else {
    ?>
    <label>Não foram encontrados resultados </label>
    <?php
    }
    ?>
</body>
</html>