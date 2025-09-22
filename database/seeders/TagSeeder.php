<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $tags = [
            'laravel',
            'authentication',
            'jwt',
            'api',
            'php',
            'backend',
            'web development',
            'frontend',
            'backend',
            'react',
        ];

        foreach ($tags as $tag) {
            Tag::create(['name' => $tag]);
        }
    }
}
