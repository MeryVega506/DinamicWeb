<?php
require '../config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Eliminar la tarea
    $sql = "DELETE FROM tasks WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "ID de tarea no especificado.";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Tarea</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <header>
        <h1>Eliminar Tarea</h1>
    </header>
    <main>
        <div class="delete-confirmation">
            <p>¿Estás seguro de que deseas eliminar esta tarea?</p>
            <form method="GET" action="delete.php">
                <input type="hidden" name="id" value="<?= htmlspecialchars($_GET['id'] ?? '') ?>">
                <button type="submit" class="btn-danger">Eliminar</button>
                <a href="index.php" class="btn-secondary">Cancelar</a>
            </form>
        </div>
    </main>
</body>
</html>
