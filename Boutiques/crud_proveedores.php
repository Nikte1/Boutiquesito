<?php
include 'sesion.php';
include 'db.php';

// Insertar Proveedor
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['insertar'])) {
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];

    $sql = "INSERT INTO proveedores (nombre, telefono, direccion) VALUES ('$nombre', '$telefono', '$direccion')";

    if ($conn->query($sql) === TRUE) {
        echo "Nuevo proveedor registrado exitosamente<br>";
    } else {
        echo "Error: " . $conn->error . "<br>";
    }
}

// Eliminar Proveedores
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['eliminar'])) {
    if (!empty($_POST['proveedores'])) {
        $proveedores_a_eliminar = implode(",", $_POST['proveedores']);

        $sql_delete = "DELETE FROM proveedores WHERE id IN ($proveedores_a_eliminar)";
        if ($conn->query($sql_delete) === TRUE) {
            echo "Proveedores eliminados exitosamente.<br>";
        } else {
            echo "Error al eliminar proveedores: " . $conn->error . "<br>";
        }
    } else {
        echo "No se seleccionó ningún proveedor para eliminar.<br>";
    }
}

// Mostrar Proveedores
$sql = "SELECT * FROM proveedores";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Proveedores</title>
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

        input[type="text"] {
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

    <h1>Gestionar Proveedores</h1>
    
    <h2>Insertar Nuevo Proveedor</h2>
    <form method="post" action="">
        <label>Nombre:</label><input type="text" name="nombre" required><br>
        <label>Teléfono:</label><input type="text" name="telefono" required><br>
        <label>Dirección:</label><input type="text" name="direccion" required><br>
        <input type="submit" name="insertar" value="Insertar" class="boton-actualizar">
    </form>

    <h2>Proveedores Registrados</h2>
    <form method="post" action="">
        <table>
            <tr>
                <th>Seleccionar</th>
                <th>ID</th>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Dirección</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td><input type='checkbox' name='proveedores[]' value='" . $row["id"] . "'></td>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["nombre"] . "</td>";
                    echo "<td>" . $row["telefono"] . "</td>";
                    echo "<td>" . $row["direccion"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No hay proveedores registrados</td></tr>";
            }
            ?>
        </table>
        <br>
        <input type="submit" name="eliminar" value="Eliminar Proveedores" class="boton-actualizar">
    </form>

</body>
</html>

<?php
$conn->close();
?>
