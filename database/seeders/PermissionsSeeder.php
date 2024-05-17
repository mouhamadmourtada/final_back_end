<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\PermissionRegistrar;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'create']);
        Permission::create(['name' => 'read']);
        Permission::create(['name' => 'update']);
        Permission::create(['name' => 'delete']);

        // create roles
        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'user']);
        $role3 = Role::create(['name' => 'super-admin']);
        
        // assign permissions to roles
        $role1->givePermissionTo('create');
        $role1->givePermissionTo('read');
        $role1->givePermissionTo('update');
        $role1->givePermissionTo('delete');

        $role2->givePermissionTo('read');

        // create a user
        $user = \App\Models\User::factory()->create([
            'nom' => 'User',
            'prenom' => 'Admin',
            'email' => 'test@example.org',
            'password' => Hash::make('password'),
            'adresse' => '123 Main St',
            'telephone' => '555-555-5555',
            'date_naissance' => '1990-01-01',
            'lieu_naissance' => 'Paris',
        ]);

        // assign roles to user
        $user->assignRole('admin');

        // create a user
        $user = \App\Models\User::factory()->create([
            'nom' => 'Gaye',
            'prenom' => 'User',
            'email' => 'gaye@example.com',
            'password' => Hash::make('password'),
            'adresse' => '123 Main St',
            'telephone' => '555-555-5555',
            'date_naissance' => '1990-01-01',
            'lieu_naissance' => 'Paris',
        ]);

        // assign roles to user
        $user->assignRole('user');

        // create a user
        $user = \App\Models\User::factory()->create([
            'nom' => 'Super',
            'prenom' => 'Admin',
            'email' => 'super@example.fr',
            'password' => Hash::make('password'),
            'adresse' => '123 Main St',
            'telephone' => '555-555-5555',
            'date_naissance' => '1990-01-01',
            'lieu_naissance' => 'Paris',
        ]);

        // assign roles to user
        $user->assignRole('super-admin');
    }
}
