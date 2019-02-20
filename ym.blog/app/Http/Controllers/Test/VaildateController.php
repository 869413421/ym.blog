<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VaildateController extends Controller
{
    public function index(Request $request)
    {
        return view('Test.vaildateFrom');
    }

    public function vailDate(Request $request)
    {
        $this->validate($request, [
            'title' => 'bail|required|string|between:2,32',
            'url' => 'sometimes|url|max:200'
        ], [
            'title.required' => '必填',
            'title.string' => '必须是字符串',
            'url.url' => '不是url',
            'max' => '超出了最大值'
        ]);
    }

}