<?php

namespace App\Http\Controllers\Upload;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function index(){
        return view('upload.csv');
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'fileToUpload'=> 'required'
        ]);
    }
}
