<?php require_once(__DIR__."/../header.php") ?>
<h1>
    <?= $Events->title; ?>
    <div class="event-owner-wrapper">
        <small id="event-owner">
            主催者:<img src="//api.surume.tk/misskey/icon/link/<?= $Events->created_by ?>/thumbnail" class="icon">@<?= $Events->created_by ?>
        </small>
    </div>
    <small class="akari" id="event-owner-width"><?php /* モバイルでいい感じにするやつ(ロード後JavaScriptでevent-ownerの内容が入る) */ ?></small>
</h1>
<dl class="dl-horizontal">
    <dt>ハッシュタグ
        <dd><a href="https://search.misskey.link/?q=%23hoge">#hoge</a>
    <dt>定員
        <dd><?= $Events->capacity ? $Events->capacity.'人' : "なし"  ; ?>
    <dt>参加希望者
        <dd>8人
            <img src="//api.surume.tk/misskey/icon/link/srtm/thumbnail" class="icon">
            <img src="//api.surume.tk/misskey/icon/link/srtm/thumbnail" class="icon">
            <img src="//api.surume.tk/misskey/icon/link/srtm/thumbnail" class="icon">
            <img src="//api.surume.tk/misskey/icon/link/srtm/thumbnail" class="icon">
            <img src="//api.surume.tk/misskey/icon/link/srtm/thumbnail" class="icon">
            <img src="//api.surume.tk/misskey/icon/link/srtm/thumbnail" class="icon">
            <img src="//api.surume.tk/misskey/icon/link/NSR250SE/thumbnail" class="icon">
            <img src="//api.surume.tk/misskey/icon/link/srtm/thumbnail" class="icon">
</dl>
<h2><span>日にち候補</span></h2>
<?php if(!empty($Dates)) { ?>
<div class="table-responsive">
    <table class="table table-bordered">
        <tr>
            <th>日程
            <td><i class="fa fa-circle-o"></i>
            <td><i class="fa fa-question"></i>
            <td><i class="fa fa-times"></i>
            <td><img src="//api.surume.tk/misskey/icon/link/srtm/thumbnail" class="icon-kimoti-ookime">
            <td>You
                <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button>
            <?php foreach($Dates as $key => $date) { ?>
            <tr>
                <th><?= $date['date'] ?>
                <td>1人
                <td>0人
                <td>0人
                <td><i class="fa fa-circle-o event-mark"></i>
                <td>
                    <div class="btn-group"  data-toggle="buttons">
                        <label class="btn btn-default"><input type="radio" value=1><i class="fa fa-circle-o "></i></button></label>
                        <label class="btn btn-default"><input type="radio" value=2><i class="fa fa-question "></i></button></label>
                        <label class="btn btn-default"><input type="radio" value=3><i class="fa fa-times"></i></button></label>
                    </div>
            <?php } ?>

        <tr>
            <td>コメント
            <td>
            <td>
            <td>
            <td class="vote-comment">なんやこのイベント！
            <td><input type="text" class="form-control">
            </table>
            </div>
<?php } else { ?>
    未設定！ｗ
<?php } ?>
<h2><span>説明</span></h2>
<div class="description">
    <?= $Events->description ?>
</div>
<h2><span>コメント</span></h2>
<?php if(!empty($Comments)) { ?>
    <?php foreach($Comments as $Comment) { ?>
    <div class="comment">
    <img src="//api.surume.tk/misskey/icon/link/<?= $Comment->user ?>/thumbnail" class="icon-big">
    <small class="comment-user">@<?= $Comment->user?></small>
    <small class="comment-time"><?= $Comment->created_at?></small>
    <div class="comment-body"><?= $Comment->text ?></div>
    </div>
    <?php } ?>
<?php } ?>

<?php if($isLogin) { ?>
    <?php echo validation_errors(); ?>
    <div class="error"><?php echo $this->session->flashdata('error'); ?></div>
    <?php echo form_open('events/postcomment/'.$Events->id); ?>
    <div class="comment comment-input">
    <img src="//api.surume.tk/misskey/icon/link/<?= $this->session->userdata('screen_name') ?>/thumbnail" class="icon-big">
    <small class="comment-user">@<?= $this->session->userdata('screen_name') ?></small>
    <div class="comment-body">
        <textarea class="form-control" name='text'></textarea>
        <div class="row">
            <div class="col-sm-8"></div>
            <div class="col-sm-4"><button type="submit" class="btn btn-primary" style="width:100%;"><i class="fa fa-paper-plane"></i>コメントする</button></div>
        </div>
    </div>
    </div>
    </form>
<?php } else {?>
    <h1>コメントするにはログインする必要があります。 </h1>
    <?php echo anchor('login/', '俺より強い奴に会いに行く', array('class' => 'btn btn-success')) ?>
    <div style='height:20px;'></div>
<?php } ?>

<script>
$(function(){
    $("#event-owner-width").html($("#event-owner").html());
})
</script>
<?php require_once(__DIR__."/../footer.php") ?>
