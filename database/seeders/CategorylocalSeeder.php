<?php

namespace Database\Seeders;

use App\Models\Categorylocal;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorylocalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categorylocal::factory()->create([
            'title' => 'Інші',
        ]);
    }
}
