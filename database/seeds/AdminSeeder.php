<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'id'            =>  '1',
            'name'          =>  'super',
            'email'         =>  'admin@admin.com',
            'password'      =>  Hash::make('123456789'),
            'is_super'      => true
        ]);
    }
}
