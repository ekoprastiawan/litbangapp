<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use App\Models\User;
use Config;

class AuthController extends Controller
{
    public function loginkms(Request $request)
    {
        $key = Config::get('apikeys.kms_key');
        
        $id = $request->tokenkms;

        $kms = JWT::decode($id, new Key($key, 'HS256'));

        $data = (array) $kms;

        $nama = $data['name'];
        $username = $data['username'];
        $password = $data['password'];
        $nip = $data['nip'];

        $user = User::where('niplama', $nip)->first();

        if($user) {
            $userupdate = User::find($user->id);
            $userupdate->name = $nama;
            $userupdate->username = $username;
            $userupdate->password = Hash::make($password);
            $userupdate->save();
        } else {
            $usercreate = new User();
            $usercreate->name = $nama;
            $usercreate->username = $username;
            $usercreate->password = Hash::make($password);
            $usercreate->niplama = $nip;
            $usercreate->save();
        }
        
        if (Auth::attempt(['username' => $username, 'password' => $password])) {
            return redirect()
            ->route('landing');
        }        
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()
            ->route('landing');
    }
}
