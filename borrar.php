<?php
//Conexion
$conexion=mysqli_connect("127.0.0.1","root","");
mysqli_select_db($conexion,"tienda_ropa");

//Almacenar los datos del envio GET
$id = $_GET['id'];

//Preparar la orden SQL
$consulta = "DELETE FROM ropa WHERE id = $id";

//Ejecutar la orden SQL

mysqli_query($conexion,$consulta);

echo "<script>
              alert('Prenda ELIMINADA con éxito');
              window.location= 'lista1.php';
      </script>";

?>