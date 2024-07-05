<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizando Tarefa</title>
</head>
<body>
    <h1>Atualizando Tarefa</h1>
    <form action="index.php?action=update_task&idtask=<?php echo $task['idtask']; ?>" method="post">
        <label for="task">Tarefa:</label>
        <input type="text" id="task" name="Task" value="<?php echo htmlspecialchars($task['task'], ENT_QUOTES, 'UTF-8'); ?>" required>
        <br>
        <label for="prazo">Prazo:</label>
        <input type="text" id="prazo" name="prazo" value="<?php echo htmlspecialchars($task['prazo'], ENT_QUOTES, 'UTF-8'); ?>" required>
        <br>
        <input type="submit" value="Update">
    </form>
    <a href="index.php?action=tasks">Voltar para lista de tarefas</a>
</body>
</html>