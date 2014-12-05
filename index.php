<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Prueba</title>
</head>
<body>
    <h1>Prueba</h1>
    <?php 
        include 'database.php';
        $db = new database('localhost','contador','root','');
        $db->conectaDB();
        $tabla = "select * from prueba_tabla";
        $db->mostrarUsuariosP($tabla);
        if(isset($_POST['formDelete'])){
            if(isset($_POST['id_usr']) && !empty($_POST['id_usr'])){
                $usr_id = $_POST['id_usr'];
                $query = "delete from prueba_tabla where id_usr =".$usr_id;
                $db->executeCommand($query);
                header('Location: '.$_SERVER['REQUEST_URI']);
           }
        }
    ?>
</body>
</html>