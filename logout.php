<?php
require_once "maininclude/header.php";
?>
<div id="wrapper">

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <?php
                // $login = new login();
                // $login->logout_main();

                session_start();
                session_destroy();
                header('Location: index.php');
                ?>
            </div>
        </div>

    </div>
</div>
<!-- /#wrapper -->
<?php require_once "maininclude/footer.php"; ?>