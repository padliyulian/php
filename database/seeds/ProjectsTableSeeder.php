<?php

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
        DB::table('projects')->truncate();
        DB::table('employee_project')->truncate();

        $project = Project::create(['project' => 'simplists.com', 'description' => 'website hotel finder and booking']);
        $project->employees()->attach([1,2,3,4,5,6,7]);

        $project = Project::create(['project' => 'spinalpedia.com', 'description' => 'website for community']);
        $project->employees()->attach([1,2,3,4,5,6]);

        $project = Project::create(['project' => 'starclinch.com', 'description' => 'website for artist management']);
        $project->employees()->attach([1,2,3,4,5]);

        $project = Project::create(['project' => 'lambangjaya.com', 'description' => 'website about company profile']);
        $project->employees()->attach([1,2,3,4,]);

        $project = Project::create(['project' => 'spm-starch.co.id', 'description' => 'website about company profile']);
        $project->employees()->attach([1,2,3]);

        $project = Project::create(['project' => 'avocado-tech.com', 'description' => 'website about company profile']);
        $project->employees()->attach([1,2]);
    }
}
