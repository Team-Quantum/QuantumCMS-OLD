<form method="post" enctype="multipart/form-data" class="form-horizontal">
    <fieldset>
        <div class="form-group">
            <label class="col-md-4 control-label" for="itemProto">item_proto.txt</label>

            <div class="col-md-4">
                <input id="itemProto" name="itemProto" class="input-file" type="file">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="itemNames">item_names.txt</label>

            <div class="col-md-4">
                <input id="itemNames" name="itemNames" class="input-file" type="file">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="itemList">item_list.txt</label>

            <div class="col-md-4">
                <input id="itemList" name="itemList" class="input-file" type="file">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="upload"></label>

            <div class="col-md-8">
                <button id="upload" name="upload" class="btn btn-success">Upload</button>
                <button id="cancel" name="cancel" class="btn btn-danger">Cancel</button>
            </div>
        </div>
    </fieldset>
</form>