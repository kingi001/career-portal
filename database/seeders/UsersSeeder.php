<?php

namespace Database\Seeders;

use App\Models\User; // Update if you're using a different User model namespace
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Check if the users table is empty
        if (User::count() > 0) {
            $this->command->info('Users table already seeded. Skipping...');
            return;
        }
        // Create the user
        $user = User::firstOrCreate(
            ['email' => 'kingikhamis518@gmail.com'],
            [
                'name' => 'Khamis Kingi',
                'password' => Hash::make('set2pass'),
            ]
        );

        // Ensure the role exists
        $role = Role::firstOrCreate(['name' => 'super-admin']);

        // Assign the role to the user
        $user->assignRole($role);

        $this->command->info('Super Admin user Seeded successfully.');
    }
}
