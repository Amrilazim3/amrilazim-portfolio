<?php

namespace App\Http\Controllers;

use App\Http\Resources\CertificationResource;
use App\Http\Resources\ProjectResource;
use App\Http\Resources\SkillResource;
use App\Models\Certification;
use App\Models\Project;
use App\Models\Skill;
use Illuminate\Http\Request;
use Inertia\Inertia;

class WelcomeController extends Controller
{
    public function welcome()
    {
        $skills = SkillResource::collection(Skill::all());
        $projects = ProjectResource::collection(Project::with('skill')->get());
        $certifications = CertificationResource::collection(Certification::completed()->get());

        return Inertia::render('Welcome', compact('skills', 'projects', 'certifications'));
    }
}
