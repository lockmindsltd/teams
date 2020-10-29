<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\PermissionRegistrar;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // Reset cached roles and permissions
        app()[ PermissionRegistrar::class]->forgetCachedPermissions();

        // create project permissions
        Permission::create(['name' => 'edit projects']);
        Permission::create(['name' => 'delete projects']);
        Permission::create(['name' => 'create projects']);
        Permission::create(['name' => 'view projects']);
        Permission::create(['name' => '* projects']);

        // create project actions permissions
        Permission::create(['name' => 'edit projects teams']);
        Permission::create(['name' => 'delete projects teams']);
        Permission::create(['name' => 'create projects teams']);
        Permission::create(['name' => 'view projects teams']);
        Permission::create(['name' => '* projects teams']);

        // create team permissions
        Permission::create(['name' => 'edit teams']);
        Permission::create(['name' => 'delete teams']);
        Permission::create(['name' => 'create teams']);
        Permission::create(['name' => 'view teams']);
        Permission::create(['name' => '* teams']);

        // create task permissions
        Permission::create(['name' => 'edit tasks']);
        Permission::create(['name' => 'delete tasks']);
        Permission::create(['name' => 'create tasks']);
        Permission::create(['name' => 'view tasks']);
        Permission::create(['name' => '* tasks']);

        // create task progress permissions
        Permission::create(['name' => 'edit tasks progress']);
        Permission::create(['name' => 'delete tasks progress']);
        Permission::create(['name' => 'create tasks progress']);
        Permission::create(['name' => 'view tasks progress']);
        Permission::create(['name' => '* tasks progress']);

        // create task comments permissions
        Permission::create(['name' => 'edit tasks comments']);
        Permission::create(['name' => 'delete tasks comments']);
        Permission::create(['name' => 'create tasks comments']);
        Permission::create(['name' => 'view tasks comments']);
        Permission::create(['name' => '* tasks comments']);

        // create admin role and assign existing permissions
        $admin = Role::create(['name' => 'admin']);

        $admin->givePermissionTo('edit teams');
        $admin->givePermissionTo('delete teams');
        $admin->givePermissionTo('create teams');
        $admin->givePermissionTo('view teams');

        $admin->givePermissionTo('edit projects');
        $admin->givePermissionTo('delete projects');
        $admin->givePermissionTo('create projects');
        $admin->givePermissionTo('view projects');

        $admin->givePermissionTo('edit projects teams');
        $admin->givePermissionTo('delete projects teams');
        $admin->givePermissionTo('create projects teams');
        $admin->givePermissionTo('view projects teams');

        $admin->givePermissionTo('edit tasks');
        $admin->givePermissionTo('delete tasks');
        $admin->givePermissionTo('create tasks');
        $admin->givePermissionTo('view tasks');

        $admin->givePermissionTo('edit tasks comments');
        $admin->givePermissionTo('delete tasks comments');
        $admin->givePermissionTo('create tasks comments');
        $admin->givePermissionTo('view tasks comments');

        $admin->givePermissionTo('edit tasks progress');
        $admin->givePermissionTo('delete tasks progress');
        $admin->givePermissionTo('create tasks progress');
        $admin->givePermissionTo('view tasks progress');

        $editor = Role::create(['name' => 'editor']);
        $editor->givePermissionTo('view teams');

        $editor->givePermissionTo('view projects');

        $editor->givePermissionTo('edit tasks');
        $editor->givePermissionTo('create tasks');
        $editor->givePermissionTo('delete tasks');
        $editor->givePermissionTo('view tasks');

        $editor->givePermissionTo('edit tasks comments');
        $editor->givePermissionTo('create tasks comments');
        $editor->givePermissionTo('delete tasks comments');
        $editor->givePermissionTo('view tasks comments');

        $editor->givePermissionTo('edit tasks progress');
        $editor->givePermissionTo('create tasks progress');
        $editor->givePermissionTo('delete tasks progress');
        $editor->givePermissionTo('view tasks progress');

        Role::create(['name' => 'super-admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

    }
}
