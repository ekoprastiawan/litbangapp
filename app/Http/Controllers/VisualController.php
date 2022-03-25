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
        $data['ref_jenis_visual'] = RefJenisVisual::all();

        return view('crud_visual.create_visual', $data);
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
        $visual->label = $request->post('label');

        if(!empty($request->file('file_url')))
        {
            $extension = $request->file('file_url')->getClientOriginalExtension();
            $filenameVisual = sha1(time().time()).".".$extension;
            $tujuanUpload = 'public/visual';
            $uploadFile = $request->file('file_url')->storeAs($tujuanUpload, $filenameVisual);
            $linkFile = str_replace('public','',$uploadFile);
            $visual->file_url = $linkFile;
        }

        $visual->ref_jenis_visual_id = $request->post('ref_jenis_visual_id');
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
        $data['ref_jenis_visual'] = RefJenisVisual::all();

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
        $visual->label = $request->post('label');

        if(!empty($request->file('file_url')))
        {
            $fileExist = $visual->file_url;
            $linkExist = 'public'.$fileExist;
            if (Storage::exists($linkExist)) {
                Storage::delete($linkExist);
            }
            $extension = $request->file('file_url')->getClientOriginalExtension();
            $filenameVisual = sha1(time().time()).".".$extension;
            $tujuanUpload = 'public/visual';
            $uploadFile = $request->file('file_url')->storeAs($tujuanUpload, $filenameVisual);
            $linkFile = str_replace('public','',$uploadFile);
            $visual->file_url = $linkFile;
        }

        $visual->ref_jenis_visual_id = $request->post('ref_jenis_visual_id');
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
