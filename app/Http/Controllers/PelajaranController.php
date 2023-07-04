<?php

namespace App\Http\Controllers;

use App\Models\Pelajaran;
use Illuminate\Http\Request;

class PelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelajaran = Pelajaran::get();
        return view('pages.admin.pelajaran.index',compact('pelajaran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.pelajaran.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Pelajaran::create([
            'nama' => $request->nama
        ]);

        return redirect()->route('pelajaran.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pelajaran  $pelajaran
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pelajaran = Pelajaran::where('id',$id)->first();
        return view('pages.admin.pelajaran.edit',compact('pelajaran'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pelajaran  $pelajaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pelajaran = Pelajaran::where('id',$id)->first();

        $pelajaran->update([
            'nama' => $request->nama
        ]);
        return redirect()->route('pelajaran.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pelajaran  $pelajaran
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pelajaran = Pelajaran::where('id',$id)->first();
        $pelajaran->delete();
        return redirect()->route('pelajaran.index');
    }

    public function show($id)
    {
        $pelajaran = Pelajaran::where('id',$id)->first();
        return view('pages.admin.pelajaran.show',compact('pelajaran'));
    }
}
