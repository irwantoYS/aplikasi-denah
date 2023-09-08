<?php

namespace App\Http\Controllers;

use App\Models\Freezer;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class FreezerController extends Controller
{
    public function index()
    {
        return view('freezer.admin-index');
    }
    
    public function update(Request $request)
    {
        $freezer = Freezer::firstWhere('id', $request->id);

        if(isset($request->picture)){
            if($freezer->picture){
                if( Storage::exists($freezer->picture)){
                    Storage::delete($freezer->picture);
                }
            }
            $storeImage         = $request->file('picture')->store('freezer-pictures');
            $freezer->update([
                'picture' => $storeImage,
            ]);
        }

        $freezer->update([
            'code'              => $request->code,
            'name'              => $request->name,
            'type'              => $request->type,
            'specimen_type'     => $request->specimen_type,
            'merk'              => $request->merk,
            'model'             => $request->model,
            'capacity'          => $request->capacity,
            'calibration_time'  => $request->calibration_time,
            'bmn'               => $request->bmn,
            'location'          => $request->location,
            'status'            => $request->status,
        ]);
        
        return redirect()->back()
            ->with("success","Data Freezer berhasil diperbarui!");
    }

    public function getData($code)
    {
        $data = Freezer::firstWhere('code', 'LIKE', '%' . $code . '%');
        return response()->json($data);
    }
}
