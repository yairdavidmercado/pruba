<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" crossorigin="anonymous">
</head>
<body class="bg-light">

<div class="container">
<br>
<br>
<br>
<article class="card-body mx-auto" style="max-width: 400px;">
    <h4 class="card-title mt-3 text-center">Crear Cuenta</h4> 

	<form>
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
            </div>
            <input id="name" class="form-control" placeholder="Nombre completo" type="text">
        </div> <!-- form-group// -->
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
            </div>
            <input id="email" class="form-control" placeholder="Dirección Email" type="email">
        </div> <!-- form-group// -->
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
            </div>
            <input id="phone" class="form-control" placeholder="Número de teléfono" type="text">
        </div> <!-- form-group// -->

        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
            </div>
            <input id="password" class="form-control" placeholder="Contraseña" type="password">
        </div> <!-- form-group// -->
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
            </div>
            <input name="password" class="form-control" placeholder="Confirmar contraseña" type="password">
        </div> <!-- form-group// -->
            <div class="checkbox mb-3">
                <center>
                    <a href="../">Login</a>
                </center>
            </div>                                       
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block"> Crear Cuenta  </button>
        </div> <!-- form-group// -->                                       
    </form>
</article>

</div> 
<!--container end.//-->
<script src="../js/jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script>
<script src="../js/jquery-1.9.1.js"></script>
<script src="../js/popper.min.js" crossorigin="anonymous"></script>
<script src="../js/bootstrap.min.js" crossorigin="anonymous"></script>
<script>
    $(function () {

    $('form').on('submit', function (e) {

        e.preventDefault();
        var values={
            name: $('#name').val(),
            email: $('#email').val(),
            phone: $('#phone').val(),
            password: $('#password').val()
        }
        $.ajax({
        type: 'post',
        url: '../php/usuario/guardar_usuario.php',
        data: values,//$('form').serialize(),
        success: function () {
            alert('form was submitted');
        }
        });

    });

    });
</script> 
</body>
</html>