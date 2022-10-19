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
            <a class="navbar-brand" href="index.html">Tienda Ropa</a>
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
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Mostrar por
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="lista2.php">Tipo de prenda: Buzo</a></li>
                    <li><a class="dropdown-item" href="lista3.php">Marca: Nike</a></li>
                    <li><a class="dropdown-item" href="lista4.php">Precio: mayor a $500</a></li>
                </ul>
                </li>
            </ul>
            </div>
        </div>
        </nav>
    <header>
    <main>
        <h1>TIENDA ROPA</h1>
        <h2>Buzos en stock</h2>
        <table class="table table-striped">
            <tr>
                <th>ID</th>
                <th>Tipo de prenda</th>
                <th>Marca</th>
                <th>Talle</th>
                <th>Precio</th>
                <th>Foto</th>
            </tr>
            <?php 
                //Conexión a la bd
                $conexion=mysqli_connect("127.0.0.1","root","");
                mysqli_select_db($conexion,"tienda_ropa");

                $consulta= "SELECT * FROM ropa WHERE tipo = 'buzo'";

                $datos= mysqli_query ($conexion, $consulta);
                

            while ($reg =mysqli_fetch_array($datos)) { ?>
                 <tr>
                    <td><?php echo $reg['id']; ?></td>
                    <td><?php echo $reg['tipo']; ?></td>
                    <td><?php echo $reg['marca']; ?></td>
                    <td><?php echo $reg['talle']; ?></td>
                    <td><?php echo $reg['precio']; ?></td>
                    <td><img src="data:image/jpg;base64, <?php echo base64_encode($reg['imagen']) ?>"</td>
                 </tr>   
               <?php } ?>
        </table>
        
    </main>
    
    <footer></footer>
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>