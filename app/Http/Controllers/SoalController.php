<?php

namespace App\Http\Controllers;

use App\Models\Soal;
use App\Models\Pelajaran;
use Illuminate\Http\Request;

class SoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelajaran = Pelajaran::get();
        return view('pages.admin.soal.index',compact('pelajaran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $pelajaran = Pelajaran::where('id',$id)->first();
        return view('pages.admin.soal.create',compact('pelajaran'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $pelajaran = Pelajaran::where('id',$id)->first();
        Soal::create([
            'pelajaran_id' => $pelajaran->id,
            'soal' => $request->soal,
            'jawaban' => $request->jawaban,
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Soal  $soal
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pelajaran = Pelajaran::where('id',$id)->first();
        $soal = Soal::where('pelajaran_id',$pelajaran->id)->get();
        return view('pages.admin.soal.create',compact('pelajaran','soal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Soal  $soal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $soal = Soal::where('id',$id)->first();
        $soal->update([
            'soal' => $request->soal,
            'jawaban' => $request->jawaban,
        ]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Soal  $soal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $soal = Soal::where('id',$id)->first();
        $soal->delete();
        return redirect()->back();
    }
}
