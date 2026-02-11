<?php
// CODE
require_once 'inc/init.php';
require_once 'model.php';
require_once 'controller.php';



// début des affichage
include 'inc/header.inc.php';
include 'inc/nav.inc.php';
// print_r($_POST);
?>
<main class="container">
    <div class="bg-light p-5 rounded">
        <form method="post" class="p-3 border">
            <?php echo $msg; ?>
            <div class="mb-3">
                <label for="pseudo" class="form-label">Pseudo</label>
                <input type="text" class="form-control" id="pseudo" name="pseudo">
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control" id="message" name="message" rows="5"></textarea>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-outline-dark mb-3">Envoyer <i class="fa-regular fa-message"></i></button>
            </div>
        </form>
    </div>

    <div class="row">
        <div class="col-sm-12 mt-5">
            <?php foreach ($liste_messages as $ligne) :  // print_r($infos);  ?>

                <div class="card mb-3">
                    <div class="card-header">
                        Par : <b><?= $ligne[0]; ?></b>, à : <?= $ligne[1]; ?>
                    </div>
                    <div class="card-body">
                        <?= $ligne[2]; ?>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    </div>
</main>

<?php
include 'inc/footer.inc.php';

