<?php 
require 'inc/init.inc.php';
require 'inc/functions.inc.php';

if( ! user_is_connect()) {
    header('location:login.php');
}




// début des affichages :
require 'inc/header.inc.php';
require 'inc/nav.inc.php';
?>

    <main class="container">

    </main>

    
<?php 
require 'inc/footer.inc.php';

