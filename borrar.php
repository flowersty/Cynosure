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

    try {
        $stmt = $pdo->prepare("DELETE FROM $tablaSeleccionada WHERE $llavePrimaria = ?");
        $stmt->execute([$id]);
        header("Location: index.php?tabla=$tablaSeleccionada&mensaje=Registro eliminado con éxito");
        exit();
    } catch (PDOException $e) {
        header("Location: index.php?tabla=$tablaSeleccionada&mensaje=Error al eliminar el registro: " . $e->getMessage());
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}
?>
