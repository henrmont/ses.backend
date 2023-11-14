<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Exception;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function getAll() {
        try {
            $tb1 = Task::where('board',1)->orderBy('updated_at', 'desc')->get();
            $tb2 = Task::where('board',2)->orderBy('updated_at', 'desc')->get();
            $tb3 = Task::where('board',3)->orderBy('updated_at', 'desc')->get();
            $tb4 = Task::where('board',4)->orderBy('updated_at', 'desc')->get();
            $tb5 = Task::where('board',5)->orderBy('updated_at', 'desc')->get();

            return response()->json([
                "data" => [$tb1,$tb2,$tb3,$tb4,$tb5]
            ]);
        } catch (Exception $e) {
            return response()->json([
                "message" => "Erro no sistema"
            ]);
        }
    }

    public function getTask($id) {
        try {
            $task = Task::with(['project'])->find($id);

            return response()->json([
                "data" => $task
            ]);
        } catch (Exception $e) {
            return response()->json([
                "message" => "Erro no sistema"
            ]);
        }
    }

    public function changeBoard(Request $request, $board) {
        try {
            $task = Task::find($request->id);
            $task->board = $board;
            $task->updated_at = now();

            $task->save();

            return response()->json([
                "message" => "Task movida de quadro"
            ]);
        } catch (Exception $e) {
            return response()->json([
                "message" => "Erro no sistema"
            ]);
        }
    }

    public function newTask(Request $request, $board) {
        try {
            $task = Task::create([
                'project_id' => $request->project_id,
                'name' => $request->name,
                'start_at' => $request->start_at,
                'end_at' => $request->end_at,
                'board' => $request->board,
                'disabled'=> $request->disabled,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return response()->json([
                "message" => "Task criada com sucesso"
            ]);
        } catch (Exception $e) {
            return response()->json([
                "message" => "Erro no sistema"
            ]);
        }
    }

    public function getBoardTasks($board) {
        try {
            $tasks = Task::with(['project'])->where('board',$board)->orderBy('updated_at', 'desc')->get();

            return response()->json([
                "data" => $tasks
            ]);
        } catch (Exception $e) {
            return response()->json([
                "message" => "Erro no sistema"
            ]);
        }
    }

    public function deleteTask($id) {
        try {
            $task = Task::find($id)->delete();

            return response()->json([
                "message" => "Task deletada com sucesso"
            ]);
        } catch (Exception $e) {
            return response()->json([
                "message" => "Erro no sistema"
            ]);
        }
    }

    public function editTask(Request $request) {
        try {
            $task = Task::find($request->id);

            $task->project_id = $request->project_id;
            $task->name = $request->name;
            $task->start_at = $request->start_at;
            $task->end_at = $request->end_at;
            $task->board = $request->board;
            $task->disabled = $request->disabled;
            $task->updated_at = now();

            $task->save();

            return response()->json([
                "message" => "Task editada com sucesso"
            ]);
        } catch (Exception $e) {
            return response()->json([
                "message" => "Erro no sistema"
            ]);
        }
    }
}
