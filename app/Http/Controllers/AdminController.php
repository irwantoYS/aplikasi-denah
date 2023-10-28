<?php

namespace App\Http\Controllers;
use App\Models\History;
use Illuminate\Support\Facades\Schema;


use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        // Dalam metode ini, Anda dapat menangani logika tampilan halaman admin
        // dan juga logika pencarian data yang diinginkan.
        
        // Contoh sederhana, Anda dapat mengambil data dari database:
        
        $search = $request->input('search');
        $histories = History::where('name', 'LIKE', '%' . $search . '%')
        ->orWhere('employee_id', 'LIKE', '%' . $search . '%')
        ->orWhere('datetime', 'LIKE', '%' . $search . '%')
        ->orWhere('purpose', 'LIKE', '%' . $search . '%')
        ->orWhereHas('freezer', function ($query) use ($search) {
            $query->where('name', 'LIKE', '%' . $search . '%')
                ->orWhere('code', 'LIKE', '%' . $search . '%');
        })
        ->paginate();
        
        return view('history.admin-index', compact('histories'));
    }


}
