<?php
include 'sesion.php'; // Manejo de sesión
include 'db.php'; // Conexión a la base de datos

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
        }

        .inventario-title {
            text-align: center;
            margin-bottom: 20px;
            font-size: 2.5rem;
            color: #333;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .product {
            background: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 10px;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .product img {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .product h3 {
            font-size: 1.2rem;
            margin: 10px 0;
            color: #333;
        }

        .product p {
            color: #666;
            font-size: 1rem;
            margin: 5px 0;
        }

        .product .price {
            color: #e74c3c;
            font-weight: bold;
            font-size: 1.2rem;
        }

        .product .discount {
            text-decoration: line-through;
            color: #999;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="inventario-title">Inventario</h1>
        <div class="grid">
            <?php
            if ($result->num_rows > 0) {
                // Mostrar productos del inventario
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='product'>";
                    echo "<img src='" . $row['imagen_url'] . "' alt='" . $row['nombre'] . "'>";
                    echo "<h3>" . $row['nombre'] . "</h3>";
                    echo "<p><span class='price'>$" . $row['precio'] . "</span> <span class='discount'>$" . $row['precio_anterior'] . "</span></p>";
                    echo "</div>";
                }
            } else {
                echo "<p>No hay productos en el inventario.</p>";
            }
            ?>
        </div>
    </div>
</body>
</html>

<?php
$conn->close();
?>
