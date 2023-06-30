<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ongkir;
use Carbon\Carbon;

class OngkirController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }

    public function index(Request $request)
    {
        $title = 'Master Ongkir';
        $ongkir = Ongkir::orderBy('name','asc')->whereNull('delete_at')->get();
        return view('ongkir.index', compact('title','ongkir'));
    }

    public function create()
    {
        $title = 'Create Ongkir';
        return view('ongkir.create',compact('title'));
    }

    public function store(Request $request)
    {
        $input = $request->all();

        Ongkir::create($input);
        return redirect()->back()->with('status','Anda berhasil menambahkan ongkir');

    }

    public function edit($id)
    {
        $title = 'Edit Product';
        $ongkir = Ongkir::findOrFail($id);
        return view('ongkir.edit', compact('ongkir', 'title'));
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $ongkir = Ongkir::findOrFail($id);
        $ongkir->update($input);
        return redirect()->back()->with('status','Anda berhasil mengubah data ongkir');
    }

    public function destroy($id)
    {
        $ongkir = Ongkir::findOrFail($id);

        Ongkir::find($id)->update([
            'delete_at' => Carbon::now()
        ]);
        return redirect()->back()->with('status','Anda berhasil menghapus ongkir '.$ongkir->name);
    }


}
