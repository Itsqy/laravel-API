<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Restoran;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class RestoranController extends Controller
{
    public function createRestoMenu(Request $request)
    {
        $resto     = new Restoran();
        $pesan = [
            'nama_resto.required'  => 'nama resto wajib',
            'alamat.required'      => 'alamat wajib',
            'telp.required'        => 'telp resto wajib',
            'jam_buka.required'    => 'jam buka resto wajib',



        ];
        $request->validate([
            'nama_resto'  => ['required'],
            'alamat'      => ['required'],
            'telp'        => ['required'],
            'jam_buka'    => ['required'],

        ], $pesan);



        $resto->nama_resto        = $request->nama_resto;
        $resto->alamat            = $request->alamat;
        $resto->telp              = $request->telp;
        $resto->jam_buka          = $request->jam_buka;
        $resto->rating            = $request->rating;
        $resto->save();


        // $menu = new Menu();
        // $menu->resto_id          = $resto->id;
        // $menu->nama_menu   = $request->nama_menu;
        // $menu->harga       = $request->harga;
        // $menu->kategori    = $request->kategori;
        // $menu->save();

        foreach ($request->list_menu as $value) {
            $menu = array(
                'resto_id'     => $resto->id,
                'nama_menu'    => $value['nama_menu'],
                'harga'        => $value['harga'],
                'kategori'     => $value['kategori']
            );
            Menu::create($menu);
        }
        $data = Menu::where('resto_id', $resto->id)->get();
        return response()->json([

            'status' => 1,
            'pesan' => "Berhasil ",
            'restoran' => $resto,
            'menu' => $data,

        ], Response::HTTP_OK);
    }

    public function getRestoMenu($id)
    {
        $resto = Restoran::where('id', $id)->first();
        if (!$resto)
            return $this->responError(0, "data restoran tidak ada!!");

        $data = Menu::where('resto_id', $resto->id)->get();
        return response()->json([
            'status' => 1,
            'pesan' => "Berhasil ",
            'resto' => $resto,
            'menu' => $data,
        ], Response::HTTP_OK);
    }
    public function editRestoMenu(Request $request, $resto_id)
    {
        $resto = Restoran::where('id', $resto_id)->first();
        if (!$resto) {
            return $this->responError(0, "data restoran tidak ada!!");
        }


        $validasi = Validator::make($request->all(), [
            'nama_resto'    => "required",
            'alamat'        => "required",
            'telp'     => "required",
            'jam_buka'     => "required",
            'rating'     => "required",
        ]);

        if ($validasi->fails()) {
            $val = $validasi->errors()->all();
            return $this->responError(0, $val[0]);
        }

        $resto->update([
            'nama_resto'           => $request->nama_resto,
            'alamat'         => $request->alamat,
            'telp'        => $request->telp,
            'jam_buka'         => $request->jam_buka,
            'rating'         => $request->rating,

        ]);
        return response()->json([
            'status' => 1,
            'pesan' => "berhasil update semua data resto",
            'update an' => $resto
        ], Response::HTTP_OK);
    }

    public function getAllmenu()
    {
        $menu = Menu::all();

        return response()->json([
            'status' => 1,
            'pesan' => "berhasil mendapatkan semua menu",
            'result' => $menu
        ], Response::HTTP_OK);
    }

    public function searchmenu(Request $request)
    {
        $title = 'search';
        if (empty($request->search)) {
            return $this->getAllmenu();
        }

        $keyword = $request->search;
        // $JumlahUser = Menu::all()->count();
        $menu = Menu::where('nama_menu', 'like', "%" . $keyword . "%")->first();

        if (!$menu) {
            return $this->responError(0, "data yang dicari tidak ada ");
        }


        $menu = Menu::where('nama_menu', 'like', "%" . $keyword . "%")->get();
        // return view('user.produk.index', compact('produk', 'title', 'JumlahUser'))->with('i', (request()->input('page', 1) - 1) * 5);


        return response()->json([
            'status' => 1,
            'pesan' => "ini yang kamnu cari",
            'result' => $menu
        ], Response::HTTP_OK);
    }

    public function responError($status, $pesan)
    {

        return response()->json([
            'status' => $status,
            'pesan' => $pesan,
        ], Response::HTTP_NOT_FOUND);
    }
}
