<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         // Seed Ethnicities
            $this->call(EthnicitiesSeeder::class);
            // Seed Counties, Subcounties and Wards
            $this->call(CountiesSubcountiesandWards::class);
            // Seed Roles and Permissions
            $this->call(RolesAndPermissionsSeeder::class);
            // Seed Users
            $this->call(UsersSeeder::class);
    }

}
