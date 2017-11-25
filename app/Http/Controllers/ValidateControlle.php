<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class ValidateControlle extends Controller
{
    public function index()
    {
        $user = [
            'name' => 'aaaaaaaa',
            'age' => 44,
            'email' => 'a@.com',
            'assessments' => [2, 3, 'foo' => 4.4, 2, 4, 5, 3, 4]
        ];

        $validator = Validator::make($user, [
            'name' => 'required|min:4|max:10',
            'age' => 'required|numeric|between:18,65',
            'email' => 'email',
            'assessments.*' => 'integer'
        ]);

        dd(
            $validator->fails(),
            $validator->errors()->all(),
            $validator->errors()->has('age'),
            $validator->errors()->get('assessments.*')
        );
        return view('validate.index');
    }

    public function form()
    {
        return view('validate.form');
    }

    public function store(\App\Http\Requests\ValidateRequest $request)
    {
        /*$request->validate([
            'name' => 'required|min:4|max:10',
            'age' => 'required|numeric|between:18,65'
        ]);*/

        return $request->all();
    }
}
