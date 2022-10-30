<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::find(1); 
        $chef = Role::find(2);
        $waiter = Role::find(3);
        $cashier = Role::find(4);

        Permission::create(['name' => 'category.create'])->syncRoles([$admin]);
        Permission::create(['name' => 'category.edit'])->syncRoles([$admin]);
        Permission::create(['name' => 'category.show'])->syncRoles([$admin, $chef]);
        Permission::create(['name' => 'category.delete'])->syncRoles([$admin]);

        Permission::create(['name' => 'dish.create'])->syncRoles([$admin, $chef]);
        Permission::create(['name' => 'dish.edit'])->syncRoles([$admin, $chef]);
        Permission::create(['name' => 'dish.show'])->syncRoles([$admin, $chef, $waiter]);
        Permission::create(['name' => 'dish.delete'])->syncRoles([$admin, $chef]);

        Permission::create(['name' => 'product.create'])->syncRoles([$admin, $chef]);
        Permission::create(['name' => 'product.edit'])->syncRoles([$admin, $chef]);
        Permission::create(['name' => 'product.show'])->syncRoles([$admin, $chef]);
        Permission::create(['name' => 'product.delete'])->syncRoles([$admin, $chef]);

        Permission::create(['name' => 'customer.create'])->syncRoles([$admin]);
        Permission::create(['name' => 'customer.edit'])->syncRoles([$admin]);
        Permission::create(['name' => 'customer.show'])->syncRoles([$admin, $chef]);
        Permission::create(['name' => 'customer.delete'])->syncRoles([$admin]);

        Permission::create(['name' => 'order.create'])->syncRoles([$admin, $waiter]);
        Permission::create(['name' => 'order.edit'])->syncRoles([$admin, $waiter]);
        Permission::create(['name' => 'order.show'])->syncRoles([$admin, $waiter]);
        Permission::create(['name' => 'order.delete'])->syncRoles([$admin, $waiter]);
    }
}
