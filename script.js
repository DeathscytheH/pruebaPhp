$(document).ready(function(){
    $("#agregar").click(function(){
        var id = $("#id_cliente").val();
        var nombre = $("#nombre_cliente").val();
        var producto = $("#precio_producto").val();
        var precio = $("#precio_producto").val();
// Returns successful data submission message when the entered information is stored in database.
        var dataString = 'id='+ id + '&nombre='+ nombre + '&producto='+ producto + '&precio='+ precio;
        if( id == '' || nombre == '' || producto == '' || precio == '' ){
            alert("Llena toda la información!");
        } else {
            // AJAX Code To Submit Form.
            $.ajax({
                type: "POST",
                url: "precios.php",
                data: dataString,
                cache: false,
                success: function(data){
                    $.post('precios.php',dataString) ;
                }
            });
        }
        return false;
    });
});
$(document).ready(function(){
    $("#formDelete ").click(function(){
        var id = $("#id_cliente").val();
        var nombre = $("#nombre_cliente").val();
        var producto = $("#precio_producto").val();
        var precio = $("#precio_producto").val();
// Returns successful data submission message when the entered information is stored in database.
        var dataString = 'id='+ id + '&nombre='+ nombre + '&producto='+ producto + '&precio='+ precio;
        if( id == '' || nombre == '' || producto == '' || precio == '' ){
            alert("Llena toda la información!");
        } else {
            // AJAX Code To Submit Form.
            $.ajax({
                type: "POST",
                url: "precios.php",
                data: dataString,
                cache: false,
                success: function(data){
                    $.post('precios.php',dataString) ;
                }
            });
        }
        return false;
    });
});