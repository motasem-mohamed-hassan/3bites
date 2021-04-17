<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id'            =>  '1',
            'first_name'    =>  'super',
            'last_name'     =>  'admin',
            'email'         =>  'admin@admin.com',
            'phone'         => '01234567890',
            'lon'           => '123',
            'lat'           => '123',
            'password'      =>  Hash::make('123456789'),
            'admin'         => 1
        ]);

        Role::create(['name' => 'superAdmin']);
        $super_admin = User::find(1);
        $super_admin->assignRole('superAdmin');
    }
}
