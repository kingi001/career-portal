<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EthnicitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Check if the ethnicities table is empty
         if (DB::table('ethnicities')->count() > 0) {
            $this->command->info('Ethnicities table already seeded. Skipping...');
            return;
        }

        $ethnicities = [
            'Kikuyu', 'Luo', 'Luhya', 'Kalenjin', 'Kamba', 'Meru', 'Somali',
            'Mijikenda', 'Maasai', 'Turkana', 'Embu', 'Taita', 'Kisii', 'Kurya',
            'Borana', 'Teso', 'Rendille', 'Samburu', 'Gabbra', 'Swahili', 'Other'
        ];
        foreach ($ethnicities as $ethnicity) {
            DB::table('ethnicities')->insert(['ethnicity_name' => $ethnicity]);
        }

    }
}
