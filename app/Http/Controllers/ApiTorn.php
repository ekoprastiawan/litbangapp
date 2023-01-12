<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Config;
use App\Models\Torn;


class ApiTorn extends Controller
{
    public function index()
    {
        $res = Http::get('https://api.torn.com/torn/985,986,987,530,553,532,554,533,555?selections=items&key=d1LRgQmVEExHhpMz')['items'];

        foreach ($res as $key => $value) {
            $dat = Torn::firstOrNew(['id' => $key]);
            $dat->name = $value['name'];
            $dat->market_value = $value['market_value'];

            if ($key == 985) {$dat->energy = 5;}
            else if ($key == 986) {$dat->energy = 10;}
            else if ($key == 987) {$dat->energy = 20;}
            else if ($key == 530) {$dat->energy = 20;}
            else if ($key == 553) {$dat->energy = 20;}
            else if ($key == 532) {$dat->energy = 25;}
            else if ($key == 554) {$dat->energy = 25;}
            else if ($key == 533) {$dat->energy = 30;}
            else if ($key == 555) {$dat->energy = 30;}
            else {$dat->energy = 0;}

            $dat->save();
        }

        $res985 = Http::get('https://api.torn.com/market/985?selections=bazaar&key=d1LRgQmVEExHhpMz')['bazaar'][0];
        $dat985 = Torn::find(985);
        $dat985->low_value = $res985['cost'];
        $dat985->save();

        $res986 = Http::get('https://api.torn.com/market/986?selections=bazaar&key=d1LRgQmVEExHhpMz')['bazaar'][0];
        $dat986 = Torn::find(986);
        $dat986->low_value = $res986['cost'];
        $dat986->save();

        $res987 = Http::get('https://api.torn.com/market/987?selections=bazaar&key=d1LRgQmVEExHhpMz')['bazaar'][0];
        $dat987 = Torn::find(987);
        $dat987->low_value = $res987['cost'];
        $dat987->save();

        $res530 = Http::get('https://api.torn.com/market/530?selections=bazaar&key=d1LRgQmVEExHhpMz')['bazaar'][0];
        $dat530 = Torn::find(530);
        $dat530->low_value = $res530['cost'];
        $dat530->save();

        $res553 = Http::get('https://api.torn.com/market/553?selections=bazaar&key=d1LRgQmVEExHhpMz')['bazaar'][0];
        $dat553 = Torn::find(553);
        $dat553->low_value = $res553['cost'];
        $dat553->save();

        $res532 = Http::get('https://api.torn.com/market/532?selections=bazaar&key=d1LRgQmVEExHhpMz')['bazaar'][0];
        $dat532 = Torn::find(532);
        $dat532->low_value = $res532['cost'];
        $dat532->save();

        $res554 = Http::get('https://api.torn.com/market/554?selections=bazaar&key=d1LRgQmVEExHhpMz')['bazaar'][0];
        $dat554 = Torn::find(554);
        $dat554->low_value = $res554['cost'];
        $dat554->save();

        $res533 = Http::get('https://api.torn.com/market/533?selections=bazaar&key=d1LRgQmVEExHhpMz')['bazaar'][0];
        $dat533 = Torn::find(533);
        $dat533->low_value = $res533['cost'];
        $dat533->save();

        $res555 = Http::get('https://api.torn.com/market/555?selections=bazaar&key=d1LRgQmVEExHhpMz')['bazaar'][0];
        $dat555 = Torn::find(555);
        $dat555->low_value = $res555['cost'];
        $dat555->save();

        $torn = Torn::all();

        return view('torn', compact('torn'));
    }

    public function sima()
    {
        $accessToken = Auth::user()->token_sima;
        $res = Http::withHeaders([
                     'Authorization' =>  'Bearer ' . $accessToken,
                     'Content-Type' => 'application/json' 
                ])->get('http://api-stara.bpkp.go.id/api/surat-tugas/all?sumber_data=pkau&kode_satker=604435');

        return view('torn2', compact('res'));
    }

    public function simalogin()
    { 

        $res = Http::post('http://api-stara.bpkp.go.id/api/auth/login', [
            'Password' => '1321',
            'Username' => 'eko r prastiawan',
        ]);

        $res0 = $res['status_code'];

        if($res0 == 200) {
            $res1 = Auth::user()->niplama;
        }
        
        return view('torn2', compact('res1'));
    } 
    
}
