<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $projects = config('projects');
      // dd($projects);
      foreach ($projects as $project) {
        $new_project = new Project();
        $new_project->title = $project['title'];
        $new_project->slug = Project::generateSlug($new_project->title);
        $new_project->preview = $project['preview'];
        $new_project->summary = $project['summary'];
        $new_project->languages = $project['languages'];
        $new_project->link = $project['link'];
        $new_project->save();
      }
    }
}
