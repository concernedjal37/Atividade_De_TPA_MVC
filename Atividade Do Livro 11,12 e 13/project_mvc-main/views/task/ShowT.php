<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes da tarefa</title>
</head>
<body>
    <h1>Detalhes da tarefa</h1>
    <p><strong>ID:</strong> <?php echo htmlspecialchars($tasks['idtask'], ENT_QUOTES, 'UTF-8'); ?></p>
    <p><strong>Tarefa:</strong> <?php echo htmlspecialchars($tasks['task'], ENT_QUOTES, 'UTF-8'); ?></p>
    <p><strong>Prazo:</strong> <?php echo htmlspecialchars($tasks['prazo'], ENT_QUOTES, 'UTF-8'); ?></p>
    <a href="index.php?action=tasks">Voltar para lista de tarefas</a>
</body>
</html>