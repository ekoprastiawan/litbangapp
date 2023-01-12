<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use App\Models\Advis\BagiPagu;


class MockupController extends Controller
{

    public function bagipagu()
    {
        // Ambil data dari BISMA
        $result = Http::get('https://apip.bpkp.go.id/bewise/mockup/bagipagu')->collect();

        // Menghitung jumlah data dari BISMA
        $count = count($result);

        // Update tabel d_bagipagu dari data BISMA
        foreach ($result as $insert) {
            $res = BagiPagu::firstOrNew(['id' => $insert['id']]);
            $res->thang = $insert['thang'];
            $res->kdsatker = $insert['kdsatker'];
            $res->kddept = $insert['kddept'];
            $res->kdunit = $insert['kdunit'];
            $res->kdprogram = $insert['kdprogram'];
            $res->kdgiat = $insert['kdgiat'];
            $res->kdoutput = $insert['kdoutput'];
            $res->kdsoutput = $insert['kdsoutput'];
            $res->kdkmpnen = $insert['kdkmpnen'];
            $res->kdindex = $insert['kdindex'];
            $res->user_id = $insert['user_id'];
            $res->unit_id = $insert['unit_id'];
            $res->role_id = $insert['role_id'];
            $res->ppk_id = $insert['ppk_id'];
            $res->save();
        }

        return view('crud_visual.index_visual2', compact('result','count'));           
    }
    

}
