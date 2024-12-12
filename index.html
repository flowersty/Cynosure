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

if (isset($_GET['tabla'])) {
    $tablaSeleccionada = $_GET['tabla'];

    // Verificar si la tabla existe
    if (!array_key_exists($tablaSeleccionada, $tablas)) {
        header("Location: index.php");
        exit();
    }

    try {
        $stmt = $pdo->query("SELECT * FROM $tablaSeleccionada");
        $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error al obtener los datos: " . $e->getMessage();
        $datos = null;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tablas</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h2>Selecciona una tabla:</h2>
    <ul>
        <?php foreach ($tablas as $tabla => $clavePrimaria): ?>
            <li>
                <a href="?tabla=<?php echo $tabla; ?>">
                    <?php echo ucfirst($tabla); ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>

    <!-- Formulario para crear registros -->
    <h3>Crear nuevo registro</h3>
    <form method="GET" action="create.php">
        <label for="tabla">Selecciona una tabla para crear un registro:</label>
        <select name="tabla" id="tabla">
            <?php foreach ($tablas as $tabla => $clavePrimaria): ?>
                <option value="<?php echo $tabla; ?>"><?php echo ucfirst($tabla); ?></option>
            <?php endforeach; ?>
        </select>
        <input type="submit" value="Crear Registro">
    </form>

    <?php if (isset($datos)): ?>
        <h3>Tabla seleccionada: <?php echo ucfirst($tablaSeleccionada); ?></h3>
        <table>
            <thead>
                <tr>
                    <?php
                    if (!empty($datos)) {
                        foreach (array_keys($datos[0]) as $columna) {
                            echo "<th>" . htmlspecialchars($columna) . "</th>"; // Evitar XSS
                        }
                        echo "<th>Acciones</th>";
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($datos as $fila): ?>
                    <tr>
                        <?php foreach ($fila as $valor): ?>
                            <td><?php echo htmlspecialchars($valor); ?></td>
                        <?php endforeach; ?>
                        <td>
                            <a href="actualizar.php?tabla=<?php echo $tablaSeleccionada; ?>&id=<?php echo $fila[$tablas[$tablaSeleccionada]]; ?>">Editar</a> |
                            <a href="borrar.php?tabla=<?php echo $tablaSeleccionada; ?>&id=<?php echo $fila[$tablas[$tablaSeleccionada]]; ?>" onclick="return confirm('¿Estás seguro de que quieres eliminar este registro?')">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>
