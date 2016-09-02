<?php include_once(__DIR__.'/../header.php') ?>

        <h1>Oops!<br>

        有効期限の過ぎた無効なセッションキーか、不正なセッションキーです！
        <?php echo anchor('login/','再発行しに行く',array('class' => 'btn btn-info')); ?>

<?php include_once(__DIR__.'/../footer.php') ?>
