<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if (config('database.default') !== 'sqlite') {
            DB::statement('SET FOREIGN_KEY_CHECKS=0');
        }

        // delete() 는 단순히 데이터를 지우지만
        // truncate() 는 데이터를 지우고 기본키를 1부터 재배열 한다
        App\User::truncate();
        $this->call(UsersTableSeeder::class);

        App\Article::truncate();
        $this->call(ArticlesTableSeeder::class);

        if (config('database.default') !== 'sqlite') {
            DB::statement('SET FOREIGN_KEY_CHECKS=1');
        }
    }
}
