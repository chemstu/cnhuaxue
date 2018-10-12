@extends('backend.layouts.app')
@section('cssSection')
<link href="{{asset('vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('alert/jquery-confirm.min.css') }}"/>
<link rel="stylesheet" href="{{asset('toastr/toastr.min.css')}}">
@endsection
@section('main-content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>友情链接</h3>
            </div>
            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="搜索...">
                        <span class="input-group-btn">
                  <button class="btn btn-default" type="button">确定</button>
                </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="col-md-6 col-sm-6 col-xs-12 ">
                        <a href="{{route('admin.link.create')}}" class="btn  btn-round btn-info">站点添加</a>
                        <a href="{{route('admin.link.create')}}" class="btn  btn-round btn-dark">删除所选</a>
                        <a href="{{route('admin.link.create')}}" class="btn  btn-round btn-danger">删除全部</a>
                    </div>
                    <div class="clearfix"></div>
                    <div class="x_content">
                        <div class="table-responsive">
                            <table class="table table-striped jambo_table bulk_action">
                                <thead>
                                <tr class="headings">
                                    <th>
                                        <input type="checkbox" id="check-all" class="flat">
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
                                        <input type="checkbox" class="flat" name="table_records">
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

                                        <form id="delete-form-{{$link->id}}" method="post" action="{{ route('admin.link.destroy',$link->id) }}" style="display: none">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                        </form>
                                        <a onclick="deletelink({{$link->id}})"  class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i>删除 </a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('jsSection')
<script src="{{asset('vendors/iCheck/icheck.min.js')}}"></script>
<script src="{{ asset('alert/jquery-confirm.min.js') }}"></script>
<script type="text/javascript">
    function deletelink(id) {
        $.confirm({
            title: '信息删除',
            content: '信息一旦删除，将无法恢复!',
            type: 'red',
            typeAnimated: true,
            icon: 'fa fa-warning',
            buttons: {
                tryAgain: {
                    text: '确定',
                    btnClass: 'btn-red',
                    action: function(){
                        event.preventDefault();
                        document.getElementById('delete-form-'+id).submit();
                    }
                },
                取消: function () {
                }
            }
        });
    }
</script>
<script src="{{asset('toastr/toastr.min.js')}}"></script>
{!! Toastr::message() !!}
@endsection
