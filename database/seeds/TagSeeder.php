<?php

use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            'Политика',
            'Юмор',
            'Спорт',
            'Культура',
        ];

        foreach ($tags as $tag){
            \App\Tag::create(['title' => $tag]);
        }
    }
}
