<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        try {
            //code...
            $area_id = $request->area_id;
            if ($area_id) {
                # code...
                $data = Area::where('status', '1')->where('area_id', $area_id)->with(['dependencie'])->paginate(10);
                return response()->json(['data' => $data], 200);
            } else {
                # code...
                $data = Area::where('status', '1')->with(['dependencie'])->paginate(10);
                return response()->json(['data' => $data], 200);
            }


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
            $data = Area::create([
                'code' => $request->code,
                'level' => $request->level,
                'name' => $request->name,
                'name_short' => $request->name_short,
                'name_title' => $request->name_title,
                'responsible' => $request->responsible,
                'phone_responsible' => $request->phone_responsible,
                'phone_area' => $request->phone_area,
                'email_area' => $request->email_area,
                'area_id' => $request->area_id,
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
            $data = Area::findOrFail($id);
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
            $data = Area::findOrFail($id);

            $data->code = $request->code;
            $data->level = $request->level;
            $data->name = $request->name;
            $data->name_short = $request->name_short;
            $data->name_title = $request->name_title;
            $data->responsible = $request->responsible;
            $data->phone_responsible = $request->phone_responsible;
            $data->phone_area = $request->phone_area;
            $data->email_area = $request->email_area;
            $data->area_id = $request->area_id;
            $data->save();

            return response()->json(['data' => $data], 200);

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
            //code...
            $data = Area::findOrFail($id);
            $data->status = '0';
            $data->save();

            return response()->json(['data' => $data], 200);

        } catch (\Exception $e) {
            //throw $th;
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
