@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
        <form action="{{route('uploadcsv')}}" method="POST">

            @csrf
            <div class="mb-4">

               
                <input type="file" name="fileToUpload" id="fileToUpload" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('fileToUpload') border-red-500 @enderror">

                @error('fileToUpload')
                    <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                    </div>
                @enderror
            </div>
            
           
            
            <div>
                <button type="submit" class="bg-blue-500 text-white px-3 py-3 rounded font-medium w-full"> Upload CSV </button>
            </div>
            
        
        </form>
        
        </div>
    </div>
@endsection