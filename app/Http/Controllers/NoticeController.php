<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoticeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (auth()->user()->role !== 'Superuser') {
            abort(403);
        }

        $datas = Notice::all();

        return view('notice.index', [
            'datas' => $datas,
            'title' => 'Pemberitahuan'
        ]);
    }

    public function store(Request $request)
    {
        if (auth()->user()->role !== 'Superuser') {
            abort(403);
        }

        $input = new Notice;

        // $input->user_id = Auth::user()->id;
        $input->isi = $request->isi;
        $input->user_id = Auth::user()->id;
        $input->save();

        return redirect()->back()->with('status', 'Berhasil menambah pemberitahuan "'.$request->isi.'".');
    }

    public function edit(Request $request, $id)
    {
        if (auth()->user()->role !== 'Superuser') {
            abort(403);
        }

        $token = $request->session()->token();
        $token = csrf_token();

        $input = Notice::find($id);
        $isi = $input->isi;

        $input->isi = $request->isi;
        $input->update();

        return redirect()->back()->with('status', 'Berhasil mengubah isi pemberitahuan "'.$isi.'" menjadi "'.$request->isi.'".');
    }

    public function destroy(Request $request, $id)
    {
        if (auth()->user()->role !== 'Superuser') {
            abort(403);
        }

        $token = $request->session()->token();
        $token = csrf_token();

        $input = Notice::find($id);
        $isi = $input->isi;
        $input->delete();

        return redirect()->back()->with('status', 'Berhasil menghapus pemberitahuan "'.$isi.'".');
    }
}
