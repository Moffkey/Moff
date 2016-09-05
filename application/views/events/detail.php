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
        <?php /* 日ごと */ ?>
        <tr>
            <th>114/514 19:19〜
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
        <tr>
            <td>コメント
            <td>
            <td>
            <td>
            <td class="vote-comment">なんやこのイベント！
            <td><input type="text" class="form-control">
    </table>
</div>
<h2><span>説明</span></h2>
<div class="description">
    <?= $Events->description ?>
</div>
<h2><span>コメント</span></h2>
<div class="comment">
    <img src="//api.surume.tk/misskey/icon/link/srtm/thumbnail" class="icon-big">
    <small class="comment-user">しろたま@srtm</small>
    <small class="comment-time">2016/07/29</small>
    <div class="comment-body">なんやこのイベント！</div>
</div>
<div class="comment">
    <img src="//api.surume.tk/misskey/icon/link/surume/thumbnail" class="icon-big">
    <small class="comment-user">スルメ@surume</small>
    <small class="comment-time">2016/07/29</small>
    <div class="comment-body">そうだよ（便乗）</div>
</div>
<div class="comment comment-input">
    <img src="//api.surume.tk/misskey/icon/link/surume/thumbnail" class="icon-big">
    <small class="comment-user">スルメ@surume</small>
    <div class="comment-body">
        <textarea class="form-control"></textarea>
        <div class="row">
            <div class="col-sm-8"></div>
            <div class="col-sm-4"><button class="btn btn-primary" style="width:100%;"><i class="fa fa-paper-plane"></i> コメントする</button></div>
        </div>
    </div>
</div>
<script>
$(function(){
    $("#event-owner-width").html($("#event-owner").html());
})
</script>
<?php require_once(__DIR__."/../footer.php") ?>
