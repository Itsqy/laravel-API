<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
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
            'password' => Hash::make($request->password),


        ]);

        return response()->json([

            'status' => 1,
            'pesan' => "$request->name, Registrasi anda berhasil ! ",
            'data' => $user
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
            'password' => Hash::make($request->password),


        ]);

        return response()->json([

            'status' => 1,
            'pesan' => "$request->name, Registrasi anda berhasil ! ",
            'data' => $user
        ], Response::HTTP_OK);
    }

    public function responError($status, $pesan)
    {

        return response()->json([
            'status' => $status,
            'message' => $pesan
        ], Response::HTTP_OK);
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
            'pesan' => "$user->name, Registrasi anda berhasil ! ",
            'data' => $user
        ], Response::HTTP_OK);
    }
}
