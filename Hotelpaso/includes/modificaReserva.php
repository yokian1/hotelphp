<?php
//Rescate de informacion de formulario
$noches = $_POST['txtNoches'];
$tipoHabitacion = $_POST['txtTipoHabitacion'];
$ID = $_POST['txtID'];

//Creacion de conexion
$con =mysqli_connect('localhost','root','','hoteldb');
//query para obtener informacion del tipo de habitacion por el nombre del tipo de habitacion
$QueryIdTipoHabitacion1 = "select * from tipoHabitacion where tipoHabitacion='$tipoHabitacion'";
//ejecucion de query
$resultTipoHab = mysqli_query($con,$QueryIdTipoHabitacion1);


while($row=mysqli_fetch_array($resultTipoHab)){{
    $idTipoHab = $row['idTipoHabitacion'];//rescatams el id del tipo de habitacion 
    $precio = $row['precio'];//rescatamos el precio de la habitacion buscada
}}

//Calculamos nuevo costo de la reserva
$costoFinal = $precio*$noches;
//query para modificar la reservacion
$modificaQuery = "update reservaciones set noches=$noches,costo=$costoFinal, idTipoHabitacion=$idTipoHab where idReservaciones=$ID";
//ejecucion de query
$resultado = mysqli_query($con,$modificaQuery);


echo '
<html lang="en">

<head>

<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="X-UA-Compatible" content="ie=edge" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
<link rel="stylesheet" href="main.css" />

<title>Hotel el Paso</title>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<a class="navbar-brand" href="#">
  <img src="../img/logo.png" width="120" height="40" class="d-inline-block align-top" alt="" />
</a>
</nav>

';
echo "<h1 class='m-4'>Reserva Modificada!</h1>";
echo "<a class='btn btn-success m-4' href='../modificaReserva.php'>Volver..</a>";


echo '
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>';

?>