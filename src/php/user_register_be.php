<?php


    $conection = mysqli_connect ("localhost", "root", "", "gameplus_bd");
    
/*
if ($conexion){
    echo 'conectado';
}else{
    echo 'no conectado';
}
*/


//Conección bd
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_pswd= $_POST['user_pswd'];
    
    $query ="INSERT INTO `users`(`user_name`, `user_email`, `user_pswd`) 
            VALUES ('$user_name','$user_email','$user_pswd')";

//Verificar  repetidos

$verify_email = mysqli_query($conection, "SELECT * FROM users WHERE user_email='$user_email' ");
if(mysqli_num_rows($verify_email) > 0){
    echo '
        <script>
            alert("This email is not available, please try again");
            window.location = "../html/register.html";
        </script>
    ';
    exit();
}


$verify_name = mysqli_query($conection, "SELECT * FROM users WHERE user_name ='$user_name' ");
if(mysqli_num_rows($verify_name) > 0){
    echo '
        <script>
            alert("This user name is not available, please try again");
            window.location = "../html/register.html";
        </script>
    ';
    exit();
}

$verify_pswd = "SELECT * FROM users WHERE user_name ='$user_name' ";
if(mysqli_num_rows($verify_name) > 0){
    echo '
        <script>
            alert("This user name is not available, please try again");
            window.location = "../html/register.html";
        </script>
    ';
    exit();
}
//Resultados
    $execute = mysqli_query($conection, $query);

    if($execute){
        echo '
        <script>
            window.location ="../../index.html";
        </script>
        ';
    }else{
        echo  '
        <script>
            alert("try again, user not saved");
            window.location ="../html/register.html";
        </script>
        ';

    }

    mysqli_close($conection);
?>