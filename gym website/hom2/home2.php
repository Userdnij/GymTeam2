<?php

require_once "1connection.php";
function pirkums():array
{

    $servername = "localhost";
    $database = "gymteam";
    $username = "root";
    $password = "";
    $conn = mysqli_connect($servername, $username, $password, $database);
    global $pdo;
    $res = $pdo->query("SELECT * from `abonementi`; ");
    return $res->fetchAll();

}

$rezultat = pirkums();
?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gym</title>
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

<header>

    <nav class="nav">
        <a href="#ABONEMENTI">ABONEMENTI</a>
        <a href="#VIDEO">VIDEO</a>
        <a href="#PIEZIMES">PIEZĪMES</a>

    </nav>
    <div class="login">
        <a href="../lietotaji/register_form.php"><button>LOG OUT</button></a>
    </div>
</header>


    <div class="form-box">
        <div class="card-container">
            <?php if(!empty($rezultat)): ?>
            <?php foreach ($rezultat as $rezultats): ?>
            <div class="card">
                <h2><?php echo $rezultats["Nosaukums"] ?></h2>
                <hr>
                <p><?php echo $rezultats["Datums"] ?></p>
                <ul>
                    <li><?php echo $rezultats["Apraksts"] ?></li>
                </ul>
                <div class="price">
                    <a href="Pirksana.php?id=<?=$rezultats["id"]?>"class="btn btn-info btn-block add-to-cart" data-id="<?=$rezultats["id"]?>">Cenas</a>
                </div>
            </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        </div>


</body>
</html>