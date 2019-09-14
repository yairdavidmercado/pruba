<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" crossorigin="anonymous">
</head>
<body class="bg-light">

<div class="container">
<br>
    <h4 class="card-title mt-3 text-center">Usuarios</h4> 

	<table class="table">
        <thead class="thead-dark">
            <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">email</th>
            <th scope="col">teléfono</th>
            </tr>
        </thead>
        <tbody id="grid_view">

        </tbody>
    </table>

</div> 
<!--container end.//-->
<script src="../js/jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script>
<script src="../js/jquery-1.9.1.js"></script>
<script src="../js/popper.min.js" crossorigin="anonymous"></script>
<script src="../js/bootstrap.min.js" crossorigin="anonymous"></script>
<script>
    $(function () {
        llenar_tabla()

    });

    function llenar_tabla(params) {
        var values={
                codigo: 1,
                email: ""
            }
            $.ajax({
                type: 'post',
                url: '../php/usuario/sel_usuario.php',
                data: values,
                success: function (e) { 
                    try {
                        var obj = $.parseJSON(e);
                        var fila = "";

                        $.each(obj, function() {
                            $.each(this, function(i, val){
                                fila += "<tr>"+
                                            "<th scope='row'>"+val.consec+"</th>"+
                                            "<td>"+val.name+"</td>"+
                                            "<td>"+val.email+"</td>"+
                                            "<td>"+val.phone+"</td>"+
                                        "</tr>";
                            });
                        });


                        $("#grid_view").html(fila)
                    } catch (error) {
                        alert("Ha ocurrido un error inesperado: "+error+" de "+e)
                    }
                    
                
                }
            });
    }
</script> 
</body>
</html>