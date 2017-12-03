<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function index()
    {
        return view('upload.index');
    }

    public function loadFile(Request $request)
    {
        $allPath = [];
        if($request->hasFile('photo')){
            foreach($request->file('photo') as $file) {
                $path = $file->move('multiple-images', $this->getName($file));
                $allPath[] = $path->getPathname();
            }
        }

        dd($allPath);
    }

    private function getName($file)
    {
        return sprintf(
            '%s_%s',
            time(),
            $file->getClientOriginalName()
        );
    }
}
