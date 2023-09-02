<?php
$conection = mysqli_connect("localhost", "root", "", "gameplus_bd");

$user_name = $_POST['user_name'];
$user_email = $_POST['user_email'];
$user_pswd = $_POST['user_pswd'];
$user_rpswd = $_POST['user_rpswd'];

// Verificar repetidos
$verify_email = mysqli_query($conection, "SELECT * FROM users WHERE user_email='$user_email' ");
if (mysqli_num_rows($verify_email) > 0) {
    echo '
        <script>
            alert("This email is not available, please try again");
            window.location = "../html/register.html";
        </script>
    ';
    exit();
}

$verify_name = mysqli_query($conection, "SELECT * FROM users WHERE user_name ='$user_name' ");
if (mysqli_num_rows($verify_name) > 0) {
    echo '
        <script>
            alert("This user name is not available, please try again");
            window.location = "../html/register.html";
        </script>
    ';
    exit();
}

// Validar contraseñas
if ($user_rpswd !== $user_pswd) {
    echo '
        <script>
            alert("Las contraseñas no coinciden, por favor inténtalo de nuevo");
            window.location = "register.php";
        </script>
    ';
    exit();
} else {
    $encrypted_user_pswd = hash('sha512', $user_pswd);
}

$encrypted_user_pswd = mysqli_real_escape_string($conection, $encrypted_user_pswd); // Escape special characters

// Construir consulta SQL con la contraseña encriptada
$query = "INSERT INTO `users`(`user_name`, `user_email`, `user_pswd`) 
          VALUES ('$user_name','$user_email','$encrypted_user_pswd')";

// Ejecutar consulta
$execute = mysqli_query($conection, $query);

if ($execute) {
    echo '
        <script>
            window.location = "../../index.html";
        </script>
    ';
} else {
    echo  '
        <script>
            alert("Try again, user not saved");
            window.location = "register.php";
        </script>
    ';
}

mysqli_close($conection);
?>