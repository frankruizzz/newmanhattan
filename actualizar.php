<?php
    include('controller.php');
    $con=connection();
    $id=$_GET['actualizaid'];

    $sql="SELECT nombre, precio, contenido FROM platos WHERE id=$id";
    $rs=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($rs);
    $nombre = $row['nombre'];
    $precio = $row['precio'];
    $contenido = $row['contenido'];

    if(isset($_POST['submit'])){
        $nombre = htmlspecialchars($_POST['nombre'],ENT_QUOTES,'UTF-8');
        $precio = htmlspecialchars($_POST['precio'],ENT_QUOTES,'UTF-8');
        $contenido = htmlspecialchars($_POST['contenido'],ENT_QUOTES, 'UTF-8');
    
        $sql = "UPDATE platos SET nombre='$nombre', precio='$precio', contenido='$contenido' WHERE id=$id";
        $rs = mysqli_query($con, $sql);
        if($rs){
            //echo "<script>alert('Plato editado.');</script>";
            header('location: index.php');
        }
        else {
            die("Error al editar: ".mysqli_error($con));
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar plato.</title>
    <link rel="stylesheet" href="estiloboot.css">
    <style>
        body{
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #080b1c;
        }
        nav {
            background-color: #28a745;
            color: #fff;
            padding: 10px;
            text-align: center;
        }
        nav a {
            color: #fff;
            font-weight: bold;
            text-decoration: none;
            margin: 0 50px;
        }
    </style>
</head>
<body>
    <nav>
        <a href="public/index.html">ClientChat</a>
    </nav>
    
    <br><br><br><br>
    <center>
    <br><br>
    <form method="POST">
        <table align="center" width="70%" style="color: #fff;">
            <tr>
                <td colspan="2" align="center" style="font-size: 50px; font-weight: bold;">Actualizar plato</td>
            </tr>
            <tr>
                <td colspan="2"><br><br><br></td>
            </tr>
            <tr style="font-size: 25px;">
                <td align="right">Nombre:</td>
                <td align="center"><input type="text" name="nombre" size="30cm" value=<?php echo $nombre; ?> required></td>
            </tr>
            <tr>
                <td colspan="2"><br><br></td>
            </tr>
            <tr style="font-size: 25px;">
                <td align="right">Precio:</td>
                <td align="center"> <input type="text" name="precio" size="30cm" value=<?php echo $precio; ?> required></td>
            </tr>
            <tr>
                <td colspan="2"><br><br></td>
            </tr>
            <tr style="font-size: 25px;">
                <td align="right">Contenido:</td>
                <td align="center"> <input type="text" name="contenido" size="30cm" value=<?php echo $contenido; ?> required></td>
            </tr>
        </table>
        <br><br><br>
        <div class="input-container" style="text-align: center;font-size: x-large;">
            <input type="submit" name="submit" value="Actualizar" style="width: 6em; height: 2em;">
        </div>
        <br><br><br>
    </form>
    </center>
    <link rel="stylesheet" href="estiloboot.css">
</body>
</html>