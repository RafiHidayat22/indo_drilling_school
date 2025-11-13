<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $query = Project::published()->orderBy('order', 'desc')->orderBy('created_at', 'desc');



        // Filter by status
        if ($request->has('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        $projects = $query->paginate(9);
        $featuredProjects = Project::published()->featured()->limit(3)->get();

        return view('projects.index', compact('projects', 'featuredProjects'));
    }

    public function show($slug)
    {
        $project = Project::where('slug', $slug)->published()->firstOrFail();
        $relatedProjects = Project::published()
            ->where('id', '!=', $project->id)
            ->where('category', $project->category)
            ->limit(3)
            ->get();

        return view('projects.show', compact('project', 'relatedProjects'));
    }
}