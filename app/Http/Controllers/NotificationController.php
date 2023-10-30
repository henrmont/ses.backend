<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Exception;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function getNotifications($id) {
        try {
            $notifications = Notification::with('user')->where('project_id',$id)->orderBy('created_at','desc')->take(3)->get();

            return response()->json([
                "data" => $notifications
            ]);
        } catch (Exception $e) {
            return response()->json([
                "message" => "Erro no sistema"
            ]);
        }
    }

    public function getAllNotifications($id) {
        try {
            $notifications = Notification::with('user')->where('project_id',$id)->orderBy('created_at','desc')->get();

            return response()->json([
                "data" => $notifications
            ]);
        } catch (Exception $e) {
            return response()->json([
                "message" => "Erro no sistema"
            ]);
        }
    }
}
