<?php
require_once 'db.php';

$tablas = ['Grupos', 'Miembros', 'Albumes', 'Canciones', 'Conciertos', 'Premios', 'Seguidores'];

// Verificar si se ha seleccionado una tabla en la URL (GET)
if (isset($_GET['tabla']) && in_array($_GET['tabla'], $tablas)) {
    $tablaSeleccionada = $_GET['tabla'];
} else {
    die("No se ha seleccionado una tabla válida.");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verificar que el formulario POST tenga el valor 'tabla' y que sea válido
    if (isset($_POST['tabla']) && in_array($_POST['tabla'], $tablas)) {
        $tabla = $_POST['tabla'];

        // Lógica para insertar en la base de datos según la tabla seleccionada
        switch ($tabla) {
            case 'Grupos':
                $nombre_grupo = $_POST['nombre_grupo'];
                $agencia = $_POST['agencia'];
                $anio_debut = $_POST['anio_debut'];
                $activo = $_POST['activo'];

                $stmt = $pdo->prepare("INSERT INTO Grupos (nombre_grupo, agencia, anio_debut, activo) VALUES (?, ?, ?, ?)");
                $stmt->execute([$nombre_grupo, $agencia, $anio_debut, $activo]);
                echo "Nuevo grupo creado con éxito";
                break;
            // Agregar casos similares para las otras tablas...
            // Asegúrate de incluir los casos para Miembros, Albumes, etc.
        }
    } else {
        echo "No se ha seleccionado una tabla válida para insertar el registro.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Registro</title>
</head>
<body>
    <h2>Crear Registro en <?php echo ucfirst($tablaSeleccionada); ?></h2>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?tabla=" . $tablaSeleccionada; ?>">
        <!-- Campo oculto que se asegura de enviar la tabla seleccionada -->
        <input type="hidden" name="tabla" value="<?php echo $tablaSeleccionada; ?>">

        <?php if ($tablaSeleccionada == 'Grupos'): ?>
            <label for="nombre_grupo">Nombre del Grupo:</label><br>
            <input type="text" name="nombre_grupo"><br><br>
            <label for="agencia">Agencia:</label><br>
            <input type="text" name="agencia"><br><br>
            <label for="anio_debut">Año de Debut:</label><br>
            <input type="number" name="anio_debut"><br><br>
            <label for="activo">Activo (1 = Sí, 0 = No):</label><br>
            <input type="number" name="activo"><br><br>
        <?php endif; ?>
        <!-- Aquí agregar los campos de otras tablas según sea necesario -->

        <input type="submit" value="Crear Registro">
    </form>

    <br>

    <!-- Botón para regresar a la página anterior en el navegador -->
    <button onclick="window.history.back()">Regresar</button>

    <!-- O si prefieres un enlace que regrese a una página específica -->
    <!-- <a href="index.php">Volver a la página principal</a> -->
</body>
</html>
