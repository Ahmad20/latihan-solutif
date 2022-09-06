<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\MataKuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class MataKuliahController extends Controller
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
        return view('admin.mk.create');
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
            $matkul = MataKuliah::create($request->all());
            DB::commit();
            return redirect()->route('admin.dashboardMk')->with(['success'=>'Mata Kuliah berhasil ditambahkan']);
            // return Response::json(['message' => 'success',
            //                         'status'=>200], 200);
        }catch (Exception $ex){
            DB::rollback();
            return redirect()->route('admin.dashboardMk')->with(['error'=>'Mata Kuliah gagal ditambahkan']);
            // return Response::json(['message'=>$ex->errorInfo[2],
            //                     'status'=>400], 400);
        }
        return redirect()->route('admin.dashboardMk')->with(['error'=>'Mata Kuliah gagal ditambahkan']);
        
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
            $matkul = MataKuliah::findOrFail($id);
            return Response::json(['data'=> $matkul,
                                    'status'=>200], 200);
        }
        catch(Exception $ex){
            return Response::json(['message'=>'Not Found',
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
        $mk = MataKuliah::findOrFail($id);
        
        return view('admin.mk.edit', ['data' => $mk]);
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
        $data = $request->except(['_token']);

        $mk = MataKuliah::findOrFail($id);

        $mk->update($data);

        return redirect()->route('admin.dashboardMk')->with(['success'=> 'Data Mata Kuliah Berhasil di Update']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MataKuliah::findOrFail($id)->delete();
        
        return redirect()->route('admin.dashboardMk')->with('success', 'Mata Kuliah dihapus');
    }
}
