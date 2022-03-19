<?php

namespace App\Http\Controllers\AsyncRequest;

use App\Http\Controllers\Controller;
use App\Models\Advis\RefSubKategori;
use Illuminate\Http\Request;

class SubKategori extends Controller
{
    /**
     * Digunakan untuk melakukan pengembalian data ref sub kategori dari async request
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request)
    {
        $idKategori = $request->post('id-kategori');
        $listSubKategori = RefSubKategori::where('ref_kategori_id',$idKategori)->get();
        return response()
            ->json($listSubKategori);
    }
}
