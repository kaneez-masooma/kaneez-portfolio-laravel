<?php

namespace Database\Seeders;

use App\Models\Experience;
use Illuminate\Database\Seeder;

class ExperienceSeeder extends Seeder
{
    public function run(): void
    {
        $experiences = [
            [
                'type' => 'work',
                'role' => 'Video Editor',
                'organization' => 'Shuja Abro Photography & Films',
                'description' => 'Edited video content for a variety of creative projects, working closely with client requirements and project deadlines. Handled footage organization, editing, color and sound work, and delivered polished final videos while managing time across multiple projects.',
                'start_date' => '2025-12-05',
                'end_date' => null,
                'is_current' => true,
                'sort_order' => 1,
            ],
            [
                'type' => 'internship',
                'role' => 'Web Development Intern',
                'organization' => 'SafeX Solutions',
                'description' => 'Worked on landing page development, contributed to business lead research, deployed project updates via GitHub, and helped track outreach activity alongside general web development tasks.',
                'start_date' => '2026-07-10',
                'end_date' => '2026-09-25',
                'is_current' => false,
                'sort_order' => 2,
            ],

        ];

        foreach ($experiences as $experience) {
            Experience::updateOrCreate(
                ['role' => $experience['role'], 'organization' => $experience['organization']],
                $experience
            );
        }
    }
}