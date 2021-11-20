<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class DoaController extends Controller
{
    public function doa()
    {
        $response = Http::get('https://doa-doa-api-ahmadramadhan.fly.dev/api');
        $data = $response->json();
        // dd($data);

        return view('welcome', compact('data'));
    }

    public function apionline()
    {
        $response = Http::get('https://ictjuara.000webhostapp.com/api/wisata');
        $data = $response->json();
        // karn a api nya bang feb itu didalam nya ada "data", maka kita mesti open si "data" ini dulu make var di bawah
        $data = $data['data'];
        // dd($data);

        return view('apionline', compact('data'));
    }

    public function postdata()
    {
        return view('postdata');
    }

    public function posting(Request $request)
    {
        // dd($request);
        Http::post('http://firstapi2303.herokuapp.com/api/register', $request->input());
        return redirect()->back();
    }

    public function kategori()
    {
        return view('kategori');
    }

    public function addkategori(Request $request)
    {
        Http::post('https://ictjuara.000webhostapp.com/api/add-kategori', $request->input());
        return redirect()->back();
    }

    public function login()
    {

        $response['status'] = 1;
        return view('loginapi', compact('response'));
    }

    public function loginposting(Request $request)
    {

        $response = Http::post('http://firstapi2303.herokuapp.com/api/login', $request->input())->json();
        $success = $response['status'];


        if ($response['status'] == 0) {
            return view('loginapi', compact('response'));
        };

        return view('datauser', compact('response'));

        // dd($request);

    }


    public function edit()
    {
        // $id = User::findOrFail($id);
        $title = 'edit aja';
        $response['status'] = 1;
        return view('edituser', compact('response', 'title'));
    }

    public function editposting(Request $request)
    {
        // $produk = Produk::findOrFail($id)
        // $id = User::findOrFail($id);
        // $id = Auth::id();
        $response = Http::put('http://firstapi2303.herokuapp.com/api/edit', $request->input())->json();
        $success = $response['status'];


        if ($response['status'] == 0) {
            return view('edituser', compact('response'));
        };

        return view('datauser', compact('response'));

        // dd($request);

    }
}
