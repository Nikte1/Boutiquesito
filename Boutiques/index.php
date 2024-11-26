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
        /* Estilos generales */
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

        /* Contenedor principal */
        .container {
            display: flex;
            margin: 20px;
        }

        /* Filtros */
        .filters {
            width: 25%;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .filters h3 {
            font-size: 1.5em;
            color: #d89e6e;
            margin-bottom: 15px;
        }

        /* Estilo de colores */
        .color-options {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .color-item {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .color-circle {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            border: 1px solid #ccc;
        }

        .color-circle.azul { background: blue; }
        .color-circle.verde { background: green; }
        .color-circle.marron { background: brown; }
        .color-circle.multicolor { background: linear-gradient(45deg, red, yellow, blue); }
        .color-circle.gris { background: gray; }
        .color-circle.morado { background: purple; }
        .color-circle.rojo { background: red; }
        .color-circle.naranja { background: orange; }
        .color-circle.rosa { background: pink; }
        .color-circle.amarillo { background: yellow; }
        .color-circle.blanco { background: white; border: 1px solid black; }

        /* Estilo de tallas */
        .size-options {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 15px;
        }

        .size-item {
            flex: 1 0 30%; /* 3 elementos por fila */
            text-align: center;
            padding: 10px;
            background: #fff5e1;
            border: 2px solid #d89e6e;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s, color 0.3s;
        }

        .size-item:hover {
            background: #d89e6e;
            color: white;
        }

        /* Galería de imágenes */
        .image-section {
            width: 75%;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        .image-item {
            text-align: center;
        }

        .image-item img {
            width: 200px;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .image-item p {
            margin-top: 10px;
            font-size: 1.2em;
            color: #5a4d3b;
        }
    </style>
</head>
<body>
    <h2>Panel de Administración - Boutique</h2>
    <nav>
        <ul>
            <li><a href="crud_clientes.php">Clientes</a></li>
            <li><a href="crud_inventarios.php">Inventarios</a></li>
            <li><a href="crud_proveedores.php">Proveedores</a></li>
            <li><a href="crud_pedidos.php">Pedidos</a></li>
            <li><a href="crud_ventas.php">Ventas</a></li>
            <li><a href="logout.php">Cerrar Sesión</a></li>
        </ul>
    </nav>

    <div class="container">
        <!-- Filtros -->
        <aside class="filters">
            <h3>Colores</h3>
            <div class="color-options">
                <div class="color-item">
                    <div class="color-circle azul"></div> Azul
                </div>
                <div class="color-item">
                    <div class="color-circle verde"></div> Verde
                </div>
                <div class="color-item">
                    <div class="color-circle marron"></div> Marrón
                </div>
                <div class="color-item">
                    <div class="color-circle multicolor"></div> Multicolor
                </div>
                <div class="color-item">
                    <div class="color-circle gris"></div> Gris
                </div>
                <div class="color-item">
                    <div class="color-circle morado"></div> Morado
                </div>
                <div class="color-item">
                    <div class="color-circle rojo"></div> Rojo
                </div>
                <div class="color-item">
                    <div class="color-circle naranja"></div> Naranja
                </div>
                <div class="color-item">
                    <div class="color-circle rosa"></div> Rosa
                </div>
                <div class="color-item">
                    <div class="color-circle amarillo"></div> Amarillo
                </div>
                <div class="color-item">
                    <div class="color-circle blanco"></div> Blanco
                </div>
            </div>

            <h3>Tallas</h3>
            <div class="size-options">
                <div class="size-item">XXS</div>
                <div class="size-item">XS</div>
                <div class="size-item">S</div>
                <div class="size-item">M</div>
                <div class="size-item">L</div>
                <div class="size-item">XL</div>
                <div class="size-item">1X</div>
                <div class="size-item">2X</div>
                <div class="size-item">3X</div>
                <div class="size-item">4X</div>
                <div class="size-item">One Size</div>
            </div>
        </aside>

        <!-- Galería de imágenes -->
        <section class="image-section">
    <div class="image-item">
        <img src="https://i.pinimg.com/736x/37/a7/3e/37a73e5cfd0dd14a4f7958abb244f7b1.jpg" alt="Calcetines">
        <p>Calcetines</p>
    </div>
    <div class="image-item">
        <img src="https://i.pinimg.com/736x/79/95/6b/79956be203f7753caf8d54bbcf0c3a3c.jpg" alt="Playeras">
        <p>Playeras</p>
    </div>
    <div class="image-item">
        <img src="https://i.pinimg.com/736x/27/90/3b/27903ba59193c78c194d97191d1fce3a.jpg" alt="Leggins">
        <p>Leggins</p>
    </div>
    <div class="image-item">
        <img src="https://i.pinimg.com/736x/f6/ea/2f/f6ea2ffae649dfb09c67a0f4561a7ab8.jpg" alt="Botas">
        <p>Botas</p>
    </div>
    <!-- Fila para cardigans -->
    <div class="image-item">
        <img src="https://i.pinimg.com/736x/b7/10/a4/b710a4e9813c4c8d9f02ee6f7559acf4.jpg" alt="Cardigans">
        <p>Cardigans</p>
    </div>
    <!-- Fila para jumpsuits -->
    <div class="image-item">
        <img src="https://i.pinimg.com/736x/2d/13/38/2d1338901223619cf408d6e5f83330e5.jpg" alt="Jumpsuits">
        <p>Jumpsuits</p>
    </div>
    <!-- Nueva fila para Curvy -->
    <div class="image-item">
        <img src="https://i.pinimg.com/736x/ff/8a/bf/ff8abf970421c5aff222e4c8983edaa8.jpg" alt="Curvy">
        <p>Curvy</p>
    </div>
    <!-- Nueva fila para Accesorios -->
    <div class="image-item">
        <img src="https://i.pinimg.com/736x/76/0e/45/760e45e05bf0e09f90fa2863fc851bc3.jpg" alt="Accesorios">
        <p>Accesorios</p>
    </div>
    <!-- Nueva fila para Faldas -->
    <div class="image-item">
        <img src="https://i.pinimg.com/736x/de/e1/dd/dee1dda485271bb15c79b686dd4e52b9.jpg" alt="Faldas">
        <p>Faldas</p>
    </div>
    <!-- Nueva fila para Cargo -->
    <div class="image-item">
        <img src="https://i.pinimg.com/736x/08/1f/cf/081fcf100deb8c341510b150d16a7f4f.jpg" alt="Cargo">
        <p>Cargo</p>
    </div>
</section>
