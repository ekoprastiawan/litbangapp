<?php

namespace App\Http\Controllers;

use App\Models\Advis\TVisual;
use App\Models\Advis\RefJenisVisual;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreTVisualRequest;
use App\Http\Requests\UpdateTVisualRequest;

class VisualController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['visual'] = TVisual::with('refJenisVisual')->orderBy('id', 'desc')->get();

        return view('crud_visual.index_visual',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        

        return view('crud_visual.create_visual');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTVisualRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTVisualRequest $request)
    {
        $visual = new TVisual();
        $visual->judul = $request->post('judul');
        $visual->file_url = $request->post('file_url');
        $visual->pilih_visual = $request->post('pilih_visual');
        $visual->save();

        return redirect()->route('visual.index')->with('success','Data telah tersimpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Advis\TVisual  $tVisual
     * @return \Illuminate\Http\Response
     */
    public function show(TVisual $tVisual)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Advis\TVisual  $tVisual
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $idVisual = $request->get('id-data');
        $data['visual'] = TVisual::with(['refJenisVisual'])->find($idVisual);

        return view('crud_visual.edit_visual', $data);
    }
 
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTVisualRequest  $request
     * @param  \App\Models\Advis\TVisual  $tVisual
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTVisualRequest $request, TVisual $tVisual)
    {
        $idVisual = $request->post('id');
        $visual = TVisual::find($idVisual);
        $visual->judul = $request->post('judul');
        $visual->file_url = $request->post('file_url');
        $visual->pilih_visual = $request->post('pilih_visual');
        $visual->save();

        return redirect()->route('visual.index')->with('success','Data telah diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Advis\TVisual  $tVisual
     * @return \Illuminate\Http\Response
     */
    public function destroy(TVisual $tVisual)
    {
        //
    }
}
