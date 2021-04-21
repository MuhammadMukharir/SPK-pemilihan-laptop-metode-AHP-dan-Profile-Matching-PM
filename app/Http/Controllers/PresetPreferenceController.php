<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\PresetPreference;

class PresetPreferenceController extends Controller
{
    protected $preference_atribute_required = array(
        'name'          => 'required',
        'detail'        => '',
        'harga'             => 'required|numeric|between:0,200000000',
        'prosesor'          => 'required|numeric|between:0,200',
        'kapasitas_ram'     => 'required|numeric|between:0,64',
        'kapasitas_hdd'     => 'required|numeric|between:0,5000',
        'kapasitas_ssd'     => 'required|numeric|between:0,5000',
        'kapasitas_vram'    => 'required|numeric|between:0,32',
        'kapasitas_maxram'  => 'required|numeric|between:0,64',
        'berat'             => 'required|numeric|between:0,10000',
        'ukuran_layar'      => 'required|numeric|between:5,30',
        'jenis_layar'       => 'required|numeric|between:0,5',
        'refresh_rate'      => 'required|numeric|between:0,1000',
        'resolusi_layar'    => 'required|numeric|between:0,80000000'
    );

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $presetpreferences = PresetPreference::latest()->paginate(6);
        $presetpreferences = PresetPreference::latest()->get();
        return view('presetpreferences.index',compact('presetpreferences'));
        // return view('presetpreferences.index',compact('presetpreferences'))
        //     ->with('i', (request()->input('page', 1) - 1) * 6);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('presetpreferences.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate($this->preference_atribute_required);
    
        PresetPreference::create($request->all());
    
        return redirect()->route('presetpreferences.index')
                        ->with('success','Preset Preference created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\PresetPreference  $PresetPreference
     * @return \Illuminate\Http\Response
     */
    public function show(PresetPreference $presetpreference)
    {
        return view('presetpreferences.show',compact('presetpreference'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PresetPreference  $PresetPreference
     * @return \Illuminate\Http\Response
     */
    public function edit(PresetPreference $presetpreference)
    {
        return view('presetpreferences.edit',compact('presetpreference'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PresetPreference  $PresetPreference
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PresetPreference $presetpreference)
    {
         request()->validate($this->preference_atribute_required);
    
        $presetpreference->update($request->all());
    
        return redirect()->route('presetpreferences.index')
                        ->with('success','Preset Preference updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PresetPreference  $PresetPreference
     * @return \Illuminate\Http\Response
     */
    public function destroy(PresetPreference $presetpreference)
    {
        $presetpreference->delete();
    
        return redirect()->route('presetpreferences.index')
                        ->with('success','Preset Preference deleted successfully');
    }

}