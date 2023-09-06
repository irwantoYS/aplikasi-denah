<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Freezer;
use App\Models\History;

class HistoryController extends Controller
{
    public function index()
    {
        $freezers = Freezer::get();
        return view('history.index', compact('freezers'));
    }

    public function store(Request $request) {
        $history = History::create([
            'name'          =>  $request['name'],
            'employee_id'   =>  $request['employee_id'],
            'datetime'      =>  $request['datetime'],
            'freezer_id'    =>  $request['freezer_id'],
            'purpose'       =>  $request['purpose'],
        ]);

        if($history) {
            return redirect()->back();
        }
    }
}
