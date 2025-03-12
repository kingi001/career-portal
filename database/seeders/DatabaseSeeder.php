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
        // User::factory(10)->create();
         // Seed Ethnicities
         $ethnicities = [
            'Kikuyu', 'Luo', 'Luhya', 'Kalenjin', 'Kamba', 'Meru', 'Somali',
            'Mijikenda', 'Maasai', 'Turkana', 'Embu', 'Taita', 'Kisii', 'Kurya',
            'Borana', 'Teso', 'Rendille', 'Samburu', 'Gabbra', 'Swahili', 'Other'
        ];
        foreach ($ethnicities as $ethnicity) {
            DB::table('ethnicities')->insert(['ethnicity_name' => $ethnicity]);
        }

         // Seed All Counties
         $counties = [
            ['id' => 1, 'county_name' => 'Mombasa'],
            ['id' => 2, 'county_name' => 'Kwale'],
            ['id' => 3, 'county_name' => 'Kilifi'],
            ['id' => 4, 'county_name' => 'Tana River'],
            ['id' => 5, 'county_name' => 'Lamu'],
            ['id' => 6, 'county_name' => 'Taita Taveta'],
            ['id' => 7, 'county_name' => 'Garissa'],
            ['id' => 8, 'county_name' => 'Wajir'],
            ['id' => 9, 'county_name' => 'Mandera'],
            ['id' => 10, 'county_name' => 'Marsabit'],
            ['id' => 11, 'county_name' => 'Isiolo'],
            ['id' => 12, 'county_name' => 'Meru'],
            ['id' => 13, 'county_name' => 'Tharaka Nithi'],
            ['id' => 14, 'county_name' => 'Embu'],
            ['id' => 15, 'county_name' => 'Kitui'],
            ['id' => 16, 'county_name' => 'Machakos'],
            ['id' => 17, 'county_name' => 'Makueni'],
            ['id' => 18, 'county_name' => 'Nyandarua'],
            ['id' => 19, 'county_name' => 'Nyeri'],
            ['id' => 20, 'county_name' => 'Kirinyaga'],
            ['id' => 21, 'county_name' => 'Muranga'],
            ['id' => 22, 'county_name' => 'Kiambu'],
            ['id' => 23, 'county_name' => 'Turkana'],
            ['id' => 24, 'county_name' => 'West Pokot'],
            ['id' => 25, 'county_name' => 'Samburu'],
            ['id' => 26, 'county_name' => 'Trans Nzoia'],
            ['id' => 27, 'county_name' => 'Uasin Gishu'],
            ['id' => 28, 'county_name' => 'Elgeyo Marakwet'],
            ['id' => 29, 'county_name' => 'Nandi'],
            ['id' => 30, 'county_name' => 'Baringo'],
            ['id' => 31, 'county_name' => 'Laikipia'],
            ['id' => 32, 'county_name' => 'Nakuru'],
            ['id' => 33, 'county_name' => 'Narok'],
            ['id' => 34, 'county_name' => 'Kajiado'],
            ['id' => 35, 'county_name' => 'Kericho'],
            ['id' => 36, 'county_name' => 'Bomet'],
            ['id' => 37, 'county_name' => 'Kakamega'],
            ['id' => 38, 'county_name' => 'Vihiga'],
            ['id' => 39, 'county_name' => 'Bungoma'],
            ['id' => 40, 'county_name' => 'Busia'],
            ['id' => 41, 'county_name' => 'Siaya'],
            ['id' => 42, 'county_name' => 'Kisumu'],
            ['id' => 43, 'county_name' => 'Homa Bay'],
            ['id' => 44, 'county_name' => 'Migori'],
            ['id' => 45, 'county_name' => 'Kisii'],
            ['id' => 46, 'county_name' => 'Nyamira'],
            ['id' => 47, 'county_name' => 'Nairobi'],
        ];
       DB::table('counties')->insert($counties);

        // Seed Subcounties of Mombasa, Nairobi, Kilifi
        $sub_counties = [
            // Mombasa
            ['id' => 1, 'county_id' => 1, 'subcounty_name' => 'Changamwe'],
            ['id' => 2, 'county_id' => 1, 'subcounty_name' => 'Jomvu'],
            ['id' => 3, 'county_id' => 1, 'subcounty_name' => 'Likoni'],
            ['id' => 4, 'county_id' => 1, 'subcounty_name' => 'Nyali'],
            ['id' => 5, 'county_id' => 1, 'subcounty_name' => 'Mvita'],
            ['id' => 6, 'county_id' => 1, 'subcounty_name' => 'Kisauni'],

            // Nairobi
            ['id' => 7, 'county_id' => 47, 'subcounty_name' => 'Westlands'],
            ['id' => 8, 'county_id' => 47, 'subcounty_name' => 'Dagoretti North'],
            ['id' => 9, 'county_id' => 47, 'subcounty_name' => 'Dagoretti South'],
            ['id' => 10, 'county_id' => 47, 'subcounty_name' => 'Langata'],
            ['id' => 11, 'county_id' => 47, 'subcounty_name' => 'Embakasi East'],

            // Kilifi
            ['id' => 12, 'county_id' => 3, 'subcounty_name' => 'Kilifi North'],
            ['id' => 13, 'county_id' => 3, 'subcounty_name' => 'Kilifi South'],
            ['id' => 14, 'county_id' => 3, 'subcounty_name' => 'Malindi'],
            ['id' => 15, 'county_id' => 3, 'subcounty_name' => 'Magarini'],
        ];
        DB::table('sub_counties')->insert($sub_counties);

        // Seed Wards of Jomvu, Changamwe, and Likoni (Mombasa)
        $wards = [
            // Jomvu
            ['id' => 1, 'sub_county_id' => 2, 'ward_name' => 'Mikindani'],
            ['id' => 2, 'sub_county_id' => 2, 'ward_name' => 'Jomvu Kuu'],
            ['id' => 3, 'sub_county_id' => 2, 'ward_name' => 'Miritini'],

            // Changamwe
            ['id' => 4, 'sub_county_id' => 1, 'ward_name' => 'Port Reitz'],
            ['id' => 5, 'sub_county_id' => 1, 'ward_name' => 'Changamwe'],
            ['id' => 6, 'sub_county_id' => 1, 'ward_name' => 'Chaani'],

            // Likoni
            ['id' => 7, 'sub_county_id' => 3, 'ward_name' => 'Mtongwe'],
            ['id' => 8, 'sub_county_id' => 3, 'ward_name' => 'Likoni'],
            ['id' => 9, 'sub_county_id' => 3, 'ward_name' => 'Shika Adabu'],
        ];
        DB::table('wards')->insert($wards);

         // Seed User Khamis
         User::create([
            'name' => 'Khamis Kingi Bahati',
            'email' => 'kingikhamis518@gmail.com',
            'password' => Hash::make('set2pass'),
        ]);

        $this->command->info('Database seeded successfully!');



        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
