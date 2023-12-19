<?php
    include '../lietotaji/acc.php';
    require_once "../hom2/1connection.php";
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
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script>
    </script>
</head>
<body>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>





<a class="btn btn-primary" href="Admin.php" role="button">back</a>

<center>
<form action="" method="post">
    <table>
        <tr>
            <th><font color="#4CAF50">ID</font></th>
            <th><font color="#4CAF50">Nosaukums</font></th>
            <th><font color="#4CAF50">Apraksts</font></th>
            <th><font color="#4CAF50">Datums</font></th>
        </tr>

        <?php if(!empty($rezultat)): ?>
            <?php foreach ($rezultat as $rezultats): ?>
                <tr> <div class="card" style="width: 18rem;">
                        <ul class="list-group list-group-flush">
                    <td><li class="list-group-item"><?php echo $rezultats["id"] ?></li></td>
                    <td><li class="list-group-item"><?php echo $rezultats["Nosaukums"] ?></li></td>
                    <td><li class="list-group-item"><?php echo $rezultats["Apraksts"] ?></li></td>
                    <td><li class="list-group-item"><?php echo $rezultats["Datums"] ?></li></td>
                        </ul>
                    </div>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </table>
</form>

<br>
    <div class="card" style="width: 18rem;">
        <ul class="list-group list-group-flush">
            <form action="" method="post">
                <li class="list-group-item">
<form action="" method="post">
    Add new: <br>
    <input type="text" name="Nosaukums" placeholder="Nosaukums"><br><br>
    <input type="text" name="Apraksts" placeholder="Apraksts"><br><br>
    <input type="text" name="Datums" placeholder="Datums"><br><br>
    <input type="submit" name="submit_add" value="Add">
</form>
    </li> </ul>
    </div>
<?php
    if(isset($_POST['submit_add'])) {
        $Nosaukums = $_POST['Nosaukums'];
        $Apraksts = $_POST['Apraksts'];
        $Datums = $_POST['Datums'];

        require_once '../hom2/1connection.php';
        $sql = 'INSERT INTO abonementi (Nosaukums, Apraksts, Datums)
                        VALUES (?, ?, ?)';


        $statement = $conn->prepare($sql);

        $statement->execute([$Nosaukums, $Apraksts, $Datums]);
        header("Refresh:0; location:home2.php");
    }
?>
<br><br><br>
    <div class="card" style="width: 18rem;">
        <ul class="list-group list-group-flush">
<form action="" method="post">
    <li class="list-group-item">
        Delete by id: <br>

    <input type="text" name="id" placeholder="id"><br><br>
    <input type="submit" name="submit_delete" value="Delete">
</form></li> </ul>
    </div>
<?php
    if(isset($_POST['submit_delete'])) {
        $id = $_POST['id'];

        require_once '../hom2/1connection.php';

        $sql = 'DELETE FROM abonementi WHERE id = ?';

        $statement = $conn->prepare($sql);

        $statement->execute([$id]);
        header( "location:home2.php");
    }
?>

</body>
</html>
