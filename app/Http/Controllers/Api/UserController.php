<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try {
            //code...
            $data = User::where('status', '1')->paginate(10);
            return response()->json(['data' => $data], 200);
        } catch (\Exception $e) {
            //throw $th;
            return response()->json(['error' => $e->getMessage()], 500);
        }
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
        try {
            //code...
            $data = User::create([
                'name' => $request->name,
                'name_short' => $request->name_short,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'status' => '1'
            ]);

            return response()->json(['data' => $data], 200);
        } catch (\Exception $e) {
            //throw $th;
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        try {
            //code...
            $data = User::findOrFail($id);
            return response()->json(['data' => $data], 200);
        } catch (\Exception $e) {
            //throw $th;
            return response()->json(['error' => $e->getMessage()], 500);
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
        try {
            $data = User::findOrFail($id);

            $data->name = $request->name;
            $data->name_short = $request->name_short;
            $data->email = $request->email;
            $data->save();

            return response()->json(['data' => $data], 200);
            //code...
        } catch (\Exception $e) {
            //throw $th;
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {
            $data = User::findOrFail($id);
            $data->status = '0';
            $data->save();

            return response()->json(['data' => $data], 200);

        } catch (\Exception $e) {
            //throw $th;
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
