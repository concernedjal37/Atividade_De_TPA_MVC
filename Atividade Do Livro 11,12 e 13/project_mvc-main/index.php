<?php

include_once 'config/database.php';
include_once 'controllers/UserController.php';
include_once 'controllers/TaskController.php';

$database = new Database();
$db = $database->getConnection();

$userController = new UserController($db);
$TaskController = new TaskController($db);

// Obter a ação e o ID (se aplicável) dos parâmetros da URL
$action = isset($_GET['action']) ? $_GET['action'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : null;
$taskid = isset($_GET['idtask']) ? $_GET['idtask'] : null;

// Determinar a ação do usuário
switch ($action) {
    case 'create_user':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $message = $userController->create($name, $email);
            echo $message;
            echo '<a href="index.php?action=users">Back to User List</a>';
        } else {
            include 'views/user/create.php';
        }
        break;

    case 'read_user':
        if ($id) {
            $user = $userController->readOne($id);
            if (is_array($user)) {
                include 'views/user/show.php';
            } else {
                echo $user; // Exibir mensagem de erro
            }
        } else {
            echo 'User ID is required.';
        }
        break;

    case 'update_user':
        if ($id) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $message = $userController->update($id, $name, $email);
                echo $message;
                echo '<a href="index.php?action=users">Back to User List</a>';
            } else {
                $user = $userController->readOne($id);
                include 'views/user/update.php';
            }
        } else {
            echo 'User ID is required.';
        }
        break;

    case 'delete_user':
        if ($id) {
            $message = $userController->delete($id);
            echo $message;
            echo '<a href="index.php?action=users">Back to User List</a>';
        } else {
            echo 'User ID is required.';
        }
        break;

    case 'create_task':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $task = $_POST['task'];
            $prazo = $_POST['prazo'];
            $message = $TaskController->create($task, $prazo);
            echo $message;
            echo '<a href="index.php?action=tasks">Back to tasks List</a>';
        } else {
            include 'views/task/CreateT.php';
        }
        break;

    case 'read_task':
        if ($taskid) {
            $tasks = $TaskController->readOne($taskid);
        if (is_array($tasks)) {
            include 'views/task/ShowT.php';
        } else {
            echo $tasks; // Exibir mensagem de erro
        }
        } else {
            echo 'Task ID is required.';
        }
        break;

    case 'update_task':
        if ($taskid) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $task = $_POST['Task'];
            $prazo = $_POST['prazo'];
            
            $message = $TaskController->update($taskid, $task, $prazo);
            echo $message;
            echo '<a href="index.php?action=tasks">Back to Task List</a>'; 
            } else {
                $task = $TaskController->readOne($taskid);
                include 'views/task/UpdateT.php';
            }
        } else {
            echo 'Task ID is required.';
        }
        break;

    case 'delete_task':
        if ($taskid) {
            $message = $TaskController->delete($taskid);
            echo $message;
            echo '<a href="index.php?action=tasks">Back to Task List</a>';
        } else {
            echo 'Task ID is required.';
        }
        break;

        case 'users':
            $users = $userController->index();
            include 'views/user/index.php';
        break;

        case 'tasks':
            $tasks = $TaskController->readAll();
            include 'views/task/index.php';
        break;

    default:
        include 'views/Home.php';        
        break;
}
?>
