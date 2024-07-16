<?php

namespace App\Services\Task;

use App\Models\Task;
use Illuminate\Support\Facades\Response;

class TasksExportService
{
    public static function exportCSV()
    {
        $tasks = Task::get();

        $filename = 'tasks.csv';

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];

        $handle = fopen('php://output', 'w');
        fputcsv($handle, ['Title', 'Description']);

        foreach ($tasks as $task) {
            fputcsv($handle, [
                $task->title,
                $task->description
            ]);
        }

        fclose($handle);

        return Response::make('', 200, $headers);
    }
}
