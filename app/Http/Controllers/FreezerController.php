<?php

namespace App\Http\Controllers;

use App\Models\Freezer;
use Illuminate\Http\Request;

class FreezerController extends Controller
{
    public function getData($code)
    {
        $data = Freezer::firstWhere('code', 'LIKE', '%' . $code . '%');
        return response()->json($data);
    }
}
