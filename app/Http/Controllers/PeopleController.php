<?php

namespace App\Http\Controllers;

use App\Models\People;
use App\Models\Like;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;

class PeopleController extends Controller
{
    public function index(Request $request)
    {
        $userId = 1; // static user for now

        // People the user already liked or disliked
        $blockedIds = Like::where('from_person_id', $userId)
                          ->pluck('to_person_id');

        // Return only profiles NOT liked or disliked by this user
        $people = People::where('id', '!=', $userId)
                        ->whereNotIn('id', $blockedIds)
                        ->paginate(10);

        return response()->json($people);
    }

    // Liked People List
    public function likedList()
    {
        $userId = 1;

        $likedIds = Like::where('from_person_id', $userId)
                        ->where('is_liked', true)
                        ->pluck('to_person_id');

        $likedPeople = People::whereIn('id', $likedIds)->get();

        return response()->json($likedPeople);
    }
}
