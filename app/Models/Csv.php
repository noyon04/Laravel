<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Csv extends Model
{
    use HasFactory;

    protected $table='csvs';

    protected $fillable = [
        'date',
        'trade_code',
        'high',
        'low',
        'open',
        'close',
        'volume',

    ];

    public static function insertData($data){

        
        
        DB::table('csvs')->insert($data);
        
     }
}
