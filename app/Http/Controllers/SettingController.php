<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = new Setting();

        $model = Setting::find(1);
        return view('setting.index', ['title' => 'Setting', 'model' => $model, 'setting' => $setting]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        $model = Setting::find(1);
        $model->write_low = $request->write_low;
        $model->write_low_mid = $request->write_low_mid;
        $model->write_high_mid = $request->write_high_mid;
        $model->write_high = $request->write_high;

        $model->practice_low = $request->practice_low;
        $model->practice_low_mid = $request->practice_low_mid;
        $model->practice_high_mid = $request->practice_high_mid;
        $model->practice_high = $request->practice_high;

        $model->graduate_low = $request->graduate_low;
        $model->graduate_high_mid = $request->graduate_high_mid;
        $model->graduate_low_mid = $request->graduate_low_mid;
        $model->graduate_high = $request->graduate_high;

        $model->graduate_not = $request->graduate_not;
        $model->graduate_yes = $request->graduate_yes;

        if($model->save()) {
            return redirect('setting');
        } else {
            return redirect('home');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
