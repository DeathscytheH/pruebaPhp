<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="script.js"></script>    
    <title>Precios</title>
</head>
<body>
    <h1>Prueba Precios</h1>
<br>
<?php 
        include 'database.php';
        $db = new database('localhost','contador','root','');
        $db->conectaDB();
        if ($_POST){
            var_dump($_POST);
        }
        $id_val = (empty($_POST['id'])) ? '' : $_POST['id'] ;
        $nombre_val = (empty($_POST['nombre'])) ? '' : $_POST['nombre'] ;
        //Agregar valores a tabla
        if(isset($_REQUEST['agregar'])){
                $id_cliente = $_POST['id'];
                $nombre_cliente = $_POST['nombre'];
                $nombre_producto = $_POST['producto'];
                $precio_producto = $_POST['precio'];
                $query = "insert into tabla_productos(id_cliente, nombre_cliente, nombre_producto, precio_producto) values ('$id_cliente', '$nombre_cliente', '$nombre_producto', '$precio_producto')";
                $db->executeCommand($query);
                //mysql_close($db);
           }
        //Eliminar valores de tabla
        if(isset($_POST['formDelete'])){
            if(isset($_POST['id']) && !empty($_POST['id'])){
                $id_cliente = $_POST['id'];
                echo $id_cliente;
                echo '<br>';
                $nombre_producto = $_POST['producto'];
                echo $nombre_producto;
                echo '<br>';
                $query = "delete from tabla_productos where id_cliente ='$id_cliente' and nombre_producto ='$nombre_producto'";
                echo $query;
                echo '<br>';                
                $db->executeCommand($query);
                //mysql_close($db);
                header('Location: '.$_SERVER['REQUEST_URI']);
           }
        }
?>
    
    <form action="precios.php" method="post">
        ID Cliente: <input type="text" name="id_cliente" id="id_cliente" value="<?php echo $id_val ?>"><br>
        Nombre del Cliente: <input type="text" name="nombre_cliente" id="nombre_cliente" value="<?php echo $nombre_val ?>"><br>
        Nombre del Producto: <input type="text" name="nombre_producto" id="nombre_producto" value=""><br>
        Precio del Producto: <input type="text" name="precio_producto" id="precio_producto" value=""><br>
        <input type="submit" value="Agregar" name="agregar" id="agregar">
    </form>
    
    <br>
    <br>
    <?php 
        //Mostrar los valores de la tabla
        $tabla = "select * from tabla_productos";
        $db->mostrarPrecios($tabla);
    ?>      
</body>
</html>