<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Fortune Doe',
            'email' => 'fortune@doe.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'phone' => '08090839412',
            'role'=>'super_admin',
            'status'=>'active',
            'user_account_id' => 1,
            'hotel_id' => 1,
        ]);
        DB::table('users')->insert([
            'name' => 'James Doe',
            'email' => 'james@doe.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'phone' => '08090839412',
            'role'=>'super_user',
            'status'=>'active',
            'user_account_id' => 1,
            'hotel_id' => 1,
        ]);
        DB::table('users')->insert([
            'name' => 'accountant Doe',
            'email' => 'accountant@doe.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'phone' => '08090839412',
            'role'=>'accountant',
            'status'=>'active',
            'user_account_id' => 1,
            'hotel_id' => 1,
        ]);
        DB::table('users')->insert([
            'name' => 'front desk Doe',
            'email' => 'frontdesk@doe.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'phone' => '08090839412',
            'role'=>'front_desk',
            'status'=>'active',
            'user_account_id' => 1,
            'hotel_id' => 1,
        ]
    );


    }
}
