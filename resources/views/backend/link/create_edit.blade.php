@extends('backend.layouts.app')
@section('cssSection')
    <!-- NProgress -->
    <link href="{{asset('vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{asset('vendors/iCheck/skins/flat/green.css' )}}" rel="stylesheet">
     <!-- Switchery -->
    <link href="{{asset('vendors/switchery/dist/switchery.min.css' )}}" rel="stylesheet">
    <!-- starrr -->
    <link href="{{asset('vendors/starrr/dist/starrr.css' )}}" rel="stylesheet">
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
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>添加站点 <small>Add Site</small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Settings 1</a>
                                        </li>
                                        <li><a href="#">Settings 2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br />
                            <form id="link_create"  data-parsley-validate  class="form-horizontal form-label-left" method="POST"
                                  accept-charset="UTF-8" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">网站名称 <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" id="name"  name="name" required="required" class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">网站地址 <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" id="url" name="url" required="required" class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-6">公开</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="checkbox"  name="status"  class="js-switch"  value="1"  checked="" data-switchery="true" style="display: none;">
                                            </div>
                                        </div>
                                        <div class="form-group form-inline">
                                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-6">缩略图</label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="file" name="myfile" id="myfile" onchange="javascript:submitFile();" style="display: none">
                                                <input type="text"  name="art_thumb"  class="form-control col-md-6" />
                                                &nbsp;&nbsp;
                                                <a class="btn btn-small btn-success" onclick="javascript:uploadmyFile();">选择图片</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3">
                                          <img id="art_thumb" src="" style="max-width:200px;max-height: 100px; "/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-9">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">站点简介
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <textarea class="resizable_textarea form-control" placeholder="站点简介"></textarea>
                                        </div>
                                    </div>
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-6">
                                            <a href="{{route('admin.link.index')}}" class="btn btn-default">取消</a>
                                            <button class="btn btn-primary" type="reset">重置</button>
                                            <button type="submit" class="btn btn-success">提交</button>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('jsSection')
    <!-- NProgress -->
    <script src="{{asset('vendors/nprogress/nprogress.js')}}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{asset('vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
    <!-- iCheck -->
    <script src="{{asset('vendors/iCheck/icheck.min.js')}}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{asset('vendors/moment/min/moment.min.js')}}"></script>

    <script src="{{asset('vendors/jquery.hotkeys/jquery.hotkeys.js')}}"></script>
    <script src="{{asset('vendors/google-code-prettify/src/prettify.js')}}"></script>
    <!-- jQuery Tags Input -->
    <script src="{{asset('vendors/jquery.tagsinput/src/jquery.tagsinput.js')}}"></script>
    <!-- Switchery -->
    <script src="{{asset('vendors/switchery/dist/switchery.min.js')}}"></script>

    <!-- Parsley  表单验证文件，第二个文件为语言文件-->
    <script src="{{asset('vendors/parsleyjs/dist/parsley.min.js')}}"></script>
    <script src="{{asset('vendors/parsleyjs/dist/i18n/zh_cn.js')}}"></script>

    <script src="{{asset("js/jquery.form.min.js")}}" type="text/javascript"></script>

    <script type="text/javascript">

        function uploadmyFile()
        {
             $("#myfile").click();
        }

        function submitFile()
        {
            $("#link_create").ajaxSubmit({
                url: "{{route('admin.link.uploadimage')}}",
                type: "post",
                dataType:'json',
                success: function (data)
                {
                    $('input[name=art_thumb]').val(data.filePath)
                    //返回数据为相对路径
                    $('#art_thumb').attr('src','/'+data.filePath)
                    //返回数据为绝对路径
                    $('#art_thumb').attr('src',data.filePath)

                },
                error: function (data)
                {
                    //var msg = eval(data);
                    alert("出错");//msg.errCode
                }
            })
        }
    </script>
@endsection
