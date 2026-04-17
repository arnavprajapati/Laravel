<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function showview()
    {
        return view('upload');
    }
    public function submit(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:jpg,png|max:2048',
        ]);
        $file = $request->file('file');
        $originalName = $file->getClientOriginalName();
        $filename = time() . '_' . $originalName;
        $file->move(public_path('uploads'), $filename);
        $path = 'uploads/' . $filename;

        return back()->with([
            'success'  => 'File uploaded successfully!',
            'filename' => $originalName,
            'path'     => $path,
        ]);
    }
}
