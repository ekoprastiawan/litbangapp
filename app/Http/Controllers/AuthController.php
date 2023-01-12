<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $now = Carbon::now('Asia/Jakarta');

        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $loginSima = Http::post('http://api-stara.bpkp.go.id/api/auth/login', [
            'Password' => $request->password,
            'Username' => $request->username,
        ]);

        $nipSima = $loginSima['data']['user_info']['user_nip'];

        if($nipSima) {
            $userAdvis = User::where('niplama',$nipSima)->first();
            $credentials = $request->only('username', 'password');

            if ($userAdvis) {
                $userAdvis->token_sima =  $loginSima['data']['token'];  
                $userAdvis->save();         
                if (Auth::attempt($credentials)) {
                    return redirect()->intended('dashboard')
                                ->withSuccess('You have Successfully loggedin');
                    }
                } else {
                    $id = new User;
                    $id->name = $loginSima['data']['user_info']['name'];
                    $id->username = $request->get('username');
                    $id->password = Hash::make($request->get('password'));
                    $id->niplama = $loginSima['data']['user_info']['user_nip'];
                    $id->token_sima = $loginSima['data']['token'];
                    $id->created_at = $now;
                    $id->save();

                    if (Auth::attempt($credentials)) {
                    return redirect()->intended('dashboard')
                                ->withSuccess('You have Successfully loggedin');
                    }
                }
        } else {
            return redirect()->route('/')->withSuccess('Silahkan coba lagi.');
        }        
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()
            ->route('landing');
    }
}
