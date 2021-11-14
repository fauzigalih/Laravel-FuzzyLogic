<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data;
use App\Models\Result;
use App\Models\Conjunction;
use App\Models\Disjunction;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $models = Data::all();
        return view('home.index', ['title' => 'Home', 'models' => $models]);
    }

    public function result(Request $request)
    {
        $model = Data::where('nip', $request->nip)->first();
        $result = new Result($request->test_write, $request->test_practice);

        return view('home.result', [
            'title' => 'Result', 
            'model' => $model, 
            'request' => $request,
            'result' => $result
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = new Result();
        $conjunction = new Conjunction();
        $disjunction = new Disjunction();

        $find = Result::where('nip', $request->nip)->first();
        $checkUpdate = $find ? true : false;
        if ($checkUpdate) {
            $result = $find;
            $conjunction = Conjunction::where('nip', $request->nip)->first();
            $disjunction = Disjunction::where('nip', $request->nip)->first();
        }

        $result->nip = $request->nip;
        $result->test_write = $request->test_write;
        $result->test_practice = $request->test_practice;
        $result->defuzzy = $request->defuzzyfication;
        $result->graduate = $request->graduate_final;
        $result->save();

        $conjunction->nip = $request->nip;
        $conjunction->write_low = $request->write_low_level;
        $conjunction->write_mid = $request->write_mid_level;
        $conjunction->write_high = $request->write_high_level;
        $conjunction->practice_low = $request->practice_low_level;
        $conjunction->practice_mid = $request->practice_mid_level;
        $conjunction->practice_high = $request->practice_high_level;
        $conjunction->save();

        $disjunction->nip = $request->nip;
        $disjunction->write_low = $request->write_low_disjunction;
        $disjunction->write_mid = $request->write_mid_disjunction;
        $disjunction->practice_low = $request->practice_low_disjunction;
        $disjunction->practice_mid = $request->practice_mid_disjunction;
        $disjunction->graduate_not = $request->graduate_not;
        $disjunction->graduate_yes = $request->graduate_yes;
        $disjunction->save();

        if($result && $conjunction && $disjunction) return redirect('data');
        else return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
