<?php

namespace App\Http\Controllers;

use App\Models\Soal;
use App\Models\Jawaban;
use App\Models\Pelajaran;
use Illuminate\Http\Request;

class JawabanController extends Controller
{
    public function index($id)
    {
        $soal = Soal::where('id', $id)->first();
        $jawaban = Jawaban::where('soal_id',$soal->id)->get();
        $pelajaran = Pelajaran::where('id',$soal->pelajaran_id)->first();
        return view('pages.admin.jawaban.index', compact('soal','pelajaran','jawaban'));
    }

    public function store(Request $request, $id)
    {
        $soal = Soal::where('id', $id)->first();
        $pelajaran = Pelajaran::where('id',$soal->pelajaran_id)->first();

        // Simpan jawaban pada model Jawaban
        Jawaban::create([
            'pelajaran_id' => $pelajaran->id,
            'soal_id' => $soal->id,
            'jawaban_A' => $request->jawaban_A,
            'jawaban_B' => $request->jawaban_B,
            'jawaban_C' => $request->jawaban_C,
            'jawaban_D' => $request->jawaban_D,
        ]);

        return redirect()->back();
    }

    public function update(Request $request,$id)
    {
        $jawaban = Jawaban::where('id',$id)->first();
        $jawaban->update([
            'jawaban_A' => $request->jawaban_A,
            'jawaban_B' => $request->jawaban_B,
            'jawaban_C' => $request->jawaban_C,
            'jawaban_D' => $request->jawaban_D,
        ]);
        return redirect()->back();
    }

    public function destroy($id)
    {
        $jawaban = Jawaban::where('id',$id)->first();
        $jawaban->delete();
        return redirect()->back();
    }
}
