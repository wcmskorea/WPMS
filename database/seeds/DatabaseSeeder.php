<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * 
     * 1. php artisan make:seed 이름(TodoTableSeeder)
     * 2. TodoTableSeeder.php 수정
     * 3. DatabaseSeeder.php 실행명령 삽입
     * 4. php artisan db:seed 실행
     *
     * @return void
     */
    public function run()
    {
        // Model::unguard();

        $this->call(TodoTableSeeder::class);
        $this->command->info('todos table seeded');

        // $this->call(UserTableSeeder::class);
        // $this->command->info('users table seeded');

        // Model::unguard();
    }
}
