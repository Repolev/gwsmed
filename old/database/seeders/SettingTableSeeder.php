<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'title'=>'GSW Med',
            'url'=>'http://gwsmed.com',
            'about'=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
            'short_intro'=>'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.',
            'office_time'=>"8am-5pm",
            'footer'=>'2021 Copyright gwsmed',
            'favicon'=>'',
            'logo'=>'',
            'email'=>'info@gwsmed.com.np',
            'phone'=>'980999000',
            'address'=>'India',
            'facebook'=>'',
            'google'=>'',
            'instagram'=>'',
            'twitter'=>'',

        ]);
    }
}
