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
            'date' => '2022-11-15 12:40:21',
            'title' => 'ちょっと多いかもね',
            'message' => 'ページネーションのテストです。',
            'link' => 'exam@exam.com',
        ]);
    }
}
