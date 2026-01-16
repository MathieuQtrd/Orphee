<?php
require 'inc/init.inc.php';
require 'inc/functions.inc.php';

if (! user_is_connect()) {
    header('location:login.php');
}

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    $data = $pdo->prepare("SELECT * FROM task WHERE id = ?");
    $data->execute([$id]);

    if ($data->rowCount() < 1) {
        header('location:index.php');
    }
} else {
    header('location:index.php');
}

// suppression tâche
if (isset($_POST['delete_task']) && !empty($_POST['task_id']) && is_numeric($_POST['task_id'])) {
    $task_id = $_POST['task_id'];

    $deleteTask = $pdo->prepare("DELETE FROM task WHERE id= ?");
    $deleteTask->execute([$task_id]);
    header('location:index.php');
}

// suppression message
if (!empty($_POST['message_id']) && is_numeric($_POST['message_id'])) {
    $message_id = $_POST['message_id'];

    $deleteComment = $pdo->prepare("DELETE FROM comment WHERE id= ?");
    $deleteComment->execute([$message_id]);
    header('location:http://localhost' . $_SERVER['REQUEST_URI']);
}

// Change status
if (isset($_POST['status']) && !empty($_POST['task_id']) && is_numeric($_POST['task_id'])) {
    $status = trim($_POST['status']);
    $task_id = trim($_POST['task_id']);

    $checkTask = $pdo->prepare("SELECT * FROM task WHERE id= ?");
    $checkTask->execute([$task_id]);

    if ($checkTask->rowCount() > 0) {
        $changeStatus = $pdo->prepare("UPDATE task SET status = ? WHERE id = ?");
        $changeStatus->execute([$status, $task_id]);
        header('location:http://localhost' . $_SERVER['REQUEST_URI']);
    }
}

// get messages
if (isset($_POST['message']) && !empty($_POST['task_id']) && is_numeric($_POST['task_id'])) {

    $message = trim($_POST['message']);
    $task_id = trim($_POST['task_id']);

    $error = false;
    $imageName = '';

    if (empty($message)) {
        $msg[] = 'Le message est obligatoire';
        $error = true;
    }

    if (!empty($message)) {
        $message = str_replace(PHP_EOL, '<br>', $message);
    }

    $checkTask = $pdo->prepare("SELECT * FROM task WHERE id= ?");
    $checkTask->execute([$task_id]);

    if ($checkTask->rowCount() < 1) {
        $msg[] = 'Une erreur inattendue s\'est produite';
        $error = true;
    }

    if (!$error) {
        $insert = $pdo->prepare("INSERT INTO comment VALUES (NULL, ?, ?, ?, NOW())");
        $insert->execute([$task_id, $_SESSION['user']['id'], $message]);
        header('location:http://localhost' . $_SERVER['REQUEST_URI']);
    }
}

$task = $data->fetch(PDO::FETCH_OBJ);

$getMessages = $pdo->prepare("SELECT comment.id, login, user_id, date_format(comment.created_at, '%d/%m/%Y') as date_fr, date_format(comment.created_at, '%H:%i:%s') as time_fr, message FROM comment JOIN user on user.id = user_id WHERE comment.task_id = ? ORDER BY created_at DESC");
$getMessages->execute([$id]);
$messages = $getMessages->fetchAll(PDO::FETCH_OBJ);

// début des affichages :
require 'inc/header.inc.php';
require 'inc/nav.inc.php';
// var_dump($_SERVER);
?>

<main class="container">
    <h1 class="py-3 border-bottom text-center"><?= $task->name ?></h1>
    <div class="row">
        <?php if($task->status == 'pending') : ?>
        <div class="col-12 mt-3">
            <form action="" method="post" class="d-flex justify-content-end">
                <input type="hidden" name="task_id" value="<?= $task->id ?>">
                <input type="hidden" name="delete_task" value="">
                <button type="submit" class="btn btn-danger" onclick="return(confirm('Etes vous sûr ?'))">Supprimer la tâche</button>
            </form>
            <hr>
        </div>
        <?php endif; ?>
        <div class="col-sm-6 mt-5">
            <div class="mb-5">
                <form action="" method="post">
                    <input type="hidden" name="task_id" value="<?= $task->id ?>">
                    <div class="mb-3">
                        <div class="input-group mb-3">
                            <select class="form-control" id="status" name="status">
                                <option value="pending" <?= selectedStatus($task->status, 'pending') ?>>Pending</option>
                                <option value="in progress" <?= selectedStatus($task->status, 'in progress') ?>>In progress</option>
                                <option value="done" <?= selectedStatus($task->status, 'done') ?>>Done</option>
                                <option value="closed" <?= selectedStatus($task->status, 'closed') ?>>Closed</option>
                            </select>
                            <button class="btn btn-outline-success" type="submit">Changer</button>
                        </div>

                    </div>
                </form>
            </div>
            <img src="img/<?= $task->image ?>" alt="" class="img-thumbnail">
        </div>
        <div class="col-sm-6 mt-5">
            <!-- <h2 class="py-3 border-bottom text-center"><?= $task->name ?></h2> -->
            <p><?= $task->description ?></p>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mt-5">
            <h2 class="py-3 border-bottom text-center">Ajouter un message</h2>
            <form action="" method="post" class="p-3">
                <?= displayMsg(); ?>
                <input type="hidden" name="task_id" value="<?= $task->id ?>">
                <div class="mb-3">
                    <label for="message" class="form-label">Message</label>
                    <textarea class="form-control" id="message" name="message"></textarea>
                </div>
                <div class="mb-3">
                    <button class="btn btn-success w-100">Enregistrer</button>
                </div>
            </form>
            <h2 class="py-3 border-bottom text-center">Commentaire</h2>
            <p>Il y a <?= $getMessages->rowCount() ?> messages</p>
            <?php foreach ($messages as $message) : ?>
                <div class="card mb-3">
                    <div class="card-header">
                        Par : <b><?= $message->login ?></b>, Le : <b><?= $message->date_fr ?></b> à : <b><?= $message->time_fr ?></b>
                    </div>
                    <div class="card-body">
                        <?= htmlspecialchars($message->message, ENT_QUOTES);  ?>
                        <?php if ($message->user_id == $_SESSION['user']['id']) : ?>
                            <hr>
                            <form action="" method="post">
                                <input type="hidden" name="message_id" value="<?= $message->id ?>">
                                <button type="submit" class="btn btn-danger" onclick="return(confirm('Etes vous sûr ?'))">Supprimer</button>
                            </form>
                        <?php endif ?>
                    </div>

                </div>
            <?php endforeach; ?>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
        </div>
    </div>
</main>


<?php
require 'inc/footer.inc.php';
