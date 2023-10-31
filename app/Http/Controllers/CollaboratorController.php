<?php

namespace App\Http\Controllers;

use App\Models\Collaborator;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class CollaboratorController extends Controller
{

    public function getCollaborators($id) {
        try {
            $collaborators = Collaborator::with('user')->where('project_id', $id)->get();

            return response()->json([
                "data" => $collaborators
            ]);
        } catch (Exception $e) {
            return response()->json([
                "message" => "Erro no sistema"
            ]);
        }
    }

    public function getAvailableCollaborators($id) {
        try {
            $collaborators = User::with('collaborator')->whereDoesntHave('collaborator',function($q) use ($id) {
                $q->where('project_id', $id);
            })->get();

            return response()->json([
                "data" => $collaborators
            ]);
        } catch (Exception $e) {
            return response()->json([
                "message" => "Erro no sistema"
            ]);
        }
    }

    public function deleteCollaborator($id) {
        try {
            $collaborator = Collaborator::find($id)->delete();

            return response()->json([
                "message" => "Colaborador excluído do projeto"
            ]);
        } catch (Exception $e) {
            return response()->json([
                "message" => "Erro no sistema"
            ]);
        }
    }

    public function addCollaborator(Request $request) {
        try {
            $collaborator = Collaborator::create([
                'project_id' => $request->project_id,
                'user_id' => $request->user_id,
            ]);

            return response()->json([
                "message" => "Colaborador adicionado ao projeto"
            ]);
        } catch (Exception $e) {
            return response()->json([
                "message" => "Erro no sistema"
            ]);
        }
    }
}
