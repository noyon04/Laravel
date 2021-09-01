<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Csv;
use DB;

class ListController extends Controller
{
    public function index(){
       
        $csvs = Csv::paginate(20);
        
        return view('lists.index', compact('csvs'));
      }

      public function update(Request $request)
      {
          if ($request->ajax()) {
              Csv::find($request->pk)
                  ->update([
                      $request->name=> $request->value
                  ]);
                  
    
              return response()->json(['success' => true]);
          }
      }
}
