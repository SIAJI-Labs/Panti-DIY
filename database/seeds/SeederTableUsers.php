<?php

use App\User;

use Illuminate\Database\Seeder;

class SeederTableUsers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        User::truncate();
        Schema::enableForeignKeyConstraints();

        $users = [
            [
                'name' => 'Dwi Aji',
                'email' => 'dwiaji.mail@gmail.com',
                'username' => 'dwiaji', 
                'password' => bcrypt('dwiaji'), 
                'is_active' => true,
                'is_verified' => false
            ],
        ];

        foreach($users as $data){
            $store = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'username' => $data['username'],
                'password' => $data['password'],
                'is_active' => $data['is_active'],
                'is_verified' => $data['is_verified'],
            ]);
        }
    }
}
