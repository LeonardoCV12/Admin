<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interfaz de admin</title>
    <link rel= "stylesheet" href= "https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" >
    <link rel="stylesheet" href="./styleAdmin.css">
</head>
<body>
    <div class="barra-lateral">
        <div class="nombre-pagina">
            <i id="coffee" class="las la-user-lock"></i>
            <span>ADMINISTRADOR</span>
        </div>
        <button class="boton">
            <i class="las la-user-friends"></i>
            <a href="#clientes"><span>Administrar clientes</span></a>
        </button>
        <button class="boton">
            <i class="las la-id-card"></i>
            <a href="#empleados"><span>Registrar un empleado</span></a>
        </button>
        <button class="boton">
           <i class="las la-hamburger"></i>
            <a href="#productos"><span>Administrar productos</span></a>
        </button>
        <nav class="navegacion">
            <ul>
                <li>
                    <a href="#reporte">
                        <i class="las la-chart-bar"></i>
                        <span>Gererar reporte</span>
                    </a>
                </li>
                <li>
                    <a href="#inicio">
                        <i class="las la-home"></i>
                        <span>Inicio</span>
                    </a>
                </li>
                <li>
                    <a href="https://www.facebook.com/profile.php?id=61563546177321&mibextid=ZbWKwL">
                        <i class="lab la-facebook"></i>
                        <span>Facebook</span>
                    </a>
                </li>
                <li>
                    <a href="https://www.google.com/intl/es-419/gmail/about/">
                        <i class="las la-envelope"></i>
                        <span>Correo electrónico</span>
                    </a>
                </li>
            </ul>
        </nav>
    <div class="linea"></div>
    </div>
    <main>
    <header>
        <div class="header">
            <div class="titulo">
                <h1>ROYAL COFFEE CREAM</h1>
            </div>
		    	<div  class="nombre"></div>
        </div>
	</header>
<div class="contenido">
    <div id="inicio"></div>
        <div class="caja-cuadros">
            <div class="cuadros-img">
                <img src="../IMGS/IMG-1.jpg" width="230px">
            </div>
            <div class="cuadros-img">
                <img src="../IMGS/IMG-2.jpg" width="230px">
            </div>
            <div class="cuadros-img">
                <img src="../IMGS/IMG-3.jpg" width="230px">
            </div>
            <div class="cuadros-img">
                <img src="../IMGS/IMG-4.jpg" width="230px">
            </div>
    </div>
    <div class="contenedor">
        <h3>Estas son las opciones diseñadas para ti “usuario administrador”, aquí podrás navegar gracias a la barra de navegación para ver los registros de clientes, empleados y productos. </h3><br>
        <h3></h3>
    <?php
    include_once('../PHP/Crud_.php');
      $crud = new Crud_();
      $statement = $crud->verClientes();
      $res = $statement->rowCount();
    ?>  
    </div>
    <div id="clientes"></div>
        <div class="contenedor">
            <br><h1 align="center">CLIENTES</h1>
            <form action="../Crud_Admin/EliminarCliente.php" method="post">
                <table border="1">
                <tr style="background-color: lawngreen;">
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Matricula</th>
                    <th>Contraseña</th>
                    <th>Número de teléfono</th>
                    <th></th>
                </tr>
                <?php
                echo "<br>Buscando....";
                echo "<br>Total de registros : $res";
                if ($res > 0) {
                    $resultset= $statement->fetchAll(PDO::FETCH_OBJ);
                    foreach ($resultset as $cliente){
                    echo "
                    <tr>
                    <th>".$cliente->id_cliente."</th>
                    <th>".$cliente->nombre."</th>
                    <th>".$cliente->apellidopat."</th>
                    <th>".$cliente->usuario."</th>
                    <th>".$cliente->contra."</th>
                    <th>".$cliente->celular."</th>
                    <th style='background-color: rgb(255, 67, 67);'><a href='../Crud_Admin/EliminarCliente.php? num=$cliente->id_cliente'><i class='las la-trash-alt'></i></a></th>
                    </tr>";
                    }
                } else {
                    echo "
                    <tr>
                    <th colspan='7'>
                        <marquee behavior=''direction=''>No hay registros</marquee>
                    </th>
                </tr>";
                }
                ?>
                </table>
            </form>
            
            <div id="divi">
                <div class="cont">
                <div class="formulario">
                <h1 align="center">AGREGAR CLIENTE</h1><br>
                    <form action="../Crud_Admin/AgregarClientes.php" method="post">
                        <label>Nombre: </label>
                        <input type="text" placeholder="Nombre" name="nombre" pattern="[A-Za-zÀ-ÿ\s]+" required>
                        <label>Apellidos:</label>
                        <input type="text" placeholder="Apellidos" name="apellidoPat" pattern="[A-Za-zÀ-ÿ\s]+" required>
                        <label>Matrícula: </label>
                        <input type="number" placeholder="Matrícula" name="usuario" min="1" required>
                        <label>Contraseña: </label>
                        <input type="password" placeholder="Contraseña" name="contra" required>
                        <label>Número de teléfono: </label>
                        <input type="number" placeholder="Número de teléfono" name="celular" required>
                        <input type="submit" value="Enviar">
                        <input type="reset" value="Limpiar">
                    </form>
                        <h3>
                            <a href="./Admin.html">Regresar</a>
                        </h3>
                  </div>
                </div>
            </div>
        </div>
        
        
    <?php
        $crud_e = new Crud_();
        $statement = $crud_e->verEmpleados();
        $resultE = $statement->rowCount();
    ?>
    <div id="empleados"></div>
        <div class="contenedor">
            <br><h1 align="center">EMPLEADOS</h1>
                <form action="../Crud_Admin/EliminarEmpleado.php" method="post">
                    <table border="1">
                        <tr  style="background-color: lawngreen;">
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Apellido paterno</th>
                            <th>Apellido materno</th>
                            <th>Correo</th>
                            <th>Celular</th>
                            <th>Contraseña</th>
                            <th>Id de administrador</th>
                            <th colspan="2"></th>
                            <th style="background-color: red;"></th>
                        </tr>
    <?php
        echo "<br>Buscando....";
        echo "<br>Total de registros : $resultE";
        if ($resultE > 0) {
        $resultset= $statement->fetchAll(PDO::FETCH_OBJ);
        foreach ($resultset as $empleado){
           echo "
           <tr>
                <th>".$empleado->id_empleado."</th>
                <th>".$empleado->nom_empleado."</th>
                <th>".$empleado->apat_empleado."</th>
                <th>".$empleado->amat_empleado."</th>
                <th>".$empleado->correo_empleado."</th>
                <th>".$empleado->telefono_empleado."</th>
                <th>".$empleado->contrasenia_empleado."</th>
                <th>".$empleado->id_admin."</th>
                <th><a href='../Crud_Admin/FormularioActEmpleado.php? id=".$empleado->id_empleado."'>Actualizar</a></th>
                <th style='background-color: rgb(255, 67, 67);'><a href='../Crud_Admin/EliminarEmpleado.php? num2=".$empleado->id_empleado."'><i class='las la-trash-alt'></i></a></th>
            </tr>";
                    }
                } else {
                    echo "
                    <tr>
                    <th colspan='10'>
                        <marquee behavior=''direction=''>No hay registros</marquee>
                    </th>
                </tr>";
                } 
                ?>
                </table>
            </form>
        
            <div  id="divi">
            <div class="cont">
            <div class="formulario">
                <h1 align="center">AGREGAR EMPLEADO</h1><br>
                    <form action="../Crud_Admin/AgregarEmpleado.php" method="post">
                        <label>Id del empleado: </label>
                        <input type="number" placeholder="Id del empleado" name="id_empleado" min="1" required>
                        <label>Id del administrador: </label>
                        <input type="number" placeholder="Id del administrador" name="id_admin" min="1" required>
                        <label>Nombre: </label>
                        <input type="text" placeholder="Nombre" name="nom_empleado" pattern="[A-Za-zÀ-ÿ\s]+" required>
                        <label>Apellido paterno:</label>
                        <input type="text" placeholder="Apellido paterno" pattern="[A-Za-zÀ-ÿ\s]+" name="apat_empleado" required> 
                        <label>Apellido materno: </label>
                        <input type="text" placeholder="Apellido materno" pattern="[A-Za-zÀ-ÿ\s]+" name="amat_empleado" required>
                        <label>Correo electrónico: </label>
                        <input type="email" placeholder="Correo electrónico" name="correo_empleado" required>
                        <label>Número de teléfono: </label>
                        <input type="number" placeholder="Número de teléfono" name="telefono_empleado" required>    
                        <label>Contraseña: </label>
                        <input type="password" placeholder="Contraseña" name="contrasenia_empleado" required>
                        <input type="submit" value="Enviar">
                        <input type="reset" value="Limpiar">
                    </form>
                <h3>
                   <a href="./Admin.html">Regresar</a>
                </h3>
            </div>
            </div>
            </div>
        </div>
    <?php
            $crud_p = new Crud_();
            $statement = $crud_p->verProductos();
            $resultP = $statement->rowCount();
    ?>
    <div id="productos"></div>
        <div class="contenedor">
            <br><h1 align="center">PRODUCTOS</h1>
                <form action="../Crud_Admin/EliminarProductos.php" method="post">
                    <table border="1">
                        <tr  style="background-color: lawngreen;">
                           <th>Id</th>
                           <th>Nombre</th>
                           <th>Precio</th>
                           <th>Descripción</th>
                           <th>Existencias</th>
                           <th></th>
                        </tr>
                    <?php
                    echo "<br>Buscando....";
                    echo "<br>Total de registros : $resultP";
                    if ($resultP > 0) {
                    $resultset= $statement->fetchAll(PDO::FETCH_OBJ);
                        foreach ($resultset as $producto){
                            echo "
                                <tr>
                                    <th>".$producto->id_producto."</th>
                                    <th>".$producto->nom_producto."</th>
                                    <th>".$producto->precio."</th>
                                    <th>".$producto->descripcion_pro."</th>
                                    <th>".$producto->stock."</th>
                                    <th style='background-color: rgb(255, 67, 67);'><a href='../Crud_Admin/EliminarProductos.php? num3=$producto->id_producto'><i class='las la-trash-alt'></i></a></th>
                                </tr>";
                                }
                            } else {
                            echo "
                            <tr>
                              <th colspan='6'>
                              <marquee behavior=''direction=''>No hay registros</marquee>
                            </th>
                            </tr>";
                        }
                        ?>
                   </table>
                </form>
            <div id="divi">
            <div class="cont">
            <div class="formulario">
                <h1 align="center">AGREGAR PRODUCTOS</h1>
                    <form action="../Crud_Admin/AgregarProducto.php" method="post" required>
                        <label>Id del producto: </label>
                        <input type="number" placeholder="Id del producto" name="id_producto" min="1" required>
                        <label>Nombre del producto: </label>
                        <input type="text" placeholder="Nombre del producto" name="nom_producto" pattern="[A-Za-zÀ-ÿ\s]+" required>
                        <label>Precio $:</label>
                        <input type="number" placeholder="Precio" name="precio" min="0" step="any" required> 
                        <label>Descripción: </label>
                        <input type="text" placeholder="Descripción" name="descripcion_pro" required>
                        <label>Existencias: </label>
                        <input type="number" placeholder="Existencias" name="stock" min="0" required>
                        <input type="submit" value="Enviar">
                        <input type="reset" value="Limpiar">
                    </form>
                <h3>
                    <a href="./Admin.html">Regresar</a>
                </h3>
            </div>
            </div>
        </div>
    </div>
    <div id="reporte"></div>
    <div class="contenedor">
        <br><h1 align="center">REPORTE AUTOGENERADO</h1><br>
        <?php
            $statement = $crud->fecha_reporte();
            $resultset= $statement->fetch(PDO::FETCH_OBJ);
            echo "<h3>Fecha de la generación del reporte : ".$resultset->fecha_r."</h3>";
            echo "<h3>Periodo cubierto del 28 al 31 de julio de 2024<br><br>";

            $crud_r = new Crud_();
            $statement = $crud_r->verCompras();
            $resultR = $statement->rowCount();
        ?>
         <table border="1">
            <tr  style="background-color: lawngreen;">
                 <th>id_compra</th>
                 <th>id_cliente</th>
                 <th>Total</th>
                 <th>Cantidad</th>
                 <th>Descripción</th>
             </tr>
               <?php
               echo "<br><h2>RESUMEN</h2><br>
                    <br>Total de compras realizadas por los usuarios : $resultR";
               if ($resultR > 0) {
               $resultset= $statement->fetchAll(PDO::FETCH_OBJ);
                 foreach ($resultset as $compra){
                     echo "
                        <tr>
                            <th>".$compra->id_compra."</th>
                            <th>".$compra->id_cliente."</th>
                            <th>".$compra->total."</th>
                            <th>".$compra->cantidad."</th>
                            <th>".$compra->descripcion."</th>
                            </tr>";
                           }
                     } else {
                            echo "
                            <tr>
                              <th colspan='5'>
                              <marquee behavior=''direction=''>No hay registros</marquee>
                            </th>
                        </tr>";
                    }
                ?>
            </table><br><br>
    <?php
        $crud = new Crud_();


            $statement = $crud->ganancias();
            $resultset= $statement->fetch(PDO::FETCH_OBJ);
            echo "<h3>Ganancias : ".$resultset->total_ganancias."</h3>";

            $statement = $crud->producto_masV();
            $result = $statement->rowCount();
            if ($result > 0) {
            $resultset= $statement->fetch(PDO::FETCH_OBJ);
            echo "<h3 style='color: red;'>Producto más vendido : ".$resultset->nom_producto."</h3>";
            }else{
            echo "<br><h3>Producto más vendido :</h3>";
            echo "<h3>No hay registros</h3><br>";
            }

            $statement = $crud->producto_menosV();
            $result = $statement->rowCount();
            if ($result > 0) {
            $resultset= $statement->fetch(PDO::FETCH_OBJ);
            echo "<h3>Producto menos vendido : ".$resultset->nom_producto."</h3>";
            }else{
            echo "<h3>Producto menos vendido :</h3>";
            echo "<h3>No hay registros</h3><br>";
            }  

            $statement = $crud->masCaro();
            $result = $statement->rowCount();
            if ($result > 0) {
            $resultset= $statement->fetch(PDO::FETCH_OBJ);
            echo "<br><h3>Producto más caro :<br>";
            echo "<h3>Nombre : ".$resultset->nom_producto."</h3>";
            echo "<h3>Precio : ".$resultset->precio."</h3>";
            }else{
            echo "<h3>Producto más caro :</h3>";
            echo "<h3>No hay registros</h3><br>";
            }
            $statement = $crud->masBarato();
            $result = $statement->rowCount();
            if ($result > 0) {
            $resultset= $statement->fetch(PDO::FETCH_OBJ);
            echo "<br><h3>Producto más barato :<br>";
            echo "<h3>Nombre : ".$resultset->nom_producto."</h3>";
            echo "<h3>Precio : ".$resultset->precio."</h3>";
            }else{
            echo "<h3>Producto más barato :</h3>";
            echo "<h3>No hay registros</h3><br>";
            }

            echo  "<br><h2>RESUMEN GENERAL</h2><br>";
            $statement = $crud->CantidadP_inventario();
            $resultset= $statement->fetch(PDO::FETCH_OBJ);
            echo "<h3>Total de productos en inventario : ".$resultset->inventario."</h3>";

            $statement = $crud->TotalProductos();
            $resultset= $statement->fetch(PDO::FETCH_OBJ);
            echo "<h3>Total de productos registrados : ".$resultset->total_productos."</h3>";

            $statement = $crud->TotalEmpleados();
            $resultset= $statement->fetch(PDO::FETCH_OBJ);
            echo "<h3>Total de empleados trabajando : ".$resultset->total_empleados."</h3>";

            $statement = $crud->TotalClientes();
            $resultset= $statement->fetch(PDO::FETCH_OBJ);
            echo "<h3>Alcance : ".$resultset->total_clientes." usuarios registrados</h3><br><br>";

        ?>
        </div>
</div>
</main>
    <script src="./ScripAdmin.js"></script>
</body>
</html>