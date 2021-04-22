<?php

use Illuminate\Database\Seeder;

class InfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('infos')->insert([
          'id'              =>  '1',
          'phone'           =>  '01234567890',
          'email'           =>  'test@test.com',
          'facebook_link'   =>  'www.facebook.com',
          'instagram_link'  =>  'www.instagram.com',
          'web_link'        =>  'description',

      ]);
    }
}
