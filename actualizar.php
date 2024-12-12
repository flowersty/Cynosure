<?php
require_once 'db.php';

$tablas = [
    'Grupos' => 'id_grupo',
    'Miembros' => 'id_miembro',
    'Albumes' => 'id_album',
    'Canciones' => 'id_cancion',
    'Conciertos' => 'id_concierto',
    'Premios' => 'id_premio',
    'Seguidores' => 'id_seguidor'
];

if (isset($_GET['tabla']) && isset($_GET['id'])) {
    $tablaSeleccionada = $_GET['tabla'];
    $id = $_GET['id'];

    if (!array_key_exists($tablaSeleccionada, $tablas)) {
        header("Location: index.php");
        exit();
    }

    $llavePrimaria = $tablas[$tablaSeleccionada];

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $campos = [];
        switch ($tablaSeleccionada) {
            case 'Grupos':
                $campos = [
                    'nombre_grupo' => $_POST['nombre_grupo'],
                    'agencia' => $_POST['agencia'],
                    'anio_debut' => $_POST['anio_debut'],
                    'activo' => isset($_POST['activo']) ? 1 : 0,
                ];
                break;
            case 'Miembros':
                $campos = [
                    'nombre_miembro' => $_POST['nombre_miembro'],
                    'fecha_nacimiento' => $_POST['fecha_nacimiento'],
                    'posicion' => $_POST['posicion'],
                    'grupo_id' => $_POST['grupo_id'],
                ];
                break;
        }

        $sql = "UPDATE $tablaSeleccionada SET ";
        $params = [];
        foreach ($campos as $columna => $valor) {
            $sql .= "$columna = ?, ";
            $params[] = $valor;
        }
        $sql = rtrim($sql, ', ');
        $sql .= " WHERE $llavePrimaria = ?";
        $params[] = $id;

        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);

        header("Location: index.php?tabla=$tablaSeleccionada");
        exit();
    } else {
        $stmt = $pdo->prepare("SELECT * FROM $tablaSeleccionada WHERE $llavePrimaria = ?");
        $stmt->execute([$id]);
        $registro = $stmt->fetch(PDO::FETCH_ASSOC);
    }
} else {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Registro</title>
</head>
<body>
    <h2>Editar Registro en <?php echo ucfirst($tablaSeleccionada); ?></h2>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <?php
        switch ($tablaSeleccionada) {
            case 'Grupos':
                ?>
                <label>Nombre del Grupo:</label><br>
                <input type="text" name="nombre_grupo" value="<?php echo $registro['nombre_grupo']; ?>"><br><br>
                <label>Agencia:</label><br>
                <input type="text" name="agencia" value="<?php echo $registro['agencia']; ?>"><br><br>
                <label>Año de Debut:</label><br>
                <input type="number" name="anio_debut" value="<?php echo $registro['anio_debut']; ?>"><br><br>
                <label>Activo:</label><br>
                <input type="checkbox" name="activo" <?php if ($registro['activo']) echo 'checked'; ?>><br><br>
                <?php
                break;
            case 'Miembros':
                ?>
                <label>Nombre del Miembro:</label><br>
                <input type="text" name="nombre_miembro" value="<?php echo $registro['nombre_miembro']; ?>"><br><br>
                <label>Fecha de Nacimiento:</label><br>
                <input type="date" name="fecha_nacimiento" value="<?php echo $registro['fecha_nacimiento']; ?>"><br><br>
                <label>Posición:</label><br>
                <input type="text" name="posicion" value="<?php echo $registro['posicion']; ?>"><br><br>
                <label>ID del Grupo:</label><br>
                <input type="number" name="grupo_id" value="<?php echo $registro['grupo_id']; ?>"><br><br>
                <?php
                break;
        }
        ?>

        <button type="submit">Guardar Cambios</button>
    </form>
</body>
</html>
