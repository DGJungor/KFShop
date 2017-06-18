@extends('admin.public')
@section('title')
分类管理
@endsection
@section('content')
<div class="row-4">
    <div class="ibox-content">
        <div class="test treeview" id="treeview2">
            <ul class="list-group">
                <li class="list-group-item node-treeview2" data-nodeid="0" style="">
                    <span class="icon">
                        <i class="click-expand glyphicon glyphicon-plus">
                        </i>
                    </span>
                    <span class="icon">
                        <i class="glyphicon glyphicon-stop">
                        </i>
                    </span>
                    父节点 1
                </li>
                <li class="list-group-item node-treeview2" data-nodeid="1" style="">
                    <span class="icon">
                        <i class="glyphicon">
                        </i>
                    </span>
                    <span class="icon">
                        <i class="glyphicon glyphicon-stop">
                        </i>
                    </span>
                    父节点 2
                </li>
                <li class="list-group-item node-treeview2" data-nodeid="2" style="">
                    <span class="icon">
                        <i class="glyphicon">
                        </i>
                    </span>
                    <span class="icon">
                        <i class="glyphicon glyphicon-stop">
                        </i>
                    </span>
                    父节点 3
                </li>
                <li class="list-group-item node-treeview2" data-nodeid="3" style="">
                    <span class="icon">
                        <i class="glyphicon">
                        </i>
                    </span>
                    <span class="icon">
                        <i class="glyphicon glyphicon-stop">
                        </i>
                    </span>
                    父节点 4
                </li>
                <li class="list-group-item node-treeview2" data-nodeid="4" style="">
                    <span class="icon">
                        <i class="glyphicon">
                        </i>
                    </span>
                    <span class="icon">
                        <i class="glyphicon glyphicon-stop">
                        </i>
                    </span>
                    sdjfksahsdajflksjflkjdslfjlksjaflksajflk
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="{{ asset('/style/js/demo/treeview-demo.js') }}">
</script>
<script src="{{ asset('/style/js/plugins/treeview/bootstrap-treeview.js') }}">
</script>
@endsection
