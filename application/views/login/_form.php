<?php echo validation_errors(); ?>
<div class="error"><?php echo $this->session->flashdata('error'); ?></div>
<?php echo form_open(''); ?>
<div class="box-body">

<table class="table table-bordered">
    <tr>
        <th><label for="name">screen_name</label><font color="red">*</font></th>
        <td><input type="text" name="screen_name" value="" id="screen_name" class="form-control" placeholder="misskeyのID(@マーク不要！)"></td>
    </tr>

    <tr>
        <th><label for="name">アナタ、ロボットダッタリシテ？（ごめんなさい）</label><font color="red">*</font></th>
        <td><div id="recaptcha" class="g-recaptcha" data-sitekey=<?=GOOGLE_API_SITE_KEY?>></div></td>
    </tr>

</table>
<div class="box-footer">
    <button type="submit" class="btn btn-success">認証</button>
</div>

</div>
</form>
