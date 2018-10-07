@extends('backend.layouts.app')
@section('cssSection')
<link href="{{asset('vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">
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
                            <a href="{{route('admin.link.create')}}" class="btn  btn-round btn-primary">站点添加</a>
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
                                        <th class="column-title">排序 </th>
                                        <th class="column-title">缩略图 </th>
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
                                    <tr class="even pointer">
                                        <td class="a-center ">
                                            <input type="checkbox" class="flat" name="table_records">
                                        </td>
                                        <td class=" ">121000040</td>
                                        <td class=" ">May 23, 2014 11:47:56 PM </td>
                                        <td class=" ">121000210 <i class="success fa fa-long-arrow-up"></i></td>
                                        <td class=" ">John Blank L</td>
                                        <td class=" ">Paid</td>
                                        <td class="a-right a-right ">$7.45</td>
                                        <td>
                                            <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> 浏览 </a>
                                            <a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> 编辑 </a>
                                            <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i>删除 </a>
                                        </td>
                                    </tr>
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
@endsection
