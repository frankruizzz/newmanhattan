<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #fff;
            background-color: #080b1c;
        }
        .column {
            width: 50%;
            padding: 20px;
        }
        header {
            color: #fff;
            padding: 5px;
            text-align: center;
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
        nav a:hover {
            text-decoration: underline;
        }
        table {
            border-collapse: collapse;
        }
        section {
            padding: 20px;
        }
        footer {
            background-color: #403f85;
            color: #fff;
            padding: 10px;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body style="color: white;">
    <nav>
        <a href="platos.html">Insertar platos</a>
        <a href="public/index.html">ClientChat</a>
    </nav>
    <table style="border: #fff"></table>
    <br><br><br>
    <center>
    <h1>Platos</h1>
    <br><br>
    <?php
        include ('controller.php');
        $con=connection();

        $sql = "SELECT id, nombre, precio, contenido FROM platos";
        $result = $con->query($sql);

        if ($result->num_rows > 0) {
            echo "<table style='width: 70%;'>
                    <tr>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Contenido</th>
                    </tr>";
            
            while($row = $result->fetch_assoc()) {
                $id = $row["id"];
                $nombre=$row["nombre"];
                $precio=$row["precio"];
                $contenido=$row["contenido"];
                echo "<tr>
                        <td style='border: solid white 1px;'>" . $nombre . "</td>
                        <td style='border: solid white 1px;'>" . $precio . "</td>
                        <td style='border: solid white 1px;'>" . $contenido . "</td>
                        <td>
                            <a class='btn btn-primary' href='actualizar.php?actualizaid=$id'>Actualizar</a>
                            <a class='btn btn-danger' href='eliminar.php?eliminaid=$id'>Eliminar</a>
                        </td>
                    </tr>";
            }
            echo "</table>";
        } else {
            echo "Aún no hay platos.";
        }
    ?>
    </center>
<link rel="stylesheet" href="estiloboot.css">
<br><br><br><br><br>
</body>
</html>