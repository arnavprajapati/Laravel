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
            'file' => 'required|file|mimes:jpg,png,jpeg|max:2048',
        ]);

        $file = $request->file('file');
        $originalName = $file->getClientOriginalName();
        $filename = time() . '_' . $originalName;
        $uploadPath = public_path('uploads');

        if (! file_exists($uploadPath)) {
            mkdir($uploadPath, 0755, true);
        }

        $file->move($uploadPath, $filename);
        $path = 'uploads/' . $filename;

        return back()->with([
            'success'  => 'File uploaded successfully!',
            'filename' => $originalName,
            'path'     => $path,
        ]);
    }
}
