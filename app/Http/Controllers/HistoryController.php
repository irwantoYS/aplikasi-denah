<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Freezer;
use App\Models\History;
use Illuminate\Support\Facades\Validator;

class HistoryController extends Controller
{
    public function index(Request $request)
    {
        $freezers = Freezer::get();
        return view('history.index', compact('freezers'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'          => 'required|alpha',
            'employee_id'   => 'required',
            'datetime'      => 'required',
            'freezer_id'    => 'required',
            'purpose'       => 'required',
        ], [
            'name.required' => 'Kolom nama harus diisi.',
            'name.alpha'    => 'Kolom nama hanya boleh berisi huruf.',
            'employee_id.required' => 'Kolom ID karyawan harus diisi.',
            'datetime.required'    => 'Kolom datetime harus diisi.',
            'freezer_id.required'  => 'Kolom freezer ID harus diisi.',
            'purpose.required'     => 'Kolom tujuan harus diisi.',
        ]); 
    
        // Jika validasi gagal, kembali ke halaman sebelumnya dengan pesan kesalahan
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
    
        // Jika validasi sukses, lanjutkan penyimpanan
        $history = History::create([
            'name'          => $request['name'],
            'employee_id'   => $request['employee_id'],
            'datetime'      => $request['datetime'],
            'freezer_id'    => $request['freezer_id'],
            'purpose'       => $request['purpose'],
        ]);
    
        if ($history) {
            return redirect()->back()
                ->with("success", "Riwayat telah disimpan!");
        }
    }
    

    public function adminindex(Request $request)
    {
        $histories = History::get();
        return view('history.admin-index', compact('histories','request'));
    }
    public function getData()
    {
       
        $histories = History::with('freezer')->orderBy('created_at', 'desc')->paginate();
        return view('history.admin-index', compact('histories'));
    }
}
