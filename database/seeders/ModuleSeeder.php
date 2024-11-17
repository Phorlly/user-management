<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'segment' => 'dashboard',
                'name' => 'dashboard',
                'icon' => 'ri-dashboard-3-fill',
                'text' => 'Dashboard',
            ],
            [
                'segment' => 'users',
                'name' => 'users.index',
                'icon' => 'ri-user-3-fill',
                'text' => 'Users',
            ],
            [
                'segment' => 'roles',
                'name' => 'roles.index',
                'icon' => 'ri-folder-user-fill',
                'text' => 'Roles',
            ],
            [
                'segment' => 'permissions',
                'name' => 'permissions.index',
                'icon' => 'ri-user-voice-fill',
                'text' => 'Permissions',
            ],
            [
                'segment' => 'permission-roles',
                'name' => 'permission-roles.index',
                'icon' => 'ri-folder-shared-fill',
                'text' => 'Permission to Roles',
            ],
            [
                'segment' => 'permission-routes',
                'name' => 'permission-routes.index',
                'icon' => 'ri-install-fill',
                'text' => 'Permission to Route',
            ],
            [
                'segment' => 'modules',
                'name' => 'modules.index',
                'icon' => 'ri-dashboard-fill',
                'text' => 'Modules',
            ],
        ];

        foreach ($items as $item) {
            Module::create([
                'segment' => $item['segment'],
                'name' => $item['name'],
                'icon' => $item['icon'],
                'text' => $item['text'],
            ]);
        }
    }
}
