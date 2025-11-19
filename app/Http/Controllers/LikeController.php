<?php

namespace App\Http\Controllers;

use App\Models\Like;

class LikeController extends Controller
{
    public function like($id)
    {
        $userId = 1; // static for assignment

        Like::updateOrCreate(
            ['from_person_id' => $userId, 'to_person_id' => $id],
            ['is_liked' => true]
        );

        return response()->json(['message' => 'Liked successfully']);
    }

    public function dislike($id)
    {
        $userId = 1;

        Like::updateOrCreate(
            ['from_person_id' => $userId, 'to_person_id' => $id],
            ['is_liked' => false]
        );

        return response()->json(['message' => 'Disliked successfully']);
    }
}
