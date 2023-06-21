<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use Illuminate\Support\Str;
use App\Helpers\FunctionHelper;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $projects = Project::all();

      return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $project = null;
      $title = 'Add a new Project';
      $method = 'POST';
      $route = route('admin.project.store');
      $src = asset('storage/uploads/img-placeholder.png');


      return view('admin.projects.edit-create', compact('project', 'title', 'method', 'route', 'src'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
        $form_data = $request->all();
        $form_data['slug'] = FunctionHelper::generateUniqueSlug($form_data['title'], new Project());

        if ($request->hasFile('preview')) {

          $form_data = FunctionHelper::saveImage('preview', $request, $form_data, new Project());

        }

        $new_project = new Project();
        $new_project->fill($form_data);
        $new_project->save();

        return redirect()->route('admin.project.show', $new_project);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
      $title = 'Edit ' . ucwords($project->title);
      $method = 'PUT';
      $route = route('admin.project.update', $project);
      $src = asset('storage/' . $project->image_path);

      return view('admin.projects.edit-create', compact('project', 'title', 'method', 'route', 'src'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectRequest $request, Project $project)
    {
        $form_data = $request->all();
        if ($form_data['title'] != $project->title) {
          $form_data['slug'] = FunctionHelper::generateUniqueSlug($form_data['title'], new Project());
        } else {
          $form_data['slug'] = $project->slug;
        }

        if ($request->hasFile('preview')) {

          if($project->image_path) {
            Storage::disk('public')->delete($project->image_path);
          }

          $form_data = FunctionHelper::saveImage('preview', $request, $form_data, new Project());

        }

        $project->update($form_data);

        return redirect()->route('admin.project.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
      if($project->image_path) {
        Storage::disk('public')->delete($project->image_path);
      }

      $project->delete();

      return redirect()->route('admin.project.index')->with('deleted', 'The project has been deleted');
    }
}
