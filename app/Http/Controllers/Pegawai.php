<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

// MODEL
use App\Models\Pegawai AS Mpegawai;
use App\Models\ModelDepartmen AS Mdepartmen;
class Pegawai extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $r_pegawai=Mpegawai::all();
        $r_departmen=Mdepartmen::all();
        foreach($r_departmen AS $index => $departmen){
            foreach($departmen->getpegawai AS $index2 => $pegawai) {
                $dt[$index2]=$pegawai;
                $dt[$index2]->departmen=$departmen->departmen;
            }
        }   
        return response()->json([
            'status'=>true,
            'message'=>'Tampil detail by id',
            'data'=>$dt,
        ],200);
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
        $validator=Validator::make($request->all(),[
            'nama'=>'required',
            'alamat'=>'required',
            'no_hp'=>'required',
            'departemen_id'=>'required',

        ]);
        if($validator->fails()){
            return response()->json([
                'status'=>false,
                'message'=>'simpan data pegawai berhasil',
                'data'=>$validator->errors(),
            ],401);
        }else{
            $post=Mpegawai::create([
                'nama'=>$request->input('nama'),
                'alamat'=>$request->input('alamat'),
                'no_hp'=>$request->input('no_hp'),
                'departemen_id'=>$request->input('departemen_id'),                
            ]);
            if($post){
                return response()->json([
                    'status'=>true,
                    'message'=>'Post simpan pegawai berhasil',
                    'data'=>$post,
                ],201);
            }else{
                return response()->json([
                    'status'=>false,
                    'message'=>'Post gagal',
                ],400);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id=null)
    {
        if($id){
            $pegawai=Mpegawai::find($id);
            if($pegawai){
                return response()->json([
                    'status'=>true,
                    'message'=>'Tampil detail by id',
                    'data'=>$pegawai,
                ],201);
            }else{
                return response()->json([
                    'status'=>false,
                    'message'=>'Data tidak ditemukan'
                ],400);
            }
        }else{
            return response()->json([
                'status'=>false,
                'message'=>'Id tidak ditemukan'
            ],401);
        }
        
        
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
        $validator=Validator::make($request->all(),[
            'nama'=>'required',
            'alamat'=>'required',
            'no_hp'=>'required',
            'departemen_id'=>'required',

        ]);
        if($validator->fails()){
            return response()->json([
                'status'=>false,
                'message'=>'Semua kolom harus diisi',
                'data'=>$validator->errors(),
            ],401);
        }else{
            $r_pegawai=Mpegawai::where('id',$id)->update([
                'nama'=>$request->input('nama'),
                'alamat'=>$request->input('alamat'),
                'no_hp'=>$request->input('no_hp'),
                'departemen_id'=>$request->input('departemen_id'),            
            ]);
            if($r_pegawai){
                return response()->json([
                    'status'=>true,
                    'message'=>'Update berhasil',
                    'data'=>$r_pegawai,
                ],201);
            }else{
                return response()->json([
                    'status'=>false,
                    'message'=>'Update data gagal',
                ],400);
            }
        }     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $r_pegawai=Mpegawai::whereId($id)->first();
        $r_pegawai->delete();
        // $post = Mpegawai::find($id);
        // $post->delete();        
        if($r_pegawai){
            return response()->json([
                'status'=>true,
                'message'=>'Hapus berhasil',
            ],200);
        }else{
            return response()->json([
                'status'=>false,
                'message'=>'Hapus gagal',
            ],400);
        }
    }
}