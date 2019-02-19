<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use App\Services\PostService;
use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function index(Request $request)
    {
        return view('Test.uploadFrom');
    }

    public function uploadFile(Request $request)
    {
        if ($request->hasFile('picture'))
        {
            $picture = $request->file('picture');
            if (!$picture->isValid())
            {
                abort(400, '无效的上传文件');
            }
            $ext = $picture->getClientOriginalExtension();
            $fileName = $picture->getClientOriginalName();
            $newFileName = md5($fileName . time() . mt_rand(100000, 999999)) . $ext;
            $savePath = 'images/' . time() . '/' . $newFileName;
            $webPath = '/storage/' . $savePath;

            if (Storage::disk('public')->has($savePath))
            {
                return response()->json(['path' => $webPath]);
            }
            // 否则执行保存操作，保存成功将访问路径返回给调用方
            if ($picture->storePubliclyAs('images', $newFileName, ['disk' => 'public']))
            {
                return response()->json(['path' => $webPath]);
            }
            abort(500, '文件上传失败');
        }
        else
        {
            abort(400, '请选择要上传的文件');
        }
    }

}