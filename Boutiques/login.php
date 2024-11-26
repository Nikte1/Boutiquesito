<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Boutique</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: #f5f1e1; /* Color arenoso para el fondo */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #5a4d3b; /* Color de texto marrón oscuro */
        }
        .container {
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 350px;
            text-align: center;
        }
        h2 {
            margin-bottom: 20px;
            font-size: 2em;
            color: #d89e6e; /* Color dorado suave */
        }
        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
            font-size: 1.1em;
            color: #5a4d3b;
        }
        input[type="text"],
        input[type="password"],
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 20px;
            font-size: 1em;
            color: #5a4d3b;
            box-sizing: border-box;
            background: #f9f5e3; /* Color de fondo de los campos de entrada */
        }
        input[type="submit"] {
            background: #d89e6e; /* Color del botón */
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1.1em;
            width: 100%;
            transition: background 0.3s;
        }
        input[type="submit"]:hover {
            background: #b47c52; /* Color del botón cuando pasa el mouse */
        }
        .error {
            color: #ff3333;
            margin-top: 10px;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Iniciar Sesión - Boutique</h2>
        <form action="login_process.php" method="POST">
            <label for="username">Usuario:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>

            <label for="role">Selecciona tu rol:</label>
            <select id="role" name="role" required>
                <option value="admin">Administrador</option>
                <option value="vendedor">Vendedor</option>
            </select>

            <input type="submit" value="Iniciar Sesión">
        </form>
    </div>

</body>
</html>
