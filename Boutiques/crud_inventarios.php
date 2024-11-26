<?php
include 'sesion.php';
include 'db.php';

// Insertar Producto en Inventario
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['insertar'])) {
    $producto = $_POST['producto'];
    $cantidad = $_POST['cantidad'];
    $precio = $_POST['precio'];

    $sql = "INSERT INTO inventarios (producto, cantidad, precio) VALUES ('$producto', '$cantidad', '$precio')";

    if ($conn->query($sql) === TRUE) {
        echo "Producto registrado en el inventario exitosamente<br>";
    } else {
        echo "Error: " . $conn->error . "<br>";
    }
}

// Eliminar Productos de Inventario
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['eliminar'])) {
    if (!empty($_POST['inventarios'])) {
        $productos_a_eliminar = implode(",", $_POST['inventarios']);

        $sql_delete = "DELETE FROM inventarios WHERE id IN ($productos_a_eliminar)";
        if ($conn->query($sql_delete) === TRUE) {
            echo "Productos eliminados exitosamente.<br>";
        } else {
            echo "Error al eliminar productos: " . $conn->error . "<br>";
        }
    } else {
        echo "No se seleccionó ningún producto para eliminar.<br>";
    }
}

// Mostrar Inventario
$sql = "SELECT * FROM inventarios";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Inventario</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: #f5f1e1; /* Color arenoso para el fondo */
            color: #5a4d3b; /* Color marrón oscuro */
            margin: 0;
            padding: 0;
        }

        h1, h2 {
            text-align: center;
            color: #d89e6e; /* Color dorado suave */
            text-transform: uppercase;
        }

        h1 {
            margin-top: 30px;
            font-size: 2.5em;
        }

        h2 {
            margin-top: 20px;
            font-size: 2em;
        }

        form {
            text-align: center;
            margin: 20px auto;
            background: #fff5e1; /* Fondo suave para los formularios */
            padding: 20px;
            border-radius: 8px;
            width: 50%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        label {
            margin: 10px 0;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"] {
            padding: 10px;
            margin: 5px 0 20px 0;
            width: 100%;
            border: 1px solid #d89e6e;
            border-radius: 5px;
        }

        input[type="submit"] {
            background: #d89e6e;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1.1em;
            transition: background 0.3s;
        }

        input[type="submit"]:hover {
            background: #b47c52;
        }

        table {
            width: 80%;
            margin: 30px auto;
            border-collapse: collapse;
            text-align: center;
            background: #fff;
        }

        th, td {
            padding: 15px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2d18f; /* Color de fondo para las cabeceras */
            color: #5a4d3b;
        }

        td {
            background-color: #fef7e6;
        }

        input[type="checkbox"] {
            transform: scale(1.2);
        }

        .boton-actualizar {
            background: #d89e6e;
            padding: 8px 15px;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1.1em;
            cursor: pointer;
        }

        .boton-actualizar:hover {
            background: #b47c52;
        }

    </style>
</head>
<body>

    <h1>Gestionar Inventario</h1>
    
    <h2>Insertar Nuevo Producto</h2>
    <form method="post" action="">
        <label>Producto:</label><input type="text" name="producto" required><br>
        <label>Cantidad:</label><input type="number" name="cantidad" required><br>
        <label>Precio:</label><input type="number" step="0.01" name="precio" required><br>
        <input type="submit" name="insertar" value="Insertar" class="boton-actualizar">
    </form>

    <h2>Productos en Inventario</h2>
    <form method="post" action="">
        <table>
            <tr>
                <th>Seleccionar</th>
                <th>ID</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td><input type='checkbox' name='inventarios[]' value='" . $row["id"] . "'></td>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["producto"] . "</td>";
                    echo "<td>" . $row["cantidad"] . "</td>";
                    echo "<td>" . $row["precio"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No hay productos en inventario</td></tr>";
            }
            ?>
        </table>
        <br>
        <input type="submit" name="eliminar" value="Eliminar Productos" class="boton-actualizar">
    </form>

</body>
</html>

<?php
$conn->close();
?>