<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Materi;
use App\Models\Soal;
use App\Models\Umpan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index() 
    {

        $totalUser = DB::table('users')->count();
        $totalMateri = DB::table('materis')->count();

        return view('admin.dashboard', ['totalUser' => $totalUser, 'totalMateri' => $totalMateri]);
    }

    public function materi() 
    {
        return view('admin.materi');
    }

    public function materismp(Request $request)
    {
        $materiSmp = DB::table('materis')
                     ->where('tingkatPendidikan', 'smp')
                     ->get();

        $search = $request->input('search');

        $posts = Materi::query()
            ->where('judulMateri', 'LIKE', "%{$search}%")
            ->where('tingkatPendidikan', 'smp')
            ->get();

        return view('admin.materismp', ['keySmp' => $materiSmp], compact('posts'));
    }

    public function editsmp($id) 
    {
        $dataMateri = DB::table('materis')
                      ->where('id', $id)
                      ->get();

        return view('admin.editmaterismp', ['editDataMateri' => $dataMateri]);
    }

    public function updatesmp(Request $request)
    {
        $old = Materi::find($request->id);
        $oldid = $old['pdfFile'];

        $pdfFiles = $request->file('pdfFile')->store('files');
        Storage::delete($oldid);


        DB::table('materis')->where('id', $request->id)->update([
            'judulMateri' => $request->judulMateri,
            'deskripsiMateri' => $request->deskripsiMateri,
            'tingkatPendidikan' => $request->tingkatPendidikan,
            'pdfFile' => $pdfFiles,
            'ytLink' => $request->ytLink
        ]);

        return redirect()->intended('/kelola-materi/smp')->with('updateBerhasil', 'Data berhasil diperbarui');

    }

    public function materisma(Request $request) 
    {
        $materiSma = DB::table('materis')
                     ->where('tingkatPendidikan', 'sma')
                     ->get();

        $search = $request->input('search');

        $posts = Materi::query()
            ->where('judulMateri', 'LIKE', "%{$search}%")
            ->where('tingkatPendidikan', 'sma')
            ->get();

        return view('admin.materisma', ['keySma' => $materiSma], compact('posts'));
    }

    public function editsma($id) 
    {
        $dataMateri = DB::table('materis')
                      ->where('id', $id)
                      ->get();

        return view('admin.editmaterisma', ['editDataMateri' => $dataMateri]);
    }

    public function updatesma(Request $request)
    {
        $old = Materi::find($request->id);
        $oldid = $old['pdfFile'];

        $pdfFiles = $request->file('pdfFile')->store('files');
        Storage::delete($oldid);


        DB::table('materis')->where('id', $request->id)->update([
            'judulMateri' => $request->judulMateri,
            'deskripsiMateri' => $request->deskripsiMateri,
            'tingkatPendidikan' => $request->tingkatPendidikan,
            'pdfFile' => $pdfFiles,
            'ytLink' => $request->ytLink
        ]);

        return redirect()->intended('/kelola-materi/sma')->with('ubahBerhasil', 'Data berhasil diperbarui');

    }

    public function materikuliah(Request $request) 
    {
        $materiKuliah = DB::table('materis')
                     ->where('tingkatPendidikan', 'kuliah')
                     ->get();

        $search = $request->input('search');

        $posts = Materi::query()
            ->where('judulMateri', 'LIKE', "%{$search}%")
            ->where('tingkatPendidikan', 'kuliah')
            ->get();

        return view('admin.materikuliah', ['keyKuliah' => $materiKuliah], compact('posts'));
    }

    public function editkuliah($id) 
    {
        $dataMateri = DB::table('materis')
                      ->where('id', $id)
                      ->get();

        return view('admin.editmaterikuliah', ['editDataMateri' => $dataMateri]);
    }

    public function updatekuliah(Request $request)
    {
        $old = Materi::find($request->id);
        $oldid = $old['pdfFile'];

        $pdfFiles = $request->file('pdfFile')->store('files');
        Storage::delete($oldid);


        DB::table('materis')->where('id', $request->id)->update([
            'judulMateri' => $request->judulMateri,
            'deskripsiMateri' => $request->deskripsiMateri,
            'tingkatPendidikan' => $request->tingkatPendidikan,
            'pdfFile' => $pdfFiles,
            'ytLink' => $request->ytLink
        ]);

        return redirect()->intended('/kelola-materi/kuliah')->with('ubahBerhasil2', 'Data berhasil diperbarui');

    }

    public function tambahmateri()
    {
        return view('admin.tambahmateri');
    }

    public function addMateri(Request $request) 
    {

        $storeMateri = $request->validate([
            'judulMateri' => 'required|unique:materis',
            'deskripsiMateri' => 'required|min:20',
            'tingkatPendidikan' => 'required',
            'pdfFile' => 'required|file',
            'ytLink' => 'required'
        ]);

        if($request->file('pdfFile')) {
            $storeMateri['pdfFile'] = $request->file('pdfFile')->store('files');
        }

        Materi::create($storeMateri);
        return back()->with('tambahMateriBerhasil', 'Materi Berhasil Diupload');
    }

    public function deleteMateri($id)
    {
        DB::table('materis')->where('id', $id)->delete();

        return back()->with('dataBerhasilDihapus', 'Materi anda sudah dihapus');
    }

    public function profile()
    {
        $photo = Auth::user()->photo;
        $education = Auth::user()->education;

        return view('admin.profil', ['photo' => $photo, 'education' => $education]);
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

    public function lihatController()
    {
        // $pemberiRespon = DB::table('umpans')->orderBy('id', 'DESC')->get();

        $pemberiRespon = DB::table('umpans')
                            ->join('users', 'umpans.name', '=', 'users.username')
                            ->select('umpans.isiFeedback', 'users.photo', 'users.name')
                            ->orderBy('umpans.id', 'DESC')
                            ->paginate(5);

        return view("admin.feedback", ['pemberiRespon' => $pemberiRespon]);
    
    }

    public function kelolaSoal()
    {
        $soalSMP = DB::table('soals')
                   ->select('kategori', DB::raw('count(*) as total'))
                   ->groupBy('kategori')
                   ->where('tingkatPendidikan', 'smp')
                   ->get();

        $soalSMA = DB::table('soals')
                   ->select('kategori', DB::raw('count(*) as total'))
                   ->groupBy('kategori')
                   ->where('tingkatPendidikan', 'sma')
                   ->get();

        $soalKULIAH = DB::table('soals')
                   ->select('kategori', DB::raw('count(*) as total'))
                   ->groupBy('kategori')
                   ->where('tingkatPendidikan', 'kuliah')
                   ->get();

        return view("admin.soal", ['soalSMP' => $soalSMP, 'soalSMA' => $soalSMA, 'soalKULIAH' => $soalKULIAH]);
    }

    public function editSoal($kategori)
    {
        $isiSoal = DB::table('soals')
                   ->where('kategori', $kategori)
                   ->get();

        return view('admin.editSoal', ['isiSoal' => $isiSoal]);
    }

    public function prosesEditSoal(Request $request) 
    {
        $data = $request->all();

        if(count(array($data['soal'] > 0))) {
            foreach ($data['soal'] as $item => $value) {
                $data2 = array(
                    'id' => $data['id'][$item],
                    'kategori' => $data['kategori'],
                    'soal' => $data['soal'][$item],
                    'jawaban' => $data['jawaban'][$item],
                    'tingkatPendidikan' => $data['tingkatPendidikan']
                );

                DB::table('soals')->where('id', $data['id'][$item])->update($data2);

            }
        }

        return back()->with('editSoalBerhasil', 'Soal Berhasil Diperbarui');

    }

    public function hapusSoal($id) 
    {
        DB::table('soals')->where('id', $id)->delete();

        return back()->with('SoalBerhasilDihapus', 'Soal Berhasil Dihapus');
    }

    public function tambahSoalSmp() 
    {
        $kategoriSoal = DB::table('materis')
                           ->where('tingkatPendidikan', 'smp')
                           ->get();

        return view("admin.tambahSoalSmp", ['kategoriSoal' => $kategoriSoal]);
    }

    public function prosesSoal(Request $request) 
    {

        $data = $request->all();

        if(count(array($data['soal'] > 0))) {
            foreach ($data['soal'] as $item => $value) {
                $data2 = array(
                    'kategori' => $data['kategori'],
                    'soal' => $data['soal'][$item],
                    'jawaban' => $data['jawaban'][$item],
                    'tingkatPendidikan' => $data['tingkatPendidikan']
                );

                Soal::create($data2);

            }
        }

        return back()->with('tambahSoalBerhasil', 'Soal Berhasil Diupload');
    }

    public function tambahSoalSma() 
    {
        $kategoriSoal = DB::table('materis')
                           ->where('tingkatPendidikan', 'sma')
                           ->get();

        return view("admin.tambahSoalSma", ['kategoriSoal' => $kategoriSoal]);
    }

    public function tambahSoalKuliah() 
    {
        $kategoriSoal = DB::table('materis')
                           ->where('tingkatPendidikan', 'kuliah')
                           ->get();

        return view("admin.tambahSoalKuliah", ['kategoriSoal' => $kategoriSoal]);
    }

    public function leaderboardAdmin()
    {
        $dataRank = DB::table('users')->where('level', 'user')->orderBy('point', 'DESC')->get();

        return view('admin.leaderboard', ['dataRank' => $dataRank]);
    }

}