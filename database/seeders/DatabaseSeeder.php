<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $admin = \App\Models\User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
        ]);

        $member = \App\Models\User::factory()->create([
            'name' => 'Member User',
            'email' => 'member@gmail.com',
        ]);

        $admin_role = Role::create(['name' => 'admin']);
        $member_role = Role::create(['name' => 'member']);

        $permission = Permission::create(['name' => 'create products']);
        $permission = Permission::create(['name' => 'access products']);
        $permission = Permission::create(['name' => 'edit products']);
        $permission = Permission::create(['name' => 'delete products']);

        $permission = Permission::create(['name' => 'access roles']);
        $permission = Permission::create(['name' => 'edit roles']);
        $permission = Permission::create(['name' => 'create roles']);
        $permission = Permission::create(['name' => 'delete roles']);

        $permission = Permission::create(['name' => 'access users']);
        $permission = Permission::create(['name' => 'edit users']);
        $permission = Permission::create(['name' => 'create users']);
        $permission = Permission::create(['name' => 'delete users']);

        $permission = Permission::create(['name' => 'access permissions']);
        $permission = Permission::create(['name' => 'edit permissions']);
        $permission = Permission::create(['name' => 'create permissions']);
        $permission = Permission::create(['name' => 'delete permissions']);

        $admin->assignRole($admin_role);
        $member->assignRole($member_role);

        $admin_role->givePermissionTo(Permission::all());
    }
}
