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
                'profile_pic' => '/img/users/user-1.png',
                'email' => 'cicciofranco@gmail.com',
                'password' => 'cicciofranco',
                'date_of_birth' => '2019-10-11 1:23:45',
            ],

            [
                'name' => 'Mario',
                'surname' => 'Rossi',
                'profile_pic' => '/img/users/user-1.png',
                'email' => 'mariorossi@gmail.com',
                'password' => 'mariorossi',
                'date_of_birth' => '2019-10-11 1:23:45',
            ],

            [
                'name' => 'Luigi',
                'surname' => 'Verdi',
                'profile_pic' => '/img/users/user-1.png',
                'email' => 'luigiverdi@gmail.com',
                'password' => 'luigiverdi',
                'date_of_birth' => '1999-10-11 1:23:45',
            ],

            [
                'name' => 'Giovanna',
                'surname' => 'Bianchi',
                'profile_pic' => '/img/users/user-1.png',
                'email' => 'giovannabianchi@gmail.com',
                'password' => 'giovannabianchi',
                'date_of_birth' => '1998-08-11 1:23:45',
            ],

            [
                'name' => 'Francesca',
                'surname' => 'Neri',
                'profile_pic' => '/img/users/user-1.png',
                'email' => 'francescaneri@gmail.com',
                'password' => 'francescaneri',
                'date_of_birth' => '1997-10-11 1:23:45',
            ],

            [
                'name' => 'Paolo',
                'surname' => 'Marrone',
                'profile_pic' => '/img/users/user-1.png',
                'email' => 'paolomarrone@gmail.com',
                'password' => 'paolomarrone',
                'date_of_birth' => '1998-10-11 1:23:45',
            ],

            [
                'name' => 'Alessia',
                'surname' => 'Rosa',
                'profile_pic' => '/img/users/user-1.png',
                'email' => 'alessiarosa@gmail.com',
                'password' => 'alessiarosa',
                'date_of_birth' => '1999-07-11 1:23:45',
            ],

            [
                'name' => 'Davide',
                'surname' => 'Gialli',
                'profile_pic' => '/img/users/user-1.png',
                'email' => 'davidegialli@gmail.com',
                'password' => 'davidegialli',
                'date_of_birth' => '2000-10-11 1:23:45',
            ],
        ];

        foreach ($users as $user) {
            $new_user = new User();

            $new_user->name = $user['name'];
            $new_user->surname = $user['surname'];
            $new_user->profile_pic = $user['profile_pic'];
            $new_user->email = $user['email'];
            $new_user->password = $user['password'];
            $new_user->date_of_birth = $user['date_of_birth'];

            $new_user->save();
        };

        $user = new User();
        $user->name = 'Admin';
        $user->surname = 'Admin';
        $user->profile_pic = '/img/users/user-2.png';
        $user->email = 'admin@gmail.com';
        $user->password = 'Adminadmin';

        $user->save();
    }
}
