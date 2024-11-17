<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $roles = [
            [
                'name' => 'Super Admin',
                'role' => 'super_admin',
                'description' => 'Super admin with full access',
            ],
            [
                'name' => 'User',
                'role' => 'user',
                'description' => 'User accessable with permissions and routes',
            ],
            [
                'name' => 'Admin',
                'role' => 'admin',
                'description' => 'Admin accessable with permissions and routes',
            ],
        ];
        foreach ($roles as $role) {
            Role::create($role);
        }

        // Create user seeds
        User::create([
            'name' => 'Super Admin',
            'email' => 'super@admin.com',
            'password' => Hash::make('Super@admin'),
            'role_id' => 1,
        ]);

        $permissions = [
            [
                'name' => 'Read',
                'description' => 'Can access read info like table',
            ],
            [
                'name' => 'Write',
                'description' => 'Can add new record',
            ],
            [
                'name' => 'Modify',
                'description' => 'Can modify data existing record',
            ],
            [
                'name' => 'View',
                'description' => 'Can view data existing record',
            ],
            [
                'name' => 'Remove',
                'description' => 'Can remove data existing record',
            ],
        ];
        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission['name'],
                'permission' => lowerAnd_($permission['name']),
                'description' => $permission['description'],
            ]);
        }
    }
}
