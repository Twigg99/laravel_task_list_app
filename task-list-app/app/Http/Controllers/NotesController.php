<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Notes;

class NotesController extends Controller
{
    //

    public function storeNote(Request $request) {

        $validator = Validator::make($request->all(), [
            'note_title' => 'string',
            'note_image_path' => 'string',
            'note_body' => 'string',
            'sidebar_link_id' => 'integer'
        ]); 

        if($validator->fails()) {
            return response()->json([
                'message' => 'Issue validating note',
                'error' => $validator->errors(),
            ], 422);
        } 
        try {

            // $note = Notes::create([
            //     'note_title' => $request->input('note_title'),
            //     'note_image_path' => $request->input('note_image_path'),
            //     'note_body' => $request->input('note_body'),
            //     'sidebar_link_id' => $request->input('sidebar_link_id')
            // ]);

            $note = Notes::create($validator->validated());
            
            return response()->json([
                'message' => 'Successfully created a note',
                'data' => $note,
            ], 201);
            
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error storing note',
                'error' =>$e->getMessage()
            ], 500);
        }
    }


    public function editNote(Request $request, $id) {

        $note = Notes::find($id);
    
        if (!$note) {
            return response()->json([
                'message' => 'Note not found'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'note_title' => 'sometimes|string|max:255',
            'note_image_path' => 'sometimes|nullable|string',
            'note_body' => 'sometimes|string',
            'sidebar_link_id' => 'sometimes|integer',
        ]); 

        if($validator->fails()) {
            return response()->json([
                'message' => 'Issue validating note',
                'errors' => $validator->errors(),
            ], 422);
        } 
        try {

            $note->update($validator->validated());


            return response()->json([
                'message' => 'Successfully modified note',
                'data' => $note,
            ], 200);
            
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error storing note',
                'error' =>$e->getMessage()
            ], 500);
        }
    }


    public function deleteNote($id) {
        $note = Notes::find($id);

        if(!$note){
            return response()->json([
                'message' => 'note not found'
            ], 404);
        }

        try {
            $note->delete();

            return response()->json([
                'message' => 'Note deleted successfully',
            ], 200);

        } catch(\Exception $e) {
            return response()->json([
                'message' => 'Error deleting note',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
