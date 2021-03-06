<?php

namespace App\Http\Controllers;

use App\Models\Advis\TAnalytic;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreTAnalyticRequest;
use App\Http\Requests\UpdateTAnalyticRequest;



class AnalyticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['analytic'] = TAnalytic::with('userCreate')->orderBy('id', 'desc')->get();
        return view('crud_analytic.index_analytic',$data);
    }

    public function trash()
    {
        $data['analytic'] = TAnalytic::with('userCreate')->orderBy('id', 'desc')->onlyTrashed()->get();
        return view('crud_analytic.trash_analytic',$data);
    }

    public function detail(Request $request)
    {
        $idAnalytic = $request->get('id-data');
        $data['analytic'] = TAnalytic::with('userCreate')->find($idAnalytic);
        return view('crud_analytic.detail_analytic', $data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('crud_analytic.create_analytic');
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTAnalyticRequest  $request
     * @return \Illuminate\Http\Response
     */

    public function store(StoreTAnalyticRequest $request)
    {
        $analytic = new TAnalytic();
        $analytic->judul = $request->post('judul');
        $analytic->uraian = $request->post('uraian');

        if(!empty($request->file('img_url')))
        {
            $extension = $request->file('img_url')->extension();
            $filenameAnalytic = sha1(time().time()).".".$extension;
            $tujuanUpload = 'public/analytic';
            $uploadFile = $request->file('img_url')->storeAs($tujuanUpload, $filenameAnalytic);
            $linkFile = str_replace('public','',$uploadFile);
            $analytic->img_url = $linkFile;
        }


        if(!empty($request->file('file_url')))
        {
            $extension = $request->file('file_url')->extension();
            $filenameAnalytic = sha1(time().time()).".".$extension;
            $tujuanUpload = 'public/analytic';
            $uploadFile = $request->file('file_url')->storeAs($tujuanUpload, $filenameAnalytic);
            $linkFile = str_replace('public','',$uploadFile);
            $analytic->file_url = $linkFile;
        }
        
        $analytic->dashboard_url = $request->post('dashboard_url');
        $analytic->created_by = Auth::user()->niplama;
        $analytic->save();

        return redirect()->route('analytic.index')->with('success','Data telah tersimpan.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Advis\TAnalytic  $tAnalytic
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $idAnalytic = $request->get('id-data');
        $data['analytic'] = TAnalytic::find($idAnalytic);
        return view('crud_analytic.edit_analytic', $data);
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTAnalyticRequest  $request
     * @param  \App\Models\Advis\TAnalytic  $tAnalytic
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTAnalyticRequest $request, TAnalytic $tAnalytic)
    {
        $idAnalytic = $request->post('id');
        $analytic = TAnalytic::find($idAnalytic);
        $analytic->judul = $request->post('judul');
        $analytic->uraian = $request->post('uraian');

        if(!empty($request->file('img_url')))
        {
            $fileExist = $analytic->img_url;
            $linkExist = 'public'.$fileExist;
            if (Storage::exists($linkExist)) {
                Storage::delete($linkExist);
            }
            $extension = $request->file('img_url')->extension();
            $filenameAnalytic = sha1(time().time()).".".$extension;
            $tujuanUpload = 'public/analytic';
            $uploadFile = $request->file('img_url')->storeAs($tujuanUpload, $filenameAnalytic);
            $linkFile = str_replace('public','',$uploadFile);
            $analytic->img_url = $linkFile;
        }

        if(!empty($request->file('file_url')))
        {
            $fileExist = $analytic->img_url;
            $linkExist = 'public'.$fileExist;
            if (Storage::exists($linkExist)) {
                Storage::delete($linkExist);
            }
            $extension = $request->file('file_url')->extension();
            $filenameAnalytic = sha1(time().time()).".".$extension;
            $tujuanUpload = 'public/analytic';
            $uploadFile = $request->file('file_url')->storeAs($tujuanUpload, $filenameAnalytic);
            $linkFile = str_replace('public','',$uploadFile);
            $analytic->file_url = $linkFile;
        }

        $analytic->dashboard_url = $request->post('dashboard_url');
        $analytic->save();

        return redirect()->route('analytic.index')->with('success','Data telah diubah.');
    }

    /**
     * Hapus sementara.
     *
     * @param  \App\Models\Advis\TAnalytic  $tAnalytic
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $idAnalytic = $request->get('id-data');
        $data = TAnalytic::find($idAnalytic);
        $data->delete();

        return redirect()->route('analytic.index')->with('success','Data telah dihapus.');
    }

    /**
     * Mengembalikan data yang dihapus sementara.
     *
     * @param  \App\Models\Advis\TAnalytic  $tAnalytic
     * @return \Illuminate\Http\Response
     */
    public function restore(Request $request)
    {
        $idAnalytic = $request->get('id-data');
        $data = TAnalytic::onlyTrashed()->where('id',$idAnalytic);
        $data->restore();

        return redirect()->route('analytic.trash')->with('success','Data telah dikembalikan.');
    }
}
?>