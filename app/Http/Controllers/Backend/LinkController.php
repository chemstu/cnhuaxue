<?php

namespace App\Http\Controllers\Backend;

use App\Http\Models\Backend\Link;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Handlers\ImageUploadHandler;
use Illuminate\Support\Facades\Auth;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Link $link)
    {
        $links=Link::all();
        return view('backend.link.index',compact('links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.link.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Link $link)
    {
        $link->fill($request->all());
        if(!$request->status){
            $link->status=0;
        }
        $link->save();
        Toastr::success('信息添加成功 :)','Success');
        return redirect(route('admin.link.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $link = link::find($id);
        return view('backend.link.edit',compact('link'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Link $link)
    {
        $link->fill($request->all());
        if(!$request->status){
            $link->status=0;
        }
        $link->save();
        Toastr::success('信息修改成功 :)','Success');
        return redirect(route('admin.link.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res=Link::where('id',$id)->delete();
        if($res){
            $data = [
                'status' => 0,
                'msg' => '文章删除成功！',
            ];
        }else{
            $data = [
                'status' => 1,
                'msg' => '文章删除失败，请稍后重试！',
            ];
        }
        return $data;
    }

    //删除所选
    public function delall(Request $request)
    {
        $ids = $request->input('ids');
        Link::whereIn('id', $ids)->delete();
        Toastr::success('信息删除成功 :)','Success');
        return redirect(route('admin.link.index'));
    }
    //缩略图上传
    public function  uploadimage(Request $request, ImageUploadHandler $uploader )
    {
        if ($file = $request->logo) {
            // 保存图片到本地
            $result = $uploader->save($file,'link',Auth::id(),200);
            if ($result) {
                $data = [
                    'status' => 0,
                    'filePath'=>$result['path'],
                ];
            }
        }
        return $data;
    }
}
