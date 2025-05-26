<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Gudang;
use Illuminate\Http\Request;

class GudangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $gudangs = Gudang::all();
        return view('gudang.index', compact('gudangs') );
    }

    public function create(Request $request)
    {
        if ($request->has('id')) {
            $gudang = Gudang::findOrFail($request->id);
            return view('gudang.create', compact('gudang'));
        }
        return view('gudang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_gudang' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'kota' => 'required|string|max:100',
            'provinsi' => 'required|string|max:100',
        ]);
        Gudang::updateOrCreate(
            ['id' => $request->id?? null],
            [
            'nama_gudang' => $request->nama_gudang,
            'alamat' => $request->alamat,
            'kota' => $request->kota,
            'provinsi' => $request->provinsi,
            ]

        );

        return redirect()->route('gudang.index')->withSuccess('Gudang created successfully.');
    }

    
    
    

    public function destroy($id)
    {
        $gudang = Gudang::findOrFail($id);
        $gudang->delete();

        return redirect()->back()->withSuccess('Gudang deleted successfully.');
    }
}
