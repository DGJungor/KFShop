<!-- 模态框（Modal） -->
<div class="modal fade" id="avatarModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                </button>
                <h4 class="modal-title" id="avatarModalLabel">
                    个性头像
                </h4>
            </div>
            <form id="form_data" method="POST" action="/admin/admins/{{ \Auth::guard('admin')->user()->id }}/edit" enctype="mutipart/form-data">
                <div class="modal-body">
                    <img src="{{ url(\Auth::guard('admin')->user()->avatar) }}" alt="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭
                    </button>
                    <button type="button" class="btn btn-primary">
                        提交更改
                    </button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>