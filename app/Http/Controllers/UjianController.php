<?php

namespace App\Http\Controllers;

use App\Models\Soal;
use App\Models\Ujian;
use App\Models\Jawaban;
use App\Models\Pelajaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UjianController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if($user->roles == 'admin'){
            $pelajaran = Pelajaran::get();
            return view('pages.admin.ujian.index', compact('pelajaran'));
        }else{
            $pelajaran = Pelajaran::get();
            return view('pages.pelajar.ujian.index', compact('pelajaran'));
        }
    }

    public function edit($id)
    {
        $pelajaran = Pelajaran::where('id', $id)->first();
        return view('pages.pelajar.ujian.edit', compact('pelajaran'));
    }

    public function update(Request $request, $id)
    {
        $pelajaran = Pelajaran::where('id', $id)->first();
        $jawabanSoal = $request->all();

        $soal = Soal::where('pelajaran_id', $pelajaran->id)->get();
        foreach ($soal as $value) {
            foreach ($jawabanSoal as $pilihanJawaban) {
                $jawaban = Jawaban::where('soal_id', $value->id)->first();
                if ($value->jawaban == $pilihanJawaban) {
                    $jawaban->update([
                        'pilihan_jawaban' => true
                    ]);
                }
            }
            $soal_benar = $jawaban->where('pelajaran_id', $pelajaran->id)->where('pilihan_jawaban', true)->count();
            $total_soal = $soal->count();
            $nilai = (($soal_benar / $total_soal) * 100);
        }

        $user = Auth::user();
        Ujian::create([
            'pelajaran_id' => $pelajaran->id,
            'user_id' => $user->id,
            'pelajaran' => $pelajaran->nama,
            'soal_benar' => $soal_benar,
            'total_soal' => $total_soal,
            'nilai' => $nilai,
            'status' => 'success'
        ]);

        $soal = Soal::where('pelajaran_id', $pelajaran->id)->get();
        foreach ($soal as $item) {
            $resetJawaban = Jawaban::where('soal_id', $item->id)->where('pilihan_jawaban', true)->first();

            if ($resetJawaban) {
                $resetJawaban->update([
                    'pilihan_jawaban' => false
                ]);
            }
        }

        return redirect()->route('ujian.index');
    }
    public function show(Request $request,$id)
    {
        $pelajaran_id = $request->pelajaran_id;
        $user = Auth::user();
        if($user->roles == 'admin'){
            $ujian = Ujian::where('pelajaran_id',$pelajaran_id)->get();
            return view('pages.admin.ujian.show', compact('ujian'));
        }else{
            $ujian = Ujian::where('id',$id)->where('user_id',$user->id)->first();
            return view('pages.pelajar.ujian.show', compact('ujian'));
        }
    }

    public function detail_show($id)
    {
        $ujian = Ujian::where('id',$id)->first();
        $pelajaran = Pelajaran::where('id',$ujian->pelajaran_id)->first();
        return view('pages.admin.ujian.detail-show',compact('ujian','pelajaran'));
    }
}
