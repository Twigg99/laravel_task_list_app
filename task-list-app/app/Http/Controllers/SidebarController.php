<?php

namespace App\Http\Controllers;

use App\Models\Sidebar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\TryCatch;

class SidebarController extends Controller
{
    //

    public function storeSidebarName(Request $request) {

        $validator = Validator::make($request->all(), [
            'sidebar_link_name' => 'required|string|max:255'
        ]);

        if($validator->fails()){
            return response()->json([
                'message' => 'Validation failed',
                'error' => $validator->errors()
            ], 422);
        }

        try{

            $sidebarlink = Sidebar::create($validator->validated());

            return response()->json([
                'message' => 'Sidebar link successfully created',
                'data' => $sidebarlink,
            ], 201);

        } catch(\Exception $e) {
            return response()->json([
                'message' => 'Error saving sidebar link name',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    public function editSidebarlink(Request $request, $id) {

        $sidebarlink = Sidebar::find($id);

        if(!$sidebarlink) {
            return response()->json([
                'message' => 'Cannot find sidebar link'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'sidebar_link_name' => 'sometimes|string'
        ]);

        if($validator->fails()) {
            return response()->json([
                'message' => 'Validator failed',
                'errors' => $validator->errors()
            ], 422);
        }

        try{
            $sidebarlink->update($validator->validated());

            return response()->json([
                'message' => 'Modification successful',
                'data' => $sidebarlink
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error modifying sidebar link',
                'error' => $e->getMessage()
            ], 500);
        }

    }

    public function deleteSideBarLink($id) {

        $sidebarlink = Sidebar::find($id);

        if(!$sidebarlink) {
            return response()->json([
                'message' => 'sidebar link not found',
            ], 404);
        }

        try {
            $sidebarlink->delete();

            return response()->json([
                'message' => 'Sidebar link deleted successfully',
            ], 200);
        } catch(\Exception $e) {
            return response()->json([
                'message' => 'Error deleting sidebar link',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
