<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use App\Models\Request as MyRequest;
class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {

        try {
            $request = MyRequest::find($id);
            if ($request) {
                $employee = DB::table('employees')->where('id', $request->employee_id)->first();
                $request->name = $employee->name; // Add the category data to the project object
                $request->iqama_number = $employee->iqama_number;
                $response = Response::make(json_encode($request, JSON_UNESCAPED_UNICODE));
                $response->header('Content-Type', 'application/json; charset=utf-8');
                return $response;
            } else {
                return response()->json(['message' => 'Project not found'], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred while fetching the project'], 500);
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
