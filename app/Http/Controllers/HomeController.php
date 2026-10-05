<?php

namespace App\Http\Controllers;

use App\Models\Certification;
use App\Models\Experience;
use App\Models\Project;
use App\Models\Skill;

class HomeController extends Controller
{
    /**
     * Show the single-page portfolio.
     * We pull everything needed here and pass it to one view,
     * instead of each Blade component querying the database itself.
     * This keeps the data-fetching in one place and makes the page fast.
     */
    public function index()
    {
        $projects = Project::ordered()->get();

        // Group skills by category so the Blade view can loop category-by-category
        $skills = Skill::ordered()->get()->groupBy('category');

        $experiences = Experience::ordered()->get();

        $certifications = Certification::ordered()->get();

        return view('home', compact('projects', 'skills', 'experiences', 'certifications'));
    }
}
