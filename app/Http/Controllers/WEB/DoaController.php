<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
        Http::post('https://ictjuara.000webhostapp.com/api/regis', $request->input());
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
}
