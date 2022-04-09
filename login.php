<?php 
session_start();

if($_POST)
{
    if(($_POST['usuario']=="develoteca") && ($_POST['contrasena']=="12345"))
    {
        $_SESSION['usuario']="develoteca";
        header("location:index.php");
    }
    else
    {
        echo "<script> alert('Usuario y contraseña incorrecta'); </script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    
    <link rel="stylesheet" href="bootstrap-5.0.2/dist/css/bootstrap.min.css">

</head>
<body>

<div class="container">


    <div class="row">

        <div class="col-md-4">

        </div>
        <div class="col-md-4">
            <br/>
            <div class="card-header">
                Iniciar session
            </div>
            <div class="card-body">
                <form action="login.php" method="post">

                    Usuario: <input class="form-control" type="text" name="usuario" id="">
                    <br/>
                    Contraseña: <input class="form-control" type="password" name="contrasena" id="">
                    <br/>
                    <button class="btn btn-success"type="">Entrar al portafolio</button>

                </form>
            </div>
            <div class="card-footer text-muted">
                <br/>
            </div>
        </div>
        <div class="col-md-4">

        </div>

    </div>




</div>    

</body>
</html>




