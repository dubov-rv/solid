<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Task\TaskStoreRequest;
use App\Http\Requests\Backend\Task\TaskUpdateRequest;
use App\Models\Task;
use App\Services\Task\TasksExportService;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $tasks = Task::filter($request)->latest()->paginate(30);

        dd($tasks);
    }

    public function store(TaskStoreRequest $request)
    {
        $data = $request->validated();

        $task = Task::create($data);

        dd($task);
    }

    public function update(TaskUpdateRequest $request, Task $task)
    {
        $data = $request->validated();

        $task->update($data);

        dd($task);
    }

    public function destroy(Task $task)
    {
        $task->delete();

        dd('Task was deleted');
    }

    public function exportCSV()
    {
        TasksExportService::exportCSV();

        //dd('Task was exported');
    }
}
