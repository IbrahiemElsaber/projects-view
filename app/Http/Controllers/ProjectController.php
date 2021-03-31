<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;


class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showProjects(Task $task)
    {
        $projects = Project::with('user')->with('task')
            ->orderBy('id', 'ASC')
            ->paginate(15);

        return view('project')
            ->with('projects', $projects)
            ->with('taskPercentage', $task->getDoneTasksPercentage());
    }
}
