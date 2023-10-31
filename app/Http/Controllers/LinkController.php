<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Exception;
use Illuminate\Http\Request;

class LinkController extends Controller
{

    public function getLinks($id) {
        try {
            $links = Link::where('project_id', $id)->get();

            return response()->json([
                "data" => $links
            ]);
        } catch (Exception $e) {
            return response()->json([
                "message" => "Erro no sistema"
            ]);
        }
    }

    public function addLink(Request $request) {
        try {
            $link = Link::create([
                'project_id' => $request->project_id,
                'url' => $request->url,
                'description' => $request->description,
            ]);

            return response()->json([
                "message" => "Link adicionado ao projeto"
            ]);
        } catch (Exception $e) {
            return response()->json([
                "message" => "Erro no sistema"
            ]);
        }
    }

    public function deleteLink($id) {
        try {
            $link = Link::find($id)->delete();

            return response()->json([
                "message" => "Link excluído do projeto"
            ]);
        } catch (Exception $e) {
            return response()->json([
                "message" => "Erro no sistema"
            ]);
        }
    }
}
