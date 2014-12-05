<?php
   class database {
      private $server;
      private $db;
      private $user;
      private $pass;
      private $connection;
      public function __construct($server,$db,$user,$pass){
          $this->server = $server;
          $this->db = $db;
          $this->user = $user;
          $this->pass = $pass;
      }
      
      public function conectaDB(){
        $this->connection = mysql_connect($this->server,$this->user,$this->pass) or die(mysql_error());
        mysql_set_charset('utf8',$this->connection);
        mysql_select_db($this->db,$this->connection) or die(mysql_error());
        
      } 
       //Mi funcion
    public function mostrarUsuariosP($query){
          $resultado = mysql_query($query);
          echo "<div class='table-responsive'>
                    <table class='table table-basic'>
                        <table class='table table-striped table-bordered table-hover'>
                            <thead>
                                <td>ID Usuario</td>
                                <td>Nombre</td>
                                <td>Apellido</td>
                                <td>Eliminar</td>
                                </tr>";
          while($dato = mysql_fetch_array($resultado)){
            echo "<tr>";
              echo "<td>" . $dato['id_usr'] . "</td>";
              echo "<td>" . $dato['nombre'] . "</td>";
              echo "<td>" . $dato['apellido'] . "</td>";
              
                echo "<td>
                    <form action='".$_SERVER['PHP_SELF']."' method='post'>
                        <input type='hidden' id='id_usr' name='id_usr' value='$dato[id_usr]' />
                        <input type='submit' name='formDelete' id='formDelete' value='Eliminar' />
                    </form>
                </td>";
                echo "</tr>";
          }
          echo "</tbody></table></div>";
      }
       
      public function returnString($query){
         
         $resultado = mysql_query($query);
          while($dato = mysql_fetch_array($resultado)){
              $cadena = $dato[0];
          }
          return $cadena;
      }
      public function validaUsuario($login_user,$login_pass){
        $query = "select count(*),tipo from usuarios where user = '$login_user' and password = '$login_pass' ";
        
        $result = mysql_query($query);
        $row = mysql_fetch_row($result);
        
        if($row[0] == 1){ 
           if($row[1] == "Administrador")
               header("Location:sistemaadministrativo.php");
           else
               header("Location:sistemausuario.php");
           //echo "Usuario Correcto";
        } else {
           echo "Usuario o Contraseña Invalidos";  
        }
       
      }
      public function executeCommand($query){
         mysql_query($query) or die(mysql_error());
        //header("Refresh:0");
          $actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
          print "<META HTTP-EQUIV='Refresh' CONTENT='0; URL={$actual_link}'>";

      }
      public function mostrarUsuarios($query){
          $resultado = mysql_query($query);
          echo "<div class='table-responsive'><table class='table table-basic'><table class='table table-striped table-bordered table-hover'><thead><td>ID Usuario</td><td>Nombre</td><td>Apellido Paterno</td><td>Apellido Materno</td><td>Usuario</td><td>Tipo</td></tr>";
          while($dato = mysql_fetch_array($resultado)){
            echo "<tr>";
              echo "<td>" . $dato['id_usuario'] . "</td>";
              echo "<td>" . $dato['nombre'] . "</td>";
              echo "<td>" . $dato['apellido_paterno'] . "</td>";
              echo "<td>" . $dato['apellido_materno'] . "</td>";
              echo "<td>" . $dato['user'] . "</td>";
              echo "<td>" . $dato['tipo'] . "</td>";
            echo "</tr>";
          }
          echo "</tbody></table></div>";
      }
      public function mostrarTerceros($query){
          $resultado = mysql_query($query);
          echo "<div class='table-responsive'><table class='table table-basic'><table class='table table-striped table-bordered table-hover'><thead><td>ID Tercero</td><td>Nombre</td><td>Apellido Paterno</td><td>Apellido Materno</td></tr>";
          while ($dato = mysql_fetch_array($resultado)){
              echo "<tr>";
                echo "<td>" . $dato['id_tercero'] . "</td>";
                echo "<td>" . $dato['nombre'] . "</td>";
                echo "<td>" . $dato['apellido_paterno'] . "</td>";
                echo "<td>" . $dato['apellido_materno'] . "</td>";
              echo "</tr>";
          }
          echo "</tbody></table></div>";
      }
      public function mostrarProveedores($query){
          $resultado = mysql_query($query);
          echo "<div class='table-responsive'><table class='table table-basic'><table class='table table-striped table-bordered table-hover'><thead><tr><td>ID Proveedor</td><td>Razon Social</td><td>RFC</td><td>Telefono Oficina</td><td>Email</td></tr></thead><tbody>";
          while($dato = mysql_fetch_array($resultado)){
              echo "<tr>";
                echo "<td>" . $dato['id_proveedor'] . "</td>";
                echo "<td>" . $dato['razon_social'] . "</td>";
                echo "<td>" . $dato['rfc'] . "</td>";
                echo "<td>" . $dato['tel_oficina'] .  "</td>";
                echo "<td>" . $dato['email'] . "</td>";
              echo "</tr>";
          }
          echo "</tbody></table></div>";
      }
       public function mostrarGastos($query){
           $resultado = mysql_query($query);
           echo "<div class='table-responsive'><table class='table table-basic'><table class='table table-striped table-bordered table-hover'><thead><td>ID Gasto</td><td>Descripcion</td><td>Cuenta Contable</td></tr></thead><tbody>";
           while($dato = mysql_fetch_array($resultado)){
               echo "<tr>";
                 echo "<td>" . $dato['id_gasto'] . "</td>";
                 echo "<td>" . $dato['descripcion'] . "</td>";
                 echo "<td>" . $dato['cuenta_contable'] . "</td>";
               echo "</tr>";
           }
           echo "</tbody></table></div>";
       }
       public function mostrarBeneficiario($query){
           $resultado = mysql_query($query);
           echo "<div class='table-responsive'><table class='table table-basic'><table class='table table-striped table-bordered table-hover'><thead><td>ID Beneficiario</td><td>Nombre</td><td>Apellido Paterno</td><td>Apellido Materno</td></tr></thead><tbody>";
           while($dato = mysql_fetch_array($resultado)){
               echo "<tr>";
                 echo "<td>" . $dato['id_beneficiario'] . "</td>";
                 echo "<td>" . $dato['nombre'] . "</td>";
                 echo "<td>" . $dato['apellido_paterno'] . "</td>";
                 echo "<td>" . $dato['apellido_materno'] . "</td>";
               echo "</tr>";
           }
           echo "</tbody></table></div>";
       }
       public function mostrarImpuestos($query){
           $resultado = mysql_query($query);
           echo "<div class='table-responsive'><table class='table table-basic'><table class='table table-striped table-bordered table-hover'><thead><td>ID Impuesto</td><td>Descripcion</td><td>Tasa</td><td>Cuenta Pasivo</td><td>Cuenta Pago</td><td>Status</td></tr></thead><tbody>";
           while($dato = mysql_fetch_array($resultado)){
               echo "<tr>";
                 echo "<td>" . $dato['id_impuesto'] . "</td>";
                 echo "<td>" . $dato['descripcion'] . "</td>";
                 echo "<td>" . $dato['tasa'] . "</td>" ;
                 echo "<td>" . $dato['cuenta_pasivo'] . "</td>";
                 echo "<td>" . $dato['cuenta_pago'] . "</td>";
                 echo "<td>" . $dato['status'] . "</td>";
              echo "</tr>";
           }
           echo "</tbody></table></div>";
       }
       public function mostrarGrupoContable($query){
           $resultado = mysql_query($query);
           echo "<div class='table-responsive'><table class='table table-basic'><table class='table table-striped table-bordered table-hover'><thead><tr><td>ID Grupo Contable</td><td>Nombre</td></tr></thead><tbody>";
           while($dato = mysql_fetch_array($resultado)){
               echo "<tr>";
                 echo "<td>" . $dato['id_grupocontable'] . "</td>";
                 echo "<td>" . $dato['nombre'] . "</td>";
               echo "</td>";
           }
           echo "</tbody></table></div>";
       }
       public function mostrarGrupoFiscal($query){
           $resultado = mysql_query($query);
           echo "<div class='table-responsive'><table class='table table-basic'><table class='table table-striped table-bordered table-hover'><thead><tr><td>ID Grupo Fiscal</td><td>Nombre</td></tr></thead><tbody>";
           while($dato = mysql_fetch_array($resultado)){
               echo "<tr>";
                 echo "<td>" . $dato['id_grupofiscal'] . "</td>";
                 echo "<td>" . $dato['nombre'] . "</td>";
               echo "</tr>";
           }
           echo "</tbody></table></div>";
       }
       public function mostrarClavesPoliza($query){
           $resultado = mysql_query($query);
           echo "<div class='table-responsive'><table class='table table-basic'><table class='table table-striped table-bordered table-hover'><thead><tr><td>Clave</td><td>Descripcion</td></tr></thead><tbody>";
           while($dato = mysql_fetch_array($resultado)){
               echo "<tr>";
                 echo "<td>" . $dato['clave'] . "</td>";
                 echo "<td>" . $dato['descripcion'] . "</td>";
               echo "</tr>";
           }
           echo "</tbody></table></div>";
       }
       public function mostrarGruposMovimientos($query){
           $resultado = mysql_query($query);
           echo "<div class='table-responsive'><table class='table table-basic'><table class='table table-striped table-bordered table-hover'><thead><tr><td>ID Grupo de Tipos de Movimientos</td><td>Descripcion</td></tr></thead><tbody>";
           while($dato = mysql_fetch_array($resultado)){
               echo "<tr>";
                 echo "<td>" . $dato['id_grupo'] . "</td>";
                 echo "<td>" . $dato['descripcion'] . "</td>";
               echo "</tr>";
           }
           echo "</tbody></table></div>";
       }
       public function mostrarTiposMovimientos($query){
           $resultado = mysql_query($query);
           echo "<div class='table-responsive'><table class='table table-basic'><table class='table table-striped table-bordered table-hover'><thead><tr><td>ID Tipo Movimiento</td><td>Descripcion</td><td>Tipo de Movimiento</td><td>Grupo de Movimiento</td><td>Descripcion de Movimiento</td></tr></thead><tbody>";
           while($dato = mysql_fetch_array($resultado)){
               echo "<tr>";
                 echo "<td>" . $dato[0] . "</td>";
                 echo "<td>" . $dato[1] . "</td>";
                 echo "<td>" . $dato[2] . "</td>";
                 echo "<td>" . $dato[3] . "</td>";
                 echo "<td>" . $dato[4] . "</td>";
               echo "</tr>";
           }
           echo "</tbody></table></div>";
       }
       public function loadComboBox($query,$name){
           $resultado = mysql_query($query);
           echo '<select name="'.$name.'">';
           while($dato = mysql_fetch_array($resultado)){
               echo '<option>' . $dato[0] . '</option>';
           }
           echo '</select>';
       }
   }

   
?>