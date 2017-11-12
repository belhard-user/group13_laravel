<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function index()
    {
        /*if(\Request::isMethod('post')){
            dd(
                $request->all(),
                $request->get('username', 'default value if parameters do not exists'),
                $request->session()->get('_token'),
                $request->cookie('laravel_session'),
                $request->is('request'),
                $request->header(),
                $request->ajax(),
                $request->decodedPath(),
                $request->getBasePath(),
                $request->getBaseUrl()
            );
        }*/
        return view('request.index');
    }

    public function putData(Request $request)
    {
        \DB::table('test')->insert([
            'username' => $request->get('username'),
            'ip' => $request->ip(),
            'age' => $request->get('age'),
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ]);

        return redirect()->back();
    }
}
