<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Precios</title>
</head>
<body>
    <h1>Prueba Precios</h1>
<br>
<?php 
        include 'database.php';
        $db = new database('localhost','contador','root','');
        $db->conectaDB();
        if(isset($_REQUEST['agregar'])){
               
                $id_cliente = $_POST['id_cliente'];
                $nombre_cliente = $_POST['nombre_cliente'];
                $nombre_producto = $_POST['nombre_producto'];
                $precio_producto = $_POST['precio_producto'];
                $query = "insert into tabla_productos(id_cliente, nombre_cliente, nombre_producto, precio_producto) values ('$id_cliente', '$nombre_cliente', '$nombre_producto', '$precio_producto')";
                $db->executeCommand($query);
                //header('Location: '.$_SERVER['REQUEST_URI']);
           }
        elseif(isset($_POST['formDelete'])){
            if(isset($_POST['id_cliente']) && !empty($_POST['id_cliente'])){
                $id_cliente = $_POST['id_cliente'];
                $nombre_producto = $_POST['nombre_producto'];
                $query = "delete from tabla_productos where id_cliente ='$id_cliente' and nombre_producto ='$nombre_producto'";
                $db->executeCommand($query);
                //header('Location: '.$_SERVER['REQUEST_URI']);
                
                
                
           }
        }
        echo "prueba";
        echo $id_cliente;
        echo $nombre_cliente;
?>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        ID Cliente: <input type="text" name="id_cliente" value="<?php echo (isset($id_cliente)) ? $id_cliente : 'sin nombre' ; ?>"><br>
        Nombre del Cliente: <input type="text" name="nombre_cliente" value="<?php echo (isset($nombre_cliente)) ? $nombre_cliente : 'sin nombre' ; ?>"><br>
        Nombre del Producto: <input type="text" name="nombre_producto" value=""><br>
        Precio del Producto: <input type="text" name="precio_producto" value=""><br>
        <input type="submit" value="Agregar" name="agregar">
    </form>
    
    <br>
    <br>
    <?php 
        $tabla = "select * from tabla_productos";
        $db->mostrarPrecios($tabla);
    ?>      
</body>
</html>