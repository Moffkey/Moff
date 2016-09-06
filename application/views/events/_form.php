<?php echo validation_errors(); ?>
<div class="error"><?php echo $this->session->flashdata('error'); ?></div>
<div class="alert alert-warning" id="not-working">ご利用のブラウザは動作対象外です。PC/Androidでご利用になる場合は<a href="https://www.google.co.jp/chrome/browser/desktop/">Google Chrome</a>(及びその姉妹ブラウザ)もしくは<a href="https://www.microsoft.com/ja-jp/windows/microsoft-edge">Microsoft Edge</a>、もしくはiOS端末をご利用ください。</div>
<script>
$(function(){
    var ua = navigator.userAgent.toLowerCase();
    var supported = false;
    if(ua.indexOf("chrome") !== -1) supported = true;
    if(ua.indexOf("iphone") !== -1) supported = true;
    if(ua.indexOf("ipad") !== -1) supported = true;
    if(ua.indexOf("ipod") !== -1) supported = true;
    if(supported) $("#not-working").hide();
})
</script>
<div class="form-group">
    <label for="inputName">イベント名</label>
    <input type="text" class="form-control" id="inputName" name="name">
</div>
<div class="form-group">
    <label for="inputDescription">説明</label>
    <div class="row">
        <div class="col-sm-6">
            <textarea class="form-control" id="inputDescription" rows=8 name="description"></textarea>
        </div>
        <div class="col-sm-6">
            <div class="panel panel-default" id="inputPreview">
                <div class="panel-heading" style="max-height:3em;">Preview</div>
                <div class="panel-body" style="padding:0;height:100%;">
                    <iframe style="width:100%;height:100%;border:0;" srcdoc="Preview"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="form-group">
    <label for="inputCandidateDate">候補日</label>
    <ul>
        <li>2016-11-04 05:14 <input type="hidden" name="candidate_date[]" value="2016-11-04 05:14">
    </ul>
    <div class="col-sm-8"><input type="datetime-local" class="form-control" id="candidate_date_input"></div>
    <button class="btn btn-primary col-xs-12 col-sm-4" id="candidate_date_add">Add</button>
    <script>
    $(function(){
        $("#candidate_date_add").click(function(e){
            e.preventDefault();
            var $li= $("<li>")
            var indate=$("#candidate_date_input").val();
            if(!indate) alert("日時を入力してください")
            indate = indate.replace("T"," ");
            $li.append(indate);
            var $input=$("<input>")
            $input.attr("type","hidden");
            $input.attr("name","candidate_date[]");
            $input.val(indate);
            $li.append($input);
            $(this).parent().children("ul").append($li)
        })
    })
    </script>
</div>
<div class="form-group">
    <label for="inputThumbnail">サムネイル(任意)</label>
    <input type="file" class="form-control" id="inputThumbnail" name="thumbnail">
</div>
<div class="form-group">
    <label for="inputCapacity">定員(任意)</label>
    <input type="number" class="form-control" id="inputCapacity" min=0 name="capacity">
</div>
<div class="form-group">
    <label for="inputDeadLine">締め切り</label>
    <input type="date" class="form-control" id="inputDeadLine" required name="deadline">
</div>
<script>
$(function(){
    var $description = $("#inputDescription");
    var $preview = $("#inputPreview");
    $description.mousedown(function(){
        console.log("attached");
        function move(){
            $preview.height($description.height());
        }
        $("html").mousemove(move);
        $description.mouseup(function(){
            console.log("removed");
            $("html").unbind("mousemove",move);
        })
    });
})
</script>
