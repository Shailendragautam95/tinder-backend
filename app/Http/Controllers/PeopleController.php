<?php

namespace App\Http\Controllers;

use App\Models\People;
use App\Models\Like;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;

class PeopleController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/people",
     *     summary="Get list of all people",
     *     tags={"People"},
     *     @OA\Response(
     *         response=200,
     *         description="List of people"
     *     )
     * )
     */

    public function index(Request $request)
    {
        $userId = 1; // static user for assignment

        // People that user already liked or disliked
        $excluded = Like::where('from_person_id', $userId)
                        ->pluck('to_person_id');

        $people = People::where('id', '!=', $userId)
                        ->whereNotIn('id', $excluded)
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
