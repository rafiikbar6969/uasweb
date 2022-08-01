<?php

namespace App\Http\Controllers\API;

use App\Models\Pelanggan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PelangganController extends Controller
{
    // tampilin data
    public function index()
    {
        $data = Pelanggan::all();
        if($data){
            return response()->json([
                'pesan' => 'success',
                'data' => $data
            ], 200);
        } else {
        
        return response()->json([
            'pesan' => 'failed',
            'data' => $data
        ], 400);
    }
}

// tambah
public function add(Request $request){

    // proses validasi
    $validate = Validator::make($request->all(), [
    'nama' => 'required',
    'no_telp' => 'required',
    'email' => 'required',
    'alamat' => 'required'
    ]);

    if($validate->fails()){
        return $validate->errors();
    }

    // proses simpan
    $data = Pelanggan::create($request->all());
    return response()->json([
        'pesan' => 'Data Created',
        'data' => $data
    ], 201);
}

// hapus
public function destroy($id)
{
    $data = Pelanggan::where('id', $id)->first();

    if (empty($data)) {
        return response()->json([
            'pesan' => 'Data Not Found',
            'data' => ''
        ], 404);
    }
    $data->delete();
    return response()->json([
        'pesan' => 'Data Deleted',
        'data' => $data
    ], 200);
}

// update
public function update(Request $request, $id)
    {
        $data = Pelanggan::where('id', $id)->first();

        if (empty($data)) {
            return response()->json([
                'pesan' => 'No Data Found',
                'data' => ''
            ], 404);
        } else {

            $validasi = Validator::make($request->all(), [
                "nama" => "required",
                "no_telp" => "required",
                "alamat" => "required",
                "email" => "required"
            ]);

            if ($validasi->passes()) {
                return response()->json([
                    'pesan' => "Data Updated",
                    'data' => $data->update($request->all())
                ]);
            } else {
                return response()->json([
                    'pesan' => 'Data Update Failed',
                    'data' => $validasi->errors()->all()
                ], 404);
            }
        }
    }
}