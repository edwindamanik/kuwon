<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Materi;
use App\Models\Umpan;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() 
    {
        $username = Auth::user()->username;

        $mataPelajaran = DB::table('skors')->where('username', $username)->get();

        $countMapelDikerjakan = count($mataPelajaran);

        $jenjang = Auth::user()->education;

        $materi = DB::table('materis')->where('tingkatPendidikan', $jenjang)->get();
        $countMateri = count($materi);
        return view('user.dashboard', ['countMapelDikerjakan' => $countMapelDikerjakan, 'countMateri' => $countMateri]);
    }

    public function profile()
    {
        $photo = Auth::user()->photo;
        $education = Auth::user()->education;

        return view('user.profilUser', ['photo' => $photo, 'education' => $education]);
    }

    public function updateProfile(Request $request)
    {
        $old = User::find($request->id);

        $oldid = $old['photo'];
        print("$oldid");

        $photo = $request->file('photo')->store('files');
        Storage::delete($oldid);

        DB::table('users')->where('id', $request->id)->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'birth' => $request->birth,
            'education' => $request->education,
            'photo' => $photo
        ]);

        return back()->with('BerhasilUpdateProfil', 'Data anda berhasil diperbaharui');
    }

    public function materi(Request $request)
    {
        $statusPendidikan = Auth::user()->education;

        $listMateri = DB::table('materis')->where('tingkatPendidikan', $statusPendidikan)->get();

        $search = $request->input('search');

        $posts = Materi::query()
                ->where('judulMateri', 'LIKE', "%{$search}%")
                ->where('tingkatPendidikan', $statusPendidikan)
                ->get();

        return view('user.listMateri', ['listMateri' => $listMateri], compact('posts'));
    }

    public function materiBelajar($id)
    {
        $statusPendidikan = Auth::user()->education;
        
        $materiDipilih = DB::table('materis')->where('tingkatPendidikan', $statusPendidikan)
                            ->where('id', $id)
                            ->get();
        
        $pdfMateri = Materi::find($id);
        $pdfName = $pdfMateri['pdfFile'];

        $pdfMateri = DB::table('materis')->where('tingkatPendidikan', $statusPendidikan)
                                         ->where('id', $id)
                                         ->select('pdfFile')
                                         ->get();

        $y = DB::table('materis')->where('tingkatPendidikan', $statusPendidikan)
                                         ->where('id', $id)
                                         ->select('judulMateri')
                                         ->first();

        $x = DB::table('soals')->select('kategori')->where('kategori', $y->judulMateri) ->get();

        $countMateri = count($x);
        
        return view('user.materi', ['materiDipilih' => $materiDipilih, 'pdfName' => $pdfName, 'countMateri' => $countMateri]);
    }

    public function feedback() 
    {
        return view('user.feedback');
    }

    public function sendFeedback(Request $request)
    {
        $namaPemberiRating = $request->name;
        
        $usernameRating = Umpan::where('name', '=', $namaPemberiRating)->first();
        
        if($usernameRating === null) {
            $storeFeedback = $request->validate([
                'namaPengirim' => 'required',
                'name' => 'required',
                'isiFeedback' => 'required',
                'ratingValue' => 'required'
            ]);

            Umpan::create($storeFeedback);
            return back()->with('berhasilFeedback', 'Feedback Berhasil Dikirim');
        }
        else {
            return back()->with('gagalFeedback', 'Feedback Sudah anda berikan sebelumnya');
        }
        
    }

    public function latihanSoal($judulMateri)
    {
        $soal = DB::table('soals')->where('kategori', $judulMateri)->get();

        $answer = DB::table('answers')->get();

        $tampilkanPoint = DB::table('skors')
                                ->where('username', Auth::user()->username)
                                ->where('kategori', $judulMateri)
                                ->get();

        $materiDipilih = DB::table('materis')->where('judulMateri', $judulMateri)
                            ->get();         

        return view("user.soal", ['soal' => $soal, 'answer' => $answer, 'tampilkanPoint' => $tampilkanPoint, 'materiDipilih' => $materiDipilih]);
    }

    public function cekPenilaian(Request $request)
    {
        $data = $request->all();

        // dd($data);

        if(count(array($data['kategori'] > 0))) {
            foreach ($data['kategori'] as $item => $value) {
                $data2 = array(
                    'kategori' => $data['kategori'][$item],
                    'soal' => $data['soal'][$item],
                    'usernamePenjawab' => $data['usernamePenjawab'][$item],
                    'jawaban' => $data['jawaban'][$item],
                    'jawabanPeserta' => $data['jawabanPeserta'][$item],
                );
                Answer::create($data2);

            }
        }

        $abc = DB::table('answers')
            ->where('usernamePenjawab', Auth::user()->username)
            ->where('kategori', $data['kategorii'])
            ->whereColumn('jawaban', 'jawabanPeserta')
            ->get();

        $x = DB::table('answers')
            ->where('usernamePenjawab', Auth::user()->username)
            ->where('kategori', $data['kategorii'])
            ->get();

        
        $point = (count($abc) * 100) / count($x);
        $usernamePoint = Auth::user()->username;
        $kategoriPoint = $data['kategorii'];

        DB::table('skors')->insert([
            'username' => $usernamePoint,
            'kategori' => $kategoriPoint,
            'point' => $point
        ]);

        $totalPoint = DB::table('skors')->select('point')->where('username', Auth::user()->username)->sum('point');
        DB::table('users')
        ->where('username', Auth::user()->username)
        ->update(['point'=> $totalPoint]);

        return redirect()->back();
    }

    public function leaderboard()
    {
        $dataRank = DB::table('users')->where('level', 'user')->orderBy('point', 'DESC')->get();

        return view('user.leaderboard', ['dataRank' => $dataRank]);
    }

    public function donasi()
    {
        return view('user.donasi');
    }

}