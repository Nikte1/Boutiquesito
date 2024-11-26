<?php
include 'sesion.php';
include 'db.php';

// Insertar Cliente
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['insertar'])) {
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];

    $sql = "INSERT INTO clientes (nombre, telefono, email) VALUES ('$nombre', '$telefono', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "Nuevo cliente registrado exitosamente<br>";
    } else {
        echo "Error: " . $conn->error . "<br>";
    }
}

// Eliminar Clientes
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['eliminar'])) {
    if (!empty($_POST['clientes'])) {
        $clientes_a_eliminar = implode(",", $_POST['clientes']);

        $sql_delete = "DELETE FROM clientes WHERE id IN ($clientes_a_eliminar)";
        if ($conn->query($sql_delete) === TRUE) {
            echo "Clientes eliminados exitosamente.<br>";
        } else {
            echo "Error al eliminar clientes: " . $conn->error . "<br>";
        }
    } else {
        echo "No se seleccionó ningún cliente para eliminar.<br>";
    }
}

// Editar Cliente
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['editar'])) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];

    $sql_update = "UPDATE clientes SET nombre='$nombre', telefono='$telefono', email='$email' WHERE id='$id'";
    
    if ($conn->query($sql_update) === TRUE) {
        echo "Cliente actualizado exitosamente.<br>";
    } else {
        echo "Error: " . $conn->error . "<br>";
    }
}

// Mostrar Clientes
$sql = "SELECT * FROM clientes";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Clientes</title>
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
        input[type="email"] {
            padding: 10px;
            margin: 5px 0 20px 0;
            width: 100%;
            border: 1px solid #d89e6e;
            border-radius: 5px;
        }

        input[type="submit"],
        input[type="button"] {
            background: #d89e6e;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1.1em;
            transition: background 0.3s;
        }

        input[type="submit"]:hover,
        input[type="button"]:hover {
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

        .hidden {
            display: none;
        }
    </style>
</head>
<body>

    <h1>Gestionar Clientes</h1>
    
    <h2>Insertar Nuevo Cliente</h2>
    <form method="post" action="">
        <label>Nombre:</label><input type="text" name="nombre" required><br>
        <label>Teléfono:</label><input type="text" name="telefono" required><br>
        <label>Email:</label><input type="email" name="email" required><br>
        <input type="submit" name="insertar" value="Insertar" class="boton-actualizar">
    </form>

    <h2>Clientes Registrados</h2>
    <form method="post" action="">
        <table>
            <tr>
                <th>Seleccionar</th>
                <th>ID</th>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Email</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td><input type='checkbox' name='clientes[]' value='" . $row["id"] . "' onclick='toggleEditButton(this)'></td>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["nombre"] . "</td>";
                    echo "<td>" . $row["telefono"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No hay clientes registrados</td></tr>";
            }
            ?>
        </table>
        <br>
        <input type="submit" name="eliminar" value="Eliminar Clientes" class="boton-actualizar">
        <input type="button" id="editButton" value="Editar Cliente" onclick="editSelected()" class="boton-actualizar" disabled>
    </form>

    <h2>Editar Cliente</h2>
    <form method="post" action="" id="editForm" class="hidden">
        <input type="hidden" name="id" id="editID" required>
        <label>Nombre:</label><input type="text" name="nombre" id="editNombre" required><br>
        <label>Teléfono:</label><input type="text" name="telefono" id="editTelefono" required><br>
        <label>Email:</label><input type="email" name="email" id="editEmail" required><br>
        <input type="submit" name="editar" value="Actualizar Cliente" class="boton-actualizar">
    </form>

    <script>
        function toggleEditButton(checkbox) {
            const editButton = document.getElementById('editButton');
            editButton.disabled = !document.querySelector('input[name="clientes[]"]:checked');
        }

        function editSelected() {
            const checkboxes = document.querySelectorAll('input[name="clientes[]"]:checked');
            if (checkboxes.length === 1) {
                const row = checkboxes[0].closest('tr');
                document.getElementById('editID').value = row.cells[1].innerText;
                document.getElementById('editNombre').value = row.cells[2].innerText;
                document.getElementById('editTelefono').value = row.cells[3].innerText;
                document.getElementById('editEmail').value = row.cells[4].innerText;
                document.getElementById('editForm').classList.remove('hidden');
            } else {
                alert("Por favor selecciona un solo cliente para editar.");
            }
        }
    </script>

</body>
</html>

<?php
$conn->close();
?>
