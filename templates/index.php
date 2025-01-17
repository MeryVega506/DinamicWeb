<?php
require '../config.php'; 

// Obtener todas las tareas
$sql = "SELECT * FROM tasks ORDER BY created_at DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de Tareas</title>
    <link rel="stylesheet" href="../css/styles.css"> 
</head>
<body>

    <?php 
    include '../includes/header.php'; 
    ?>

    <main>
        <h1>Lista de Tareas</h1> <!-- Encabezado dentro del contenido -->
        <table>
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if ($result && $result->num_rows > 0): 
                    while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['title']) ?></td>
                        <td><?= htmlspecialchars($row['description']) ?></td>
                        <td>
                            <a href="update_task.php?id=<?= $row['id'] ?>" class="btn-secondary">Editar</a>
                            <a href="delete_task.php?id=<?= $row['id'] ?>" class="btn-danger">Eliminar</a>
                        </td>
                    </tr>
                    <?php 
                    endwhile; 
                else: ?>
                    <tr>
                        <td colspan="3">No hay tareas disponibles.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </main>

    <?php 
    include '../includes/footer.php'; 
    ?>
    
</body>
</html>
