<?php
/*
 * @Author: 
 * @Date: 2020-04-10 16:38:39
 * @LastEditTime: 2020-04-11 17:25:08
 * @FilePath: \laravel-CMS\database\seeds\DatabaseSeeder.php
 */

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminUsersTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
    }
}
