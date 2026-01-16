<?php
require 'inc/init.inc.php';
require 'inc/functions.inc.php';

if (! user_is_connect()) {
    header('location:login.php');
}

$data = $pdo->query("SELECT id, name, date_format(created_at, '%d/%m/%Y') AS date_fr, status FROM task");

// Pour les injections :
if(isset($_GET['status'])) {
    $status = $_GET['status'];
    // $data = $pdo->query("SELECT id, name, date_format(created_at, '%d/%m/%Y') AS date_fr, status FROM task WHERE status = '$status'");
    $data = $pdo->prepare("SELECT id, name, date_format(created_at, '%d/%m/%Y') AS date_fr, status FROM task WHERE status = ?");
    $data->execute([$status]);

}


// début des affichages :
require 'inc/header.inc.php';
require 'inc/nav.inc.php';
echo '<pre>'; print_r($_SESSION); echo '</pre>';
?>

<main class="container">
    <h1 class="py-3 border-bottom text-center">Dashboard</h1>
    <div class="row">
        <div class="col-12 my-5">
            <a href="create_task.php" class="btn btn-primary">Nouvelle tâche</a>
        </div>
        <div class="col-sm-3">
            <h2 class="py-3 border-bottom mb-5">Statut</h2>
            <ul class="list-group">
                <li class="list-group-item"><a href="?status=pending" class="text-decoration-none">Pending</a></li>
                <li class="list-group-item"><a href="?status=in progress" class="text-decoration-none">In progress</a></li>
                <li class="list-group-item"><a href="?status=done" class="text-decoration-none">Done</a></li>
                <li class="list-group-item"><a href="?status=closed" class="text-decoration-none">Closed</a></li>
            </ul>
        </div>
        <div class="col-sm-9">
            <h2 class="py-3 border-bottom mb-5">Liste des tâches</h2>
            <table class="table table-bordered">
                <?php if ($data->rowCount() < 1) : ?>
                    <tr>
                        <td>Il n'y a aucune tâche disponibles actuellement</td>
                    </tr>
                <?php else : ?>
                    <?php while ($task = $data->fetch(PDO::FETCH_OBJ)) : ?>
                        <tr>
                            <td><?= $task->id ?></td>
                            <th><a href="task_details.php?id=<?= $task->id ?>" class="text-decoration-none"><?= $task->name ?></a></th>
                            <td><?= $task->status ?></td>
                            <td><?= $task->date_fr ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php endif; ?>
            </table>

            </ul>
        </div>

    </div>
</main>


<?php
require 'inc/footer.inc.php';
