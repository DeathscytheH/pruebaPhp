<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Clientes</title>
</head>
<body>
       <h1>Clientes</h1>
    <form action="precios.php" method="post">
        ID Cliente: <input type="text" name="id_cliente" value=""><br>
        <?php if((isset($_POST['id_cliente'])) && ($_POST['id_cliente'] == "")){
                    echo "Por favor escribe el ID del cliente";
                }
                ?>
        Nombre del Cliente: <input type="text" name="nombre_cliente" value=""><br>
                <?php if((isset($_POST['nombre_cliente'])) && ($_POST['nombre_cliente'] == "")){
                    echo "Por favor escribe el Nombre del cliente";
                }
                ?>
        <input type="submit" value="Continuar" name="continuar">
    </form>
</body>
</html>