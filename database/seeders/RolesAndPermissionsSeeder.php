<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create permissions
        $permissions = [
            //users
            'view users dashboard',
            'view personal details',
            'update personal details',

            //education
            'manage education',
            'view education',
            'add education',
            'update education',
            'delete education',

            //qualifications
            'manage qualifications',
            'view qualifications',
            'add qualifications',
            'update qualifications',
            'delete qualifications',

            //membership
            'manage memberships',
            'view memberships',
            'add memberships',
            'update memberships',
            'delete memberships',

            //employment
            'manage employments',
            'view employments',
            'add employments',
            'update employments',
            'delete employments',

            //referee
            'manage referees',
            'view referees',
            'add referees',
            'update referees',
            'delete referees',

            //documents upload
            'manage documents',
            'view uploaded documents',
            'upload documents',
            'delete documents',

            //roles
            'manage roles',
            'view roles',
            'create roles',
            'edit roles',
            'delete roles',

            //permissions
            'assign permissions',

            //users
            'manage users',
            'view users',
            'create users',
            'edit users',
            'delete users',

            //jobs
            'manage jobs',
            'view job listings',
            'view job applied',
            'create jobs',
            'edit jobs',
            'delete jobs',

            //applications
            'manage applications',
            'submit applications',
            'view applications status',

            //profile
            'view profile',
            'update profile',
            'delete profile',
            'update password',


        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Create roles and assign existing permissions
        $superAdmin = Role::firstOrCreate(['name' => 'super-admin']);
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $applicant = Role::firstOrCreate(['name' => 'applicant']);
        $hiringManager = Role::firstOrCreate(['name' => 'hiring-manager']);
        $hr = Role::firstOrCreate(['name' => 'hr']);
        $interviewer = Role::firstOrCreate(['name' => 'interviewer']);

        // Assign permissions to roles
        $superAdmin->syncPermissions($permissions);
        $admin->syncPermissions([
            'view users dashboard',
            'view personal details',
            'update personal details',
            'manage education',
            'manage qualifications',
            'manage memberships',
            'manage employments',
            'manage referees',
            'manage documents',
            'manage roles',
            'assign permissions',
            'manage users',
            'manage jobs',
            'manage applications',
        ]);
        $applicant->syncPermissions([
            'view personal details',
            'update personal details',
            'manage education',
            'manage qualifications',
            'manage memberships',
            'manage employments',
            'manage referees',
            'manage documents',
            'view job listings',
            'submit applications',
            'view applications status',
        ]);
        $hiringManager->syncPermissions([
            'view job listings',
            'view applications status',
            'manage applications',
        ]);
        $hr->syncPermissions([
            'view job listings',
            'view applications status',
            'manage applications',
        ]);
        $interviewer->syncPermissions([
            'view job listings',
            'view applications status',
            'manage applications',
        ]);
        $this->command->info('Roles and permissions seeded successfully !');
    }
}
