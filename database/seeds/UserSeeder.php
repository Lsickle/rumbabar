<?php

use Illuminate\Database\Seeder;
use App\Rol;
use App\User;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = Role::all('name')->pluck('name');
        factory(User::class, 5)->create()->each(function ($user) use ($roles) {
            $user->assignRole($roles->random(1));
        });
    }
}
