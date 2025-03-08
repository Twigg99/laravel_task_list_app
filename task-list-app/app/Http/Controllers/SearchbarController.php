<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchbarController extends Controller
{
    //


    public function searchNotes(Request $request)
    {

        $offset = $request->query('offset', 0);
        $limit = $request->query('limit', 16);
        $query = $request->query('query', '');

        $search = DB::table('notes')
            ->leftJoin('sidebar', 'notes.sidebar_link_id', '=', 'sidebar.id')
            ->where('notes.note_title', 'LIKE', "%{$query}%")
            ->orWhere('notes.note_body', 'LIKE', "%{$query}%")
            ->orWhere('sidebar.sidebar_link_name', 'LIKE', "%{$query}%")
            ->offset($offset)
            ->limit($limit)
            ->get();

        $count = $search->count();

        // If no results found
        if ($count === 0) {
            return response()->json([
                'message' => 'No searches found',
            ], 404);
        } 

        return response()->json([
            'message' => 'search results were successful',
            'data' => $search,
            'count' => $count
        ], 200);
    }
}
