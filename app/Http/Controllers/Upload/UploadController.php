<?php

namespace App\Http\Controllers\Upload;

use Session;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Csv;

class UploadController extends Controller
{
    public function index(){
       
        return view('upload.csv');
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'fileToUpload'=> 'required'
        ]);

        $file = $request->file('fileToUpload');

        // File Details 
        $filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $tempPath = $file->getRealPath();
        $fileSize = $file->getSize();
        $mimeType = $file->getMimeType();
  
        // Valid File Extensions
        $valid_extension = array("csv");
  
        // 2MB in Bytes
        $maxFileSize = 2097152; 
  
        // Check file extension
        if(in_array(strtolower($extension),$valid_extension)){
  
          // Check file size
          if($fileSize <= $maxFileSize){
  
            // File upload location
            $location = 'uploads';
  
            // Upload file
            $file->move($location,$filename);
  
            // Import CSV to Database
            $filepath = public_path($location."/".$filename);
  
            // Reading file
            $file = fopen($filepath,"r");
  
            $importData_arr = array();
            $i = 0;
  
            while (($filedata = fgetcsv($file, 20000, ",")) !== FALSE) {
               $num = count($filedata );
               
               // Skip first row (Remove below comment if you want to skip the first row)
               if($i == 0){
                  $i++;
                  continue; 
               }
               for ($c=0; $c < $num; $c++) {
                  $importData_arr[$i][] = $filedata [$c];
               }
               $i++;
            }
            fclose($file);
  
            // Insert to MySQL database
            foreach($importData_arr as $importData){
  
              $insertData = array(
                 "date"=>$importData[0],
                 "trade_code"=>$importData[1],
                 "high"=>$importData[2],
                 "low"=>$importData[3],
                 "open"=>$importData[4],
                 "close"=>$importData[5],
                 "volume"=> str_replace(',', '',$importData[6]),
                );  
              Csv::insertData($insertData);
  
            }
  
            Session::flash('message','Import Successful.');
          }else{
            Session::flash('message','File too large. File must be less than 2MB.');
          }
  
        }else{
           Session::flash('message','Invalid File Extension.');
        }
  
      
  
      // Redirect to index
      return back();


    }
}
