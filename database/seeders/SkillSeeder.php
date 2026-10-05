<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    public function run(): void
    {
        $skills = [
            // Frontend
            ['name' => 'HTML5', 'category' => 'frontend', 'icon' => 'bi-filetype-html', 'level' => 'proficient'],
            ['name' => 'CSS3', 'category' => 'frontend', 'icon' => 'bi-filetype-css', 'level' => 'proficient'],
            ['name' => 'JavaScript', 'category' => 'frontend', 'icon' => 'bi-filetype-js', 'level' => 'comfortable'],
            ['name' => 'Bootstrap', 'category' => 'frontend', 'icon' => 'bi-bootstrap', 'level' => 'comfortable'],
            ['name' => 'Responsive Web Design', 'category' => 'frontend', 'icon' => 'bi-phone', 'level' => 'comfortable'],

            // Backend
            ['name' => 'Node.js', 'category' => 'backend', 'icon' => 'bi-hexagon', 'level' => 'comfortable'],
            ['name' => 'Express.js', 'category' => 'backend', 'icon' => 'bi-server', 'level' => 'comfortable'],
            ['name' => 'Laravel', 'category' => 'backend', 'icon' => 'bi-code-slash', 'level' => 'learning'],
            ['name' => 'PHP', 'category' => 'backend', 'icon' => 'bi-filetype-php', 'level' => 'learning'],
            ['name' => 'REST APIs', 'category' => 'backend', 'icon' => 'bi-diagram-3', 'level' => 'comfortable'],

            // Database
            ['name' => 'MongoDB', 'category' => 'database', 'icon' => 'bi-database', 'level' => 'comfortable'],
            ['name' => 'MySQL', 'category' => 'database', 'icon' => 'bi-database-fill', 'level' => 'learning'],

            // Tools
            ['name' => 'Git', 'category' => 'tools', 'icon' => 'bi-git', 'level' => 'comfortable'],
            ['name' => 'GitHub', 'category' => 'tools', 'icon' => 'bi-github', 'level' => 'comfortable'],
            ['name' => 'VS Code', 'category' => 'tools', 'icon' => 'bi-code-square', 'level' => 'proficient'],
            ['name' => 'Postman', 'category' => 'tools', 'icon' => 'bi-send', 'level' => 'comfortable'],

            // Exploring
            ['name' => 'Artificial Intelligence', 'category' => 'exploring', 'icon' => 'bi-cpu', 'level' => 'learning'],
            ['name' => 'Machine Learning', 'category' => 'exploring', 'icon' => 'bi-graph-up', 'level' => 'learning'],
            ['name' => 'Data Science', 'category' => 'exploring', 'icon' => 'bi-bar-chart', 'level' => 'learning'],
        ];

        foreach ($skills as $i => $skill) {
            Skill::updateOrCreate(
                ['name' => $skill['name']],
                array_merge($skill, ['sort_order' => $i])
            );
        }
    }
}
