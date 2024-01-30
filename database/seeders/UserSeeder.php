<?php

namespace Database\Seeders;

use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [ 
            [ 
                'name' => 'Ciccio',
                'surname' => 'Franco',
                'email'=> 'cicciofranco@gmail.com',
                'password'=> 'cicciofranco',
                'date_of_birth'=> '2019-10-11 1:23:45',
            ],

            [
                'name' => 'Mario',
                'surname' => 'Rossi',
                'email' => 'mariorossi@gmail.com',
                'password' => 'mariorossi',
                'date_of_birth' => '2019-10-11 1:23:45',
            ],

            [
                'name' => 'Luigi',
                'surname' => 'Verdi',
                'email' => 'luigiverdi@gmail.com',
                'password' => 'luigiverdi',
                'date_of_birth' => '1999-10-11 1:23:45',
            ],

            [
                'name' => 'Giovanna',
                'surname' => 'Bianchi',
                'email' => 'giovannabianchi@gmail.com',
                'password' => 'giovannabianchi',
                'date_of_birth' => '1998-08-11 1:23:45',
            ],

            [
                'name' => 'Francesca',
                'surname' => 'Neri',
                'email' => 'francescaneri@gmail.com',
                'password' => 'francescaneri',
                'date_of_birth' => '1997-10-11 1:23:45',
            ],

            [
                'name' => 'Paolo',
                'surname' => 'Marrone',
                'email' => 'paolomarrone@gmail.com',
                'password' => 'paolomarrone',
                'date_of_birth' => '1998-10-11 1:23:45',
            ],

            [
                'name' => 'Alessia',
                'surname' => 'Rosa',
                'email' => 'alessiarosa@gmail.com',
                'password' => 'alessiarosa',
                'date_of_birth' => '1999-07-11 1:23:45',
            ],

            [
                'name' => 'Davide',
                'surname' => 'Gialli',
                'email' => 'davidegialli@gmail.com',
                'password' => 'davidegialli',
                'date_of_birth' => '2000-10-11 1:23:45',
            ],
        ];

        foreach($users as $user){
            $new_user= new User();

            $new_user->name = $user['name'];
            $new_user->surname = $user['surname'];
            $new_user->email = $user['email'];
            $new_user->password = $user['password'];
            $new_user->date_of_birth = $user['date_of_birth'];

            $new_user->save();

        };
        // $user= new User();
        //     $user->name = 'Admin';
        //     $user->surname = 'Admin';
        //     $user->email = 'admin@gmail.com';
        //     $user->password = 'admin';
    
        //     $user->save();

    }
}
