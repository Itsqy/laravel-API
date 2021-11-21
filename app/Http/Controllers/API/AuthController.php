<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Validator as ValidationValidator;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function registrasi(Request $request)
    {

        $pesan = [
            'name.required' => "namanya diisi dong ",

            'email.required' => "email diisi dong ",
            'email.unique' => "email udah ada yang punya",
            'email.email' => "email ngga valid nih", // mesti ada @ nya\

            'password.required' => "password diisi dong ",
            'password.min' => "password minimal 4 "
        ];

        $validasi =  Validator::make($request->all(), [
            'name'   => "required",
            'email'   => "required|unique:users|email",
            'password'   => "required|min:4|confirmed",

        ], $pesan);




        if ($validasi->fails()) {
            $val = $validasi->errors()->all();
            return $this->responError(0, $val[0]);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'telp' => $request->telp,
            'photo' => $request->photo,
            'password' => Hash::make($request->password),


        ]);

        return response()->json([

            'status' => 1,
            'pesan' => "$request->name, Registrasi anda berhasil ! ",
            'result' => $user
        ], Response::HTTP_OK);
    }

    public function daftar(Request $request)
    {
        $pesan = [
            'name.required' => "namanya diisi dong ",

            'email.required' => "email diisi dong ",
            'email.unique' => "email udah ada yang punya",
            'email.email' => "email ngga valid nih", // mesti ada @ nya\

            'password.required' => "password diisi dong ",
            'password.min' => "password minimal 4 "
        ];

        $request->validate([
            'name' => "required",
            'email' => "required|unique:users|email",
            'password' => "required",

        ], $pesan);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'telp' => $request->telp,
            'photo' => $request->photo,
            'password' => Hash::make($request->password),


        ]);

        return response()->json([

            'status' => 1,
            'pesan' => "$request->name, Registrasi anda berhasil ! ",
            'result' => $user
        ], Response::HTTP_OK);
    }
    public function editprofile(Request $request, $user_id)
    {

        $user = User::where('id', $user_id)->first();
        //jika id user tidak ad
        if (!$user) {
            return $this->responError(0, "profile tidak ditemukan");
        }

        // $user = User::findOrFail($user_id);
        $validasi = Validator::make($request->all(), [
            'name'           => 'required',
            'email'         => 'required',
            'address'        => 'required',
            'telp'         => 'required',

        ]);

        if ($validasi->fails()) {
            $val = $validasi->errors()->all();
            return $this->responError(0, $val[0]);
        }
        // return dd($request);
        $user->update([
            'name'           => $request->name,
            'email'         => $request->email,
            'address'        => $request->address,
            'telp'         => $request->telp,
            'photo'         => $request->photo,

        ]);

        return response()->json([
            'status' => 1,
            'pesan' => "profile berhasil diupdate",
            'result' => $user
        ], 200);
    }


    public function login(Request $request)
    {
        $pesan = [

            'email.required' => "email diisi dong ",
            'password.required' => "password diisi dong ",

        ];

        $validasi =  Validator::make($request->all(), [
            'email'   => "required|email",
            'password'   => "required|min:4",

        ], $pesan);

        if ($validasi->fails()) {
            $val = $validasi->errors()->all();
            return $this->responError(0, $val[0]);
        }

        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return $this->responError(0, "authentikasi gagal!");
        }

        return response()->json([

            'status' => 1,
            'pesan' => "$user->name, login anda berhasil ! ",
            'result' => $user
        ], Response::HTTP_OK);
    }

    public function changePassword(Request $request, $user_id)
    {
        $pesan = [

            'email.required' => "email diisi dong ",
            'password.required' => "password diisi dong ",
            'new_password.confirmed' => "konfirm diisi dong ",

        ];

        $user = User::where('id', $user_id)->first();

        if (!$user) {
            return $this->responError(0, "akun tidak ditemukan");
        }

        if (!Hash::check($request->get('password'), $user->password)) {
            return response()->json([
                'status' => 0,
                'pesan' => "password salah ngab",
            ], 400);
        }

        if (strcmp($request->get('password'), $request->get('new_password')) == 0) {
            return response()->json([
                'status' => 0,
                'pesan' => "password g bisa sama",
            ], 400);
        }
        $validasi =  Validator::make($request->all(), [
            'password' => 'required',
            'new_password' => 'required|string|min:4|confirmed',
        ], $pesan);



        if ($validasi->fails()) {
            $val = $validasi->errors()->all();
            return $this->responError(0, $val[0]);
        }

        $user->password = bcrypt($request->get('new_password'));
        $user->save();

        return response()->json([

            'status' => 1,
            'pesan' => "edit password berhasil berhasil ! ",
            'result' => $user
        ], Response::HTTP_OK);
    }

    public function getUser($user_id)
    {
        $user = User::where('id', $user_id)->first();

        return response()->json([
            'status'    => 1,
            'pesan'    => "Berhasil mendapatkan user !",
            'result'    => $user
        ], Response::HTTP_OK);
    }


    public function responError($status, $pesan)
    {

        return response()->json([
            'status' => $status,
            'message' => $pesan
        ], Response::HTTP_UNAUTHORIZED);
    }
}
