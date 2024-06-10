<?php
    include('controller.php');
    $con=connection();
    $id=$_GET['eliminaid'];
    
    $sql="DELETE FROM platos WHERE id=$id";
    $rs=mysqli_query($con,$sql);
    if($rs){
        echo "<script>alert('Plato eliminado :(')</script>";
    }
    else {
        die("Error al eliminar: ".mysqli_error($con));
    }
    header('location: index.php');
?>