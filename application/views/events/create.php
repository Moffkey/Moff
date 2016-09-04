<?php require_once(__DIR__."/../header.php") ?>
<h1>イベントの作成</h1>
<?php echo form_open('', 'enctype="multipart/form-data"'); ?>
<?php require_once(__DIR__."/_form.php") ?>
<button type="submit" class="btn btn-success">イベントを登録</button>
</form>
<?php require_once(__DIR__."/../footer.php") ?>
