<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'title' => 'First Portfolio Project',
                'description' => 'A responsive personal portfolio website built to showcase my early web development skills and projects.',
                'tech_stack' => ['HTML', 'CSS', 'JavaScript'],
                'github_url' => 'https://github.com/kaneez-masooma/Portfolio-Website',
                'live_url' => 'https://kaneez-masooma.github.io/Portfolio-Website/',
                'is_featured' => true,
                'sort_order' => 1,
                'image_path' => 'projects/portfolio-v1.png', 
            ],
            [
                'title' => 'NexaRank – Premium SEO Agency Website',
                'description' => 'Premium SEO agency website with 3D-style visuals, GSAP animations, interactive case studies, and responsive design.',
                'tech_stack' => ['HTML5', 'CSS3', 'JavaScript', 'GSAP', 'ScrollTrigger', 'GitHub'],
                'github_url' => 'https://github.com/kaneez-masooma/SafeX-Wee4-WebDev', // TODO: add your repo link
                'live_url' => 'https://kaneez-masooma.github.io/SafeX-Wee4-WebDev/',
                'is_featured' => true,
                'sort_order' => 2,
                'image_path' => 'projects/nexa.png', 
            ],
            [
                'title' => 'SafeX Solutions – Cybersecurity Pricing Page',
                'description' => 'A responsive cybersecurity pricing page designed for SafeX Solutions, featuring modern pricing cards, monthly/yearly plan options, responsive layouts, and a clean professional UI.',
                'tech_stack' => ['HTML5', 'CSS3' , 'JavaScript'],
                'github_url' =>'https://github.com/kaneez-masooma/SafeX-Week1-WebDev', // TODO: add your repo link
                'live_url' => 'https://kaneez-masooma.github.io/SafeX-Week1-WebDev/',
                'is_featured' => true,
                'sort_order' => 3,
                'image_path' => 'projects/security.png', 
            ],
           
        ];

        foreach ($projects as $project) {
            Project::updateOrCreate(
                ['slug' => Str::slug($project['title'])],
                array_merge($project, ['slug' => Str::slug($project['title'])])
            );
        }
    }
}
