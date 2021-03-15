<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


class AdTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Ad = new \App\Models\Ad([
            'title' => 'العنوان الاول',
            'content' => 'محتوى الاعلان الاول'
        ]);
        $Ad->save();

        $Ad = new \App\Models\Ad([
            'title' => 'عنوان الاعلان الثاني',
            'content' => 'محتوى الاعلان الثاني'
        ]);
        $Ad->save();
    }

    //$tag = new \App\Tag();
    //$tag->name = 'Tutorial';
    //$tag->save();

}
