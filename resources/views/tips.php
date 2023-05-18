<!DOCTYPE html>
<html>
<head>
    <title>Tips para Becas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            background-color: #2d9cdb;
            color: #ffffff;
            padding: 20px;
            text-align: center;
        }

        .header h1 {
            margin: 0;
        }

        .tips-form {
            background-color: #ffffff;
            padding: 20px;
            margin-top: 20px;
        }

        .tips-form label {
            font-weight: bold;
        }

        .tips-form input[type="text"],
        .tips-form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
        }

        .tips-form input[type="submit"] {
            background-color: #2d9cdb;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }

        .comments {
            margin-top: 20px;
        }

        .comment {
            background-color: #ffffff;
            padding: 20px;
            margin-bottom: 20px;
        }

        .comment h3 {
            margin: 0;
            color: #2d9cdb;
        }

        .comment p {
            margin-top: 10px;
        }

        .comment .reactions {
            margin-top: 10px;
            color: #888888;
        }

        .comment .reactions button {
            background-color: transparent;
            border: none;
            cursor: pointer;
            margin-right: 10px;
        }

        .comment .reactions .like {
            color: #2d9cdb;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Tips para Becas</h1>
        </div>

        <div class="tips-form">
            <?php
            // Establecer conexión con la base de datos
            $conn = new mysqli('localhost', 'root', '', 'becas');
            if ($conn->connect_error) {
                die("Error de conexión: " . $conn->connect_error);
            }

            // Procesar el formulario de envío de tip
            if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['nombre']) && isset($_GET['tip'])) {
                $nombre = $_GET['nombre'];
                $tip = $_GET['tip'];

                // Insertar el tip en la base de datos
                $insertQuery = "INSERT INTO tips (nombre, tip) VALUES ('$nombre', '$tip')";
                if ($conn->query($insertQuery) === TRUE) {
                    echo "El tip se ha guardado correctamente.";
                } else {
                    echo "Error al guardar el tip: " . $conn->error;
                }
            }
            ?>

            <form method="GET" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" required><br>

                <label for="tip">Tip:</label>
                <textarea name="tip" required></textarea><br>
                <input type="submit" value="Enviar Tip">
        </form>
    </div>

    <div class="comments">
        <?php
        // Obtener los comentarios de la base de datos
        $selectQuery = "SELECT * FROM tips ORDER BY id DESC";
        $result = $conn->query($selectQuery);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $tipId = $row['id'];
                $nombre = $row['nombre'];
                $tip = $row['tip'];

                // Obtener las reacciones del tip
                $reactionsQuery = "SELECT * FROM reactions WHERE tip_id = $tipId";
                $reactionsResult = $conn->query($reactionsQuery);
                $reactionsCount = $reactionsResult->num_rows;
                ?>

                <div class="comment">
                    <h3><?php echo $nombre; ?></h3>
                    <p><?php echo $tip; ?></p>
                    <div class="reactions">
                        <button class="like"><?php echo $reactionsCount; ?> Me gusta</button>
                        <!-- Agrega más botones de reacción según tus necesidades -->
                    </div>
                </div>

                <?php
            }
        } else {
            echo "No hay comentarios.";
        }

        // Cerrar la conexión
        $conn->close();
        ?>
    </div>
</div>