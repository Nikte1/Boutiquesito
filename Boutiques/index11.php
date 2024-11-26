<?php
require 'sesion.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Principal - Boutique</title>
    <style>
        /* Estilos del cuerpo */
        body {
            font-family: 'Arial', sans-serif;
            background: #f5f1e1;
            color: #5a4d3b;
            margin: 0;
            padding: 0;
        }
        h2 {
            text-align: center;
            margin: 30px 0;
            font-size: 2.5em;
            color: #d89e6e;
            text-transform: uppercase;
        }
        nav {
            text-align: center;
            background: #fff5e1;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        nav ul {
            list-style-type: none;
            padding: 0;
        }
        nav ul li {
            display: inline-block;
            margin: 0 15px;
        }
        nav ul li a {
            text-decoration: none;
            color: #5a4d3b;
            font-size: 1.2em;
            padding: 10px 20px;
            border: 2px solid #d89e6e;
            border-radius: 5px;
            transition: background 0.3s, color 0.3s;
        }
        nav ul li a:hover {
            background: #d89e6e;
            color: white;
            border-color: #d89e6e;
        }
        nav ul li a:active {
            background: #b47c52;
            border-color: #b47c52;
        }
        #content {
            margin: 20px;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }
        .home-image {
            display: block;
            margin: 0 auto;
            max-width: 100%;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

    <h2>Panel de Administración - Boutique</h2>

    <nav>
        <ul>
            <li><a href="index.php?page=clientes">Clientes</a></li>
            <li><a href="index.php?page=inventarios">Inventarios</a></li>
            <li><a href="index.php?page=proveedores">Proveedores</a></li>
            <li><a href="index.php?page=pedidos">Pedidos</a></li>
            <li><a href="index.php?page=ventas">Ventas</a></li>
            <li><a href="logout.php">Cerrar Sesión</a></li>
        </ul>
    </nav>

    <div id="content">
        <?php
        // Mostrar contenido basado en la página seleccionada
        $page = isset($_GET['page']) ? $_GET['page'] : 'home';

        switch ($page) {
            case 'clientes':
                include 'crud_clientes.php';
                break;
            case 'inventarios':
                include 'crud_inventarios.php';
                break;
            case 'proveedores':
                include 'crud_proveedores.php';
                break;
            case 'pedidos':
                include 'crud_pedidos.php';
                break;
            case 'ventas':
                include 'crud_ventas.php';
                break;
            default:
                echo "<p>Bienvenido al panel de administración de la boutique. Selecciona una opción en el menú para empezar.</p>";
                echo '<img src="https://media.istockphoto.com/id/1409728562/es/foto/interior-de-la-tienda-de-ropa-de-lujo-con-ropa-zapatos-y-accesorios-personales.jpg?s=612x612&w=0&k=20&c=Fi6TYvWt6Mw8-X5bED-9U5Ep-k4x7mv47kuKL3dk6TA=" alt="Interior de la tienda de ropa" class="home-image">';
                break;
        }
        ?>
    </div>

</body>
</html>

