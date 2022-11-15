<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Maildata;

class MaildataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('maildatas')->insert([
            'users_id' => '1',
            'categories_id' => '1',
            'date' => '2022-11-15 09:18:50',
            'title' => 'これはテストです。',
            'message' => 'テスト用の文字列です。',
            'link' => '<CADyPENo0XiawP2h4AKwtvu9zx_rkxct+3bh19fq8a7gio3A4iw@mail.gmail.com>',
        ]);
    }
}
