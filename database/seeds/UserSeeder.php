<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $u = new Shoppvel\User();
        $u->name = 'Ademir Mazer Junior';
        $u->email = 'ademir.mazer.jr@gmail.com';
        $u->cpf = '00000000000';
        $u->role = 'admin';
        $u->password = bcrypt('111111');
        $u->save();
    }

}
