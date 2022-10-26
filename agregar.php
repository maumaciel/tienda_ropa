<?php 
//Conexion de la BD
$conexion=mysqli_connect("127.0.0.1","root","");
mysqli_select_db($conexion,"tienda_ropa");

//Almacenar los datos en variables del envio POST
$tipo_prenda = $_POST["tipo_prenda"];
$marca = $_POST["marca"];
$talle = $_POST["talle"];
$precio = $_POST["precio"];
$imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));





//Prepar la orden SQL
$consulta = "INSERT INTO ropa (id,tipo,marca,talle,precio,imagen)
                VALUES ('','$tipo_prenda','$marca','$talle','$precio','$imagen')";


//Ejecutar la orden e ingresar los datos a la BD
mysqli_query($conexion,$consulta);

echo "<script>
              alert('Prenda AGREGADA con éxito');
              window.location= 'lista1.php';
      </script>";
//header('location:lista1.php');
?>