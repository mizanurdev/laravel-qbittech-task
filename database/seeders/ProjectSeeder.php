<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::create(['name' => 'Website Redesign', 'description' => 'Redesign the main website with modern UI.']);
        Project::create(['name' => 'Mobile App Development', 'description' => 'Develop a mobile app for e-commerce.']);
        Project::create(['name' => 'SEO Optimization', 'description' => 'Optimize the website for search engines.']);
        Project::create(['name' => 'Database Migration', 'description' => 'Migrate the database to a more scalable platform.']);
        Project::create(['name' => 'Social Media Campaign', 'description' => 'Launch a new social media marketing campaign.']);
    }
}
