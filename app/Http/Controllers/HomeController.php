<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Advis\TVisual;
use App\Models\Advis\TAnalytic;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // hitung jumlah visualisasi yg dipilih
        $data['count'] = TVisual::with('refJenisVisual')
                        ->where('pilih_visual', 1)
                        ->count();

        // pilih visualisasi yg terpilih dan/atau terbaru
        if($data['count'] > 0){
            $data['visual'] = TVisual::with('refJenisVisual')
                        ->where('pilih_visual', 1)
                        ->orderBy('id', 'desc')
                        ->firstOrFail();
        } else {
            $data['visual'] = TVisual::with('refJenisVisual')
                        ->orderBy('id', 'desc')
                        ->first();
        }

        $data['analytic'] = TAnalytic::with('userCreate')->orderBy('id', 'desc')
                        ->limit(2)
                        ->get();



        return view('welcome2',$data);
    }

    public function indexkms($id)
    {

        $data['kms'] = $id;        

        return view('welcome2kms',$data);
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
