@extends('backend.layouts.app')
@section('cssSection')
<link rel="stylesheet" href="{{asset('toastr/toastr.min.css')}}">
@endsection
@section('main-content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>友情链接</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <form action="{{route('admin.link.delall') }}" method="post">
                    {!! csrf_field() !!}
                    <div class="col-md-6 col-sm-6 col-xs-12 ">
                        <a href="{{route('admin.link.create')}}" class="btn  btn-round btn-info">站点添加</a>
                        <a href="#" onclick="selectAll();" class="btn btn-round btn-danger">全选</a>&nbsp;
                        <a href="#" onclick="selectNone();"class="btn btn-round btn-info">全不</a>&nbsp;
                        <a href="#" onclick="selectInvert();"class="btn btn-round btn-dark">反选</a>
                        <button type="submit" class="delete-all btn btn-round btn-danger">删除所选 </button>
                    </div>
                    <div class="clearfix"></div>
                    <div class="x_content">
                        <div class="table-responsive">
                            <table  class="table table-striped jambo_table">
                                <thead>
                                <tr class="headings">
                                    <th>
                                        <input type="checkbox" id="check-all" class="check-all">
                                    </th>
                                    <th class="column-title">网站名称 </th>
                                    <th class="column-title">网址 </th>
                                    <th class="column-title">简介 </th>
                                    <th class="column-title">状态 </th>
                                    <th class="column-title">发布日期 </th>
                                    <th class="column-title no-link last"><span class="nobr">操作</span>
                                    </th>
                                    <th class="bulk-actions" colspan="7">
                                        <a class="antoo" style="color:#fff; font-weight:500;">删除所选( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($links as $link)
                                <tr class="even pointer">
                                    <td class="a-center ">
                                        <input type="checkbox" name="ids[]"  value="{{ $link->id}}" class="ids flat" name="table_records">
                                    </td>
                                    <td class=" ">{{$link->name}}</td>
                                    <td class=" ">{{$link->url}}</td>
                                    <td class="col-md-4 col-sm-4 col-xs-8 ">{{$link->introduce}}</td>
                                    <td>
                                        @if($link->status == true)
                                            <span class="badge bg-blue">公开</span>
                                        @else
                                            <span class="badge bg-pink">私人</span>
                                        @endif
                                    </td>

                                    <td class="a-right a-right ">{{$link->created_at->toDateString()}}</td>
                                    <td>
                                        <a href="{{$link->url}}" target="_blank" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> 浏览 </a>
                                        <a href="{{ route('admin.link.edit',$link->id)}}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> 编辑 </a>
                                        <a href="javascript:;" onclick="delLink({{$link->id}})"  class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i>删除 </a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('jsSection')
<script src="{{ asset('layer/layer.js') }}"></script>
<script type="text/javascript">
    //选择全部
    $(".check-all").click(function () {
        $(".ids").prop("checked",this.checked);
    });
    //选择多个
    $(".ids").click(function () {
        var option=$(".ids");
        option.each(function (i) {
            if(!this.checked){
                $(".check-all").prop("checked",false);//已经选中的情况不操作
                return false;
            }else{
                $(".check-all").prop("checked",true);//单击选中
            }
        });
    });
    //全选
    function iselect(){ //其中函数字不能为select 其为JS保留字
        var ids = document.getElementsByName("ids[]");
        var all = document.getElementById("all");
        for(var i=0;i<ids.length;i++){
            ids[i].checked=all.checked;
        }
    }
    //全选
    function selectAll(){
        var ids = document.getElementsByName("ids[]");
        for(var i=0;i<ids.length;i++){
            ids[i].checked=true;
        }
    }
    //全不
    function selectNone(){
        var ids = document.getElementsByName("ids[]");
        for(var i=0;i<ids.length;i++){
            ids[i].checked=false;
        }
    }
    //反选
    function selectInvert(){
        var ids = document.getElementsByName("ids[]");
        for(var i=0;i<ids.length;i++){
            if(ids[i].checked)
                ids[i].checked=false ;
            else
                ids[i].checked=true ;
        }
    }
    //选择删除,防止没选时出错
    $('.delete-all').click(function () {
        var ids=$('.ids:checked');
        if(ids.length == 0 ){
            layer.msg('请选择要删除的选项',{time:1000});
            return false;
        }
    });

    function delLink(id) {

        layer.confirm('您确定要删除该网站吗？', {
            btn: ['确定','取消'] //按钮
        }, function(){
            $.post("{{url('admin/link/')}}/"+id,{'_method':'delete','_token':"{{csrf_token()}}"},function (data) {
                if(data.status==0){
                    location.href = location.href;
                    layer.msg(data.msg, {icon: 6});
                }else{
                    layer.msg(data.msg, {icon: 5});
                }
            });
//            layer.msg('的确很重要', {icon: 1});
        }, function(){

        });
    }
</script>
<script src="{{asset('toastr/toastr.min.js')}}"></script>
{!! Toastr::message() !!}
@endsection
