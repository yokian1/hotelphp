<?php
//Recepcion de valores de formulario 
$email = $_POST['txtEmail'];
$passwd = $_POST['txtContrasena'];

//Creacion de conexion
$con =mysqli_connect('localhost','root','','hoteldb');

//query para para validar si el usuario/contraseña ingresados son correctos
$consulta = "SELECT * FROM usuarios where correo='$email' and contrasena='$passwd' ";
//ejecucion de query
$resultado = mysqli_query($con,$consulta);

//cuenta cuantos registros arrojo la query
$counter=mysqli_num_rows($resultado);


//Si la query devuelve 1 resultado los datos ingresados son correctos
if($counter==1){
    session_start();

    while($cliente=$resultado->fetch_assoc()){
        $_SESSION['id'] =$cliente["idUsuario"];
        $_SESSION['nombre'] = $cliente['Nombre'];
        $_SESSION['tipoUsuario']= $cliente["idTipoUsuario"];
    }
   $_SESSION['user'] = $email;
    header('Location: ../home.php');
   //include("../home.html");
}else{

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
    echo "<h1 class='m-4'>Credenciales incorrectas!</h1>";
    echo "<a class='btn btn-success m-4' href='../index.html'>Volver</a>";


    echo '
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>';


}
