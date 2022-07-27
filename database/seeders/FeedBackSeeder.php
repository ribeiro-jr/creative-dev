<?php

namespace Database\Seeders;

use App\Models\FeedBack;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeedBackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('feed_backs')->truncate();
        FeedBack::factory(7)->create();
    }
}
