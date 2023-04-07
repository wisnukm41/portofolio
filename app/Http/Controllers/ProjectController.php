<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Project;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function public(): Response
    {
        $props = [
            'title' => 'Home ',
            'projects' => Project::where('priority', '!=', null)->get(),
        ];

        return Inertia::render('Public/Index', $props);
    }

    public function projects(): Response
    {
        $projects = Project::paginate(2)->through(function ($item) {
            return [
                'id' => $item->id,
                'name' => $item->name,
                'slug' => $item->slug,
                'type' => $item->type,
                'tags' => $item->tags,
                'demo' => $item->demo,
                'git' => $item->git,
                'short' => $item->short,
                'content' => $item->content,
                'created_at' => $item->created_at,
            ];
        });


        $props = [
            'title' => 'Projects ',
            'projects' => $projects,
        ];

        return Inertia::render('Public/Projects', $props);
    }

    public function admin(): Response
    {
        $props = [
            'title' => 'Dashboard ',
            'projects' => Project::orderBy('name')->get(),
        ];

        return Inertia::render('Dashboard', $props);
    }

    public function create(): Response
    {
        $props = [
            'title' => 'Add Project '
        ];

        return Inertia::render('AddProject', $props);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required',
            'tags' => 'required|string|max:255',
            'demo' => 'nullable|string|max:255',
            'git' => 'nullable|string|max:255',
            'short' => 'required|string|max:200',
            'content' => 'required|string',
            'priority' => 'nullable|numeric'
        ]);

        $project = Project::create($validated);

        $project->slug = Str::slug($project->name);
        $project->save();

        return redirect(route('dashboard'));
    }

    public function show($slug): Response
    {
        $project = Project::where('slug', $slug)->firstOrFail();
        $images = Image::where('project_id', $project->id)->orderBy('priority', 'desc')->get();

        $props = [
            'title' => $project->name . ' ',
            'project' => $project,
            'images' => $images
        ];

        return Inertia::render('Public/ShowProject', $props);
    }

    public function edit(Project $project)
    {
        $props = [
            'title' => 'Edit Project ',
            'project' => $project
        ];

        return Inertia::render('EditProject', $props);
    }

    public function update(Request $request, Project $project): RedirectResponse
    {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required',
            'tags' => 'required|string|max:255',
            'demo' => 'nullable|string|max:255',
            'git' => 'nullable|string|max:255',
            'short' => 'required|string|max:200',
            'content' => 'required|string',
            'priority' => 'nullable|numeric'
        ]);

        $project->update($validated);

        return redirect(route('dashboard'));
    }

    public function destroy(Project $project): RedirectResponse
    {

        $project->delete();

        return redirect(route('dashboard'));
    }

    public function image(Project $project): Response
    {

        $props = [
            'title' => 'Project Image ',
            'project' => $project,
            'images' => $project->images,
        ];

        return Inertia::render('ImageProject', $props);
    }

    public function image_store(Project $project, Request $request): RedirectResponse
    {
        $request->validate(
            [
                'image' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
                'order' => 'nullable|numeric',
            ]
        );

        $image_path = '';

        if ($request->hasFile('image')) {
            $image_path = $request->file('image')->store('image', 'public');
        }

        Image::create([
            'image' => $image_path,
            'project_id' => $project->id,
            'priority' => $request->input('priority')
        ]);

        return redirect(route('image', $project->id));
    }

    public function image_delete(Project $project, Image $image): RedirectResponse
    {
        $image->delete();

        Storage::disk('public')->delete($image->image);

        return redirect(route('image', $project->id));
    }
}
