<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Handlers\ImageUploadHandler;
use Illuminate\Support\Facades\Input;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       return view('backend.link.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('backend.link.create_edit');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function  uploadimage( )
    {
        $file=Input::file('myfile');

        if($file->isValid()){
            //获取原文件名
            $originalName = $file->getClientOriginalName();
            //扩展名
            $ext = $file->getClientOriginalExtension();
            //文件类型
            $type = $file->getClientMimeType();

            //文件尺寸
            $size = $file->getSize();

            //临时绝对路径
            $realPath = $file->getRealPath();

            $filename = date('YmdHis').rand(1,1000).'.'.$ext;

            $date =  date('Y-m-d');

            $path= $file->move(public_path().'/uploads/'.$date.'/',$filename);

            $filePath='uploads/'.$date.'/'.$filename;

            if ($path) {
                $data = [
                    'status' => 0,
                    'filePath'=>$filePath,
                ];
            }
            return $data;
        }
    }


}
