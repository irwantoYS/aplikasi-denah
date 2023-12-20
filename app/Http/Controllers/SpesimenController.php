<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Spesimen;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class SpesimenController extends Controller
{
    // public function index()
    // {
    //     $spesimens = Spesimen::getAllSpesimens();
    //     return view('spesimen.index', compact('spesimens'));
    // }

    public function create()
    {
        return view('spesimen.create');
    }

    public function store(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'datetime' => 'required|date',
            'origin' => 'required|string',
            'courier_name' => 'required|string',
            'expedition' => 'required|string',
            'pic_name' => 'required|string',
            'pic_phone' => 'required|numeric',
            'specimen_type' => 'required|string',
            'specimen_quantity' => 'required|integer',
            'specimen_temperature' => 'required|string|in:dingin,suhu_ruang',
        ]);

        // Simpan data ke dalam model Spesimen
        Spesimen::create($validatedData);

        // Redirect atau lakukan aksi lainnya setelah penyimpanan berhasil
        return redirect()->route('spesimen.index')->with('success', 'Data spesimen berhasil disimpan.');
    }


    public function index(Request $request)
    {
        $search = $request->input('search');

        $spesimens = Spesimen::query();

        // Jika terdapat parameter pencarian, filter data
        if ($search) {
            $spesimens->where(function ($query) use ($search) {
                $query->where('datetime', 'LIKE', '%' . $search . '%')
                    ->orWhere('origin', 'LIKE', '%' . $search . '%')
                    ->orWhere('courier_name', 'LIKE', '%' . $search . '%')
                    ->orWhere('expedition', 'LIKE', '%' . $search . '%')
                    ->orWhere('pic_name', 'LIKE', '%' . $search . '%')
                    ->orWhere('pic_phone', 'LIKE', '%' . $search . '%')
                    ->orWhere('specimen_type', 'LIKE', '%' . $search . '%')
                    ->orWhere('specimen_quantity', 'LIKE', '%' . $search . '%')
                    ->orWhere('specimen_temperature', 'LIKE', '%' . $search . '%');
            });
        }

        $spesimens = $spesimens->paginate(10);

        return view('spesimen.index', compact('spesimens', 'search'));
    }

    public function destroy($id)
{
    // Temukan data berdasarkan ID
    $spesimen = Spesimen::find($id);

    // Hapus data jika ditemukan
    if ($spesimen) {
        $spesimen->delete();
        return redirect()->route('spesimen.index')->with('deleted', 'Data berhasil dihapus');
    } else {
        return redirect()->route('spesimen.index')->with('fail', 'Data tidak ditemukan');
    }
}

    public function show(Spesimen $spesimen)
    {
        return view('spesimen.show', compact('spesimen'));
    }

    public function edit($id)
    {
        $spesimen = Spesimen::find($id);

        return view('spesimen.edit', compact('spesimen'));
    }

    // SpesimenController.php

    public function update(Request $request, $id)
    {
        $request->validate([
            'origin' => 'required|string',
            'courier_name' => 'required|string',
            'expedition' => 'required|string',
            'pic_name' => 'required|string',
            'pic_phone' => 'required|numeric',
            'specimen_type' => 'required|string',
            'specimen_quantity' => 'required|integer',
            'specimen_temperature' => 'required|string|in:dingin,suhu_ruang',
        ]);

        $spesimen = Spesimen::find($id);

        if (!$spesimen) {
            return redirect()->route('spesimen.index')->with('error', 'Data tidak ditemukan');
        }

        $spesimen->update($request->all());

        return redirect()->route('spesimen.index')->with('success', 'Data berhasil diperbarui');
    }



}
