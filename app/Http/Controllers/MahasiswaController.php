<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $mhs = Mahasiswa::create($request->all());
            DB::commit();
            return Response::json(['message' => 'success',
                                    'status'=>200], 200);
        }catch (Exception $ex){
            DB::rollback();
            return Response::json(['message'=>$ex->errorInfo[2],
                                'status'=>400], 400);
        }
        return Response::json(['message' => 'Unimplemented', 'status'=>404], 404);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $mhs = Mahasiswa::findOrFail($id);
            return Response::json(['data'=> $mhs,
                                    'status'=>200], 200);
        }
        catch(Exception $ex){
            return Response::json(['message'=>'Not Found',
                                'status'=>400], 400);
        }
        return Response::json(['message' => 'Unimplemented', 'status'=>404], 404);
    }

    public function setMataKuliah(Request $request){
        $data = $request->all();

        try{
            $mhs = Mahasiswa::findOrFail($data['mhs']);
            $matkul = Mahasiswa::findOrFail($data['matkul']);
            $mhs->matkul()->syncWithoutDetaching($matkul);
            return Response::json(['message'=> 'success',
                                'status'=>200], 200);
        }
        catch(Exception $ex){
            return Response::json(['message'=>$ex,
                                'status'=>400], 400);
        }
        return Response::json(['message' => 'Unimplemented', 'status'=>404], 404);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
