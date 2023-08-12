<?php


    $conection = mysqli_connect ("localhost", "root", "", "gameplus_bd");
    
/*
if ($conexion){
    echo 'conectado';
}else{
    echo 'no conectado';
}
*/



    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_pswd= $_POST['user_pswd'];
    
    $query ="INSERT INTO `users`(`user_name`, `user_email`, `user_pswd`) 
            VALUES ('$user_name','$user_email','$user_pswd')";

    $execute = mysqli_query($conection, $query);

    if($execute){
        echo '
        <script>
            window.location ="../index.html";
        </script>
        ';
    }else{
        echo  '
        <script>
            alert("try again, user not saved");
            window.location ="../index.html";
        </script>
        ';

    }

    mysqli_close($conection);
?>