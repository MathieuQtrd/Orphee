    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="#">Project</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0"> 
                    <!-- Si l'utilisateur n'est pas connecté -->

                    <?php if( ! user_is_connect()) : ?>

                    <li class="nav-item">
                        <a class="nav-link" href="<?= ROOT_URL ?>login.php">Connexion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= ROOT_URL ?>register.php">Inscription</a>
                    </li>

                    <?php else : ?>

                    <!-- Si l'utilisateur est connecté -->

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= ROOT_URL ?>index.php">Dashboard</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="<?= ROOT_URL ?>profile.php">Profil</a>
                    </li>                    
                    
                    <li class="nav-item">
                        <a class="nav-link" href="<?= ROOT_URL ?>login.php?action=logout">Déconnexion</a>
                    </li>

                    <?php endif; ?>
                    <!-- Si l'utilisateur est connecté et a le statut admin -->


            </div>
        </div>
    </nav>