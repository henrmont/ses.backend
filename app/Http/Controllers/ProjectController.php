<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Exception;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function create(Request $request) {
        try {
            $project = Project::create([
                'name' => $request->name,
                'description' => $request->description,
            ]);

            return response()->json([
                "message" => "Projeto criado com sucesso"
            ]);
        } catch (Exception $e) {
            return response()->json([
                "message" => "Erro no sistema"
            ]);
        }
    }

    public function getAll() {
        try {
            $projects = Project::orderBy('id', 'asc')->get();

            return response()->json([
                "data" => $projects
            ]);
        } catch (Exception $e) {
            return response()->json([
                "message" => "Erro no sistema"
            ]);
        }
    }

    public function get($id) {
        try {
            $project = Project::find($id);

            return response()->json([
                "data" => $project
            ]);
        } catch (Exception $e) {
            return response()->json([
                "message" => "Erro no sistema"
            ]);
        }
    }

    public function update(Request $request) {
        try {
            $project = Project::find($request->id);

            $project->name = $request->name;
            $project->description = $request->description;

            $project->save();

            return response()->json([
                "message" => "Projeto atualizado com sucesso"
            ]);
        } catch (Exception $e) {
            return response()->json([
                "message" => "Erro no sistema"
            ]);
        }
    }

    public function logoUpdate(Request $request) {
        try {
            $project = Project::find($request->id);

            $project->logo = $request->logo;

            $project->save();

            return response()->json([
                "message" => "Logo do projeto atualizado com sucesso"
            ]);
        } catch (Exception $e) {
            return response()->json([
                "message" => "Erro no sistema"
            ]);
        }
    }
}
