<link rel="stylesheet" href="../style/confirmations.css" type="text/css">

<?php
$pdo = null;

try {
    $pdo = new PDO('mysql:host=localhost;dbname=hps', 'root');
} catch (Exception $e) {
    echo '<div class="error"><h1>Erro ao conectar com o servidor: ' . $e->getMessage() . '</h1></div>';
    die();
}

return $pdo;
?>