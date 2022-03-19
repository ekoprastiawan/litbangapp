<?php

namespace App\Http\Controllers;

use App\Http\Requests\TListData\Create;
use App\Http\Requests\TListData\Update;
use App\Models\Advis\RefSubKategori;
use Illuminate\Http\Request;
use App\Models\Advis\RefKategori;
use App\Models\Advis\RefSumberData;
use App\Models\Advis\TListData;

class DataController extends Controller
{
    public function index()
    {
        $data['dataList'] = TListData::with(['refSubKategori','refSubKategori.refKategori','refSumberData'])->get();
        return view('crud_listdata.index_listdata',$data);
    }

    public function create()
    {
        $data['ref_kategories'] = RefKategori::all();
        $data['ref_sumber_data'] = RefSumberData::all();
        return view('crud_listdata.create_listdata', $data);
    }

    public function store(Create $request)
    {
        $listData = new TListData();
        $listData->ref_sub_kategori_id = $request->post('ref_sub_kategori_id');
        $listData->ref_sumber_data_id = $request->post('ref_sumber_data_id');
        $listData->nama_data = $request->post('nama_data');
        $listData->url_data = $request->post('url_data');
        $listData->created_by = '';
        $listData->updated_by = '';
        $listData->save();

        return redirect()->route('list-data.index')->with('success','Berhasil Tersimpan!');
    }

    public function edit(Request $request)
    {
        $idData = $request->get('id-data');
        $data['dataList'] = TListData::with(['refSubKategori','refSubKategori.refKategori'])->find($idData);
        $data['listKategori'] = RefKategori::all();
        $data['listSubKategori'] = RefSubKategori::all();
        $data['listSumberData'] = RefSumberData::all();
        return view('crud_listdata.edit_listdata', $data);
    }

    public function update(Update $request)
    {
        $idData = $request->post('id');
        $listData = TListData::find($idData);
        $listData->ref_sub_kategori_id = $request->post('ref_sub_kategori_id');
        $listData->ref_sumber_data_id = $request->post('ref_sumber_data_id');
        $listData->nama_data = $request->post('nama_data');
        $listData->url_data = $request->post('url_data');
        $listData->save();

        return redirect()->route('list-data.index')->with('success', 'Berhasil Diupdate!');
    }


}