<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DBController extends Controller
{
    public function insert()
    {
        $data = [
            [
                'username' => 'Neo ' . mt_rand(18, 60),
                'ip' => $_SERVER['REMOTE_ADDR'],
                'age' => mt_rand(18, 60),
                'created_at' => new \DateTime(),
                'updated_at' => new \DateTime(),
            ],
            [
                'username' => 'Neo ' . mt_rand(18, 60),
                'ip' => $_SERVER['REMOTE_ADDR'],
                'age' => mt_rand(18, 60),
                'created_at' => new \DateTime(),
                'updated_at' => new \DateTime(),
            ],
            [
                'username' => 'Neo ' . mt_rand(18, 60),
                'ip' => $_SERVER['REMOTE_ADDR'],
                'age' => mt_rand(18, 60),
                'created_at' => new \DateTime(),
                'updated_at' => new \DateTime(),
            ],
            [
                'username' => 'Neo ' . mt_rand(18, 60),
                'ip' => $_SERVER['REMOTE_ADDR'],
                'age' => mt_rand(18, 60),
                'created_at' => new \DateTime(),
                'updated_at' => new \DateTime(),
            ],
        ];

        DB::table('test')->insert($data);

        return view('db.index');
    }

    public function select()
    {
        $data = DB::table('test')
            // ->whereIn('username', ['Neo', 'Neo 3'])
            ->whereNotBetween('age', [30, 40])
            // ->whereColumn('username', 'age')
            ->get();

        \Debugbar::info($data);

        return view('db.index');
    }
}
