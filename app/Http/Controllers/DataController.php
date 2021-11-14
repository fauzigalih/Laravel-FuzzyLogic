<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data;
use App\Models\Result;
use App\Models\Conjunction;
use App\Models\Disjunction;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $models = Data::all();
        // return count($models);
        return view('data.index', [
            'models' => $models, 
            'title' => 'Data'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('data.create', ['title' => 'Create Data']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new Data;
        $model->nip = $request->nip;
        $model->full_name = $request->full_name;
        
        if($model->save()) {
            return redirect('data')->with('status', 'Data Berhasil Ditambahkan.');
        }else{
            return redirect('data')->with('status', 'Data Gagal Ditambahkan.');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function show(Data $data)
    {
        $result = Result::where('nip', $data->nip)->first();
        if (!$result) return redirect('data')->with('status', 'Nilai sertifikasi belum di masukan kedalam sistem.');
        $model = Data::find($data->id);
        return view('data.show', ['model' => $model, 'title' => 'Show']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function edit(Data $data)
    {
        $model = Data::find($data->id);
        return view('data.edit', ['model' => $model, 'title' => 'Edit Data']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Data $data)
    {
        $model = Data::find($data->id);

        $model->full_name = $request->full_name;

        if($model->save()) {
            return redirect('data')->with('status', 'Data Berhasil Diubah.');
        }else{
            return redirect('data')->with('status', 'Data Gagal Diubah.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function destroy(Data $data)
    {
        $model = Data::find($data->id);
        if($model->delete()) {
            return redirect('data')->with('status', 'Data Berhasil Dihapus.');
        }else{
            return redirect('data')->with('status', 'Data Gagal Dihapus.');
        }
    }
}
