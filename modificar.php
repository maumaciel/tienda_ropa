<?php 
//Conexion
$conexion=mysqli_connect("127.0.0.1","root","");
mysqli_select_db($conexion,"tienda_ropa");

//Almacenar los datos del envio GET
$id = $_GET['id'];

//Orden SQL
$consulta = "SELECT * FROM ropa WHERE id = $id";

//EJECUTO LA ORDEN

$respuesta = mysqli_query($conexion,$consulta);

//TRANFORMO LOS DATOS OBETENIDOS EN UN ARRAY

$datos = mysqli_fetch_array($respuesta);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trabajo práctico 8 - Tienda ropa</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    <header>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Tienda Ropa</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.html">Inicio</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="lista1.php">Productos</a>
                </li>
                
            </ul>
            </div>
        </div>
        </nav>
    <header>
    <main>
        <?php
            $tipo_prenda = $datos['tipo'];
            $marca = $datos['marca'];
            $talle = $datos['talle'];
            $precio = $datos['precio'];
            $imagen = $datos['imagen'];
        ?>

        <h1>Modificar ropa</h1>
        <p>Ingrese los nuevos datos de la prenda:</p>
        <form action="" method="post" enctype="multipart/form-data">
            
            <label>Tipo de prenda</label>
            <input type="text" name="tipo_prenda" placeholder="tipo de prenda" value="<?php echo $tipo_prenda; ?>" required>

            <label>Marca</label>
            <input type="text" name="marca" placeholder="marca" value="<?php echo $marca; ?>" required>

            <label>Talle</label>
            <input type="text" name="talle" placeholder="talle" value="<?php echo $talle; ?>" required>

            <label>Precio</label>
            <input type="text" name="precio" placeholder="precio" value="<?php echo $precio; ?>"required>

            <label>Imagen</label>
            <input type="file" name="imagen" placeholder="imagen">

            <input type="submit" name="guardar_cambios" value="Guardar cambios">
            <button type="submit" name="cancelar" formaction="lista1.php">Cancelar</button>
        </form>

        <?php
            if (array_key_exists('guardar_cambios',$_POST)){
                $tipo_prenda=$_POST['tipo_prenda'];
                $marca=$_POST['marca'];
                $talle=$_POST['talle'];
                $precio=$_POST['precio'];
                
                $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
                
                
                

            $consulta = "UPDATE ropa SET tipo='$tipo_prenda', marca='$marca', talle='$talle', precio='$precio', imagen='$imagen' WHERE id = $id";

            mysqli_query($conexion,$consulta);

            echo "<script>
                    alert('Prenda MODIFICADA con éxito');
                     window.location= 'lista1.php';
                  </script>";
            }
        ?>


    </main>
    
    <footer></footer>
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>