<?php

@include 'config.php';

if(isset($_POST['submit'])){

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['cpassword']);

    $select = " SELECT * FROM lietotaji WHERE email = '$email' && password = '$pass' ";

    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){

        $error[] = 'user already exist!';

    }else{

        if($pass != $cpass){
            $error[] = 'password not matched!';
        }else{
            $insert = "INSERT INTO lietotaji(email, password) VALUES('$email','$pass')";
            mysqli_query($conn, $insert);
            header('location:register_form.php');
        }
    }

};


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <link rel="stylesheet" href="./css/style.css">
</head>
<body>
<section>
   <div class="form-box2">
      <div class="form-value">


         <form action="" method="post">
      <h2>Register</h2>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>


            <div class="inputbox">
               <ion-icon name="mail-outline"></ion-icon>
               <input type="email"  name="email" required>
               <label for="">Enter your Email</label>
            </div>

            <div class="inputbox">
               <ion-icon name="lock-closed-outline"></ion-icon>
               <input type="password"  name="password" required>
               <label for="">Enter your Password</label>
            </div>

            <div class="inputbox">
               <ion-icon name="lock-closed-outline"></ion-icon>
               <input type="password" name="cpassword" required>
               <label for="">Confirm your Password</label>
            </div>

            <button><input type="submit" name="submit" value="Register" class="form-btn"></button>
            <p><font color="white">already have an account?</font> <a href="login_form.php"><font color="yellow">login now</font></a></p>

         </form>
      </div>
   </div>
</section>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>




