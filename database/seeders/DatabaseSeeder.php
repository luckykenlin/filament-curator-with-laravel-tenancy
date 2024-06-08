<?php

namespace Database\Seeders;

use App\Models\Tenant;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $tenant1 = Tenant::create(['id' => 'foo']);

        $tenant1->domains()->create(['domain' => 'foo']);

        Tenant::all()->runForEach(function () {
            User::factory()->create(['email' => 'test@gmail.com']);
        });
    }
}
