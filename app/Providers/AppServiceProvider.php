<?php

namespace App\Providers;
namespace App\Models;

use Illuminate\Support\ServiceProvider;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        // Check if the role already exists
        if (!Role::where('name', 'admin')->exists()) {
            Role::create(['name' => 'admin']);
            Role::create(['name' => 'user']);
        }
        // Define roles


        // Define permissions
        Permission::create(['name' => 'edit articles']);
        Permission::create(['name' => 'publish articles']);

        // Assign permissions to roles
        Role::findByName('admin')->givePermissionTo(['edit articles', 'publish articles']);

        // Optionally, assign roles to users
        $user = App\Models\User::find(1);
        $user->assignRole('admin');

    }
}
