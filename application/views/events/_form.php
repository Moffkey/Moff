<?php echo validation_errors(); ?>
<div class="error"><?php echo $this->session->flashdata('error'); ?></div>
<div class="form-group">
    <label for="inputName">イベント名</label>
    <input type="text" class="form-control" id="inputName" name="name">
</div>
<div class="form-group">
    <label for="inputDescription">説明</label>
    <div class="row">
        <div class="col-sm-6">
            <textarea class="form-control col-xs-6" id="inputDescription" rows=8 name="description"></textarea>
        </div>
        <div class="col-sm-6">
            <div class="panel panel-default" id="inputPreview">
                <div class="panel-heading">Preview</div>
                <div class="panel-body" style="padding:0;height:100%;">
                    <iframe style="width:100%;height:100%;border:0;" srcdoc="Preview"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="form-group">
    <label for="inputCandidateDate">候補日</label>
    TODO
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
<button type="submit" class="btn btn-success">イベントを登録</button>
</form>
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
