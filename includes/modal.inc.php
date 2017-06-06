<!-- 模态框（Modal） -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">在线翻译</h4>
            </div>

            <div class="input-group" id="wordbook_box">
                <span class="input-group-btn">
                    <button id="add_wordbook_btn"  class="btn btn-default" type="button">
                            添加至生词本
                    </button>
                </span>
            </div>

            <div id="explain" class="modal-body">在这里添加一些文本</div>
            <div class="modal-footer">
                <div class="input-group">
                    <input type="text" id="user_meaning" class="form-control">
                    <span class="input-group-btn">
                        <button id="user_meaning_btn"  class="btn btn-default" type="button">
                            添加翻译
                        </button>
                    </span>
                </div><!-- /input-group -->
                <br>
                <button type="button" class="btn btn-primary">添加</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">关闭</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>
