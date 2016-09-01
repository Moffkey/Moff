<?php require_once(__DIR__."/../header.php") ?>
<h1>
<div class="event-owner-wrapper">
<small id="event-owner">
主催者:<img src="//api.surume.tk/misskey/icon/link/srtm/thumbnail" class="icon">しろたま(@srtm)
</small>
</div>
タイトル
<small class="akari" id="event-owner-width"><?php /* モバイルでいい感じにするやつ(ロード後JavaScriptでevent-ownerの内容が入る) */ ?></small>
</h1>
<dl class="dl-horizontal">
<dt>ハッシュタグ
<dd><a href="https://search.misskey.link/?q=%23hoge">#hoge</a>
<dt>定員
<dd>810人
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
<table class="table table-bordered">
<tr><th>日程<td><i class="fa fa-circle-o"></i><td><i class="fa fa-question"></i><td><i class="fa fa-times"></i><td>@srtm
<tr><th>114/514 19:19〜<td>1人<td>0人<td>0人<td><i class="fa fa-circle-o event-mark"></i>
<tr><td>コメント<td><td><td><td>なんやこのイベント！
</table>
<h2><span>説明</span></h2>
<div class="description">
ここに説明文が入る
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
<script>
$(function(){
    $("#event-owner-width").html($("#event-owner").html());
})
</script>
<?php require_once(__DIR__."/../footer.php") ?>