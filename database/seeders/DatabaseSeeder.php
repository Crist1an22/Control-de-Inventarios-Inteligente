<?php

namespace Database\Seeders;

<<<<<<< HEAD
=======
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
>>>>>>> 6de8615b9b9aac4f5bcf61efc0360250e0bd8c65
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
<<<<<<< HEAD
    public function run()
    {
        $this->call([
            UserSeeder::class,
            CategoriaSeeder::class,
=======
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
>>>>>>> 6de8615b9b9aac4f5bcf61efc0360250e0bd8c65
        ]);
    }
}
