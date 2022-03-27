<?php

namespace App\Http\Controllers\AsyncRequest;

use App\Http\Controllers\Controller;
use App\Models\Advis\TListData;
use Illuminate\Http\Request;

class ListData extends Controller
{
    /**
     * Digunakan untuk melakukan pengembalian data ref sub kategori dari async request
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request)
    {
        $idKategori = $request->post('id-kategori');
        $idSubKategori = $request->post('id-sub-kategori');
        if($idSubKategori){
            $listData = TListData::with(['refSubKategori','refSubKategori.refKategori','refSumberData'])->where('ref_sub_kategori_id',$idSubKategori)->get();
        } else {
            $listData = TListData::with(['refSubKategori','refSubKategori.refKategori','refSumberData'])->whereHas('refSubKategori', function ($query)  use ($idKategori) {
                return $query->where('ref_kategori_id', '=', $idKategori);
            })->get();
        }        

        return response()->json($listData);
    }
}
