
@extends('layouts.app')


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jquery-editable/css/jquery-editable.css" rel="stylesheet"/>
<script>$.fn.poshytip={defaults:null}</script>
<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jquery-editable/js/jquery-editable-poshytip.min.js"></script>

@section('content')
    <div class="flex justify-center">
        <div class="bg-white p-6 rounded-lg">
            <table class="table table-bordered mb-5">
                <thead>
                    <tr class="table-success">
                        
                        <th scope="col">Date</th>
                        <th scope="col">Trade_Code</th>
                        <th scope="col">High</th>
                        <th scope="col">Low</th>
                        <th scope="col">Open</th>
                        <th scope="col">Close</th>
                        <th scope="col">Volume</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($csvs as $data)
                    <tr>
                        
                        
                    
                    <td>
                        <a href="" class="update" data-name="date" data-type="text" data-pk="{{ $data->date }}" data-title="Enter name">{{ $data->date }}</a>
                    </td>
                    <td>
                        <a href="" class="update" data-name="Trade_code" data-type="text" data-pk="{{ $data->trade_code }}" data-title="Enter Trade_code">{{ $data->trade_code }}</a>
                    </td>
                    <td>
                        <a href="" class="update" data-name="High" data-type="text" data-pk="{{$data->high }}" data-title="Enter High">{{ $data->high }}</a>
                    </td>
                    <td>
                        <a href="" class="update" data-name="Low" data-type="text" data-pk="{{ $data->low  }}" data-title="Enter Low">{{ $data->low }}</a>
                    </td>
                    <td>
                        <a href="" class="update" data-name="Open" data-type="text" data-pk="{{ $data->open }}" data-title="Enter Open">{{ $data->open }}</a>
                    </td>
                    <td>
                        <a href="" class="update" data-name="Close" data-type="text" data-pk="{{ $data->close}}" data-title="Enter Close">{{ $data->close }}</a>
                    </td>
                    <td>
                        <a href="" class="update" data-name="Volume" data-type="text" data-pk="{{ $data->volume}}" data-title="Enter Volume">{{ $data->volume }}</a>
                    </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
    
            {{-- Pagination --}}
            <div class="d-flex justify-content-center">
                {!! $csvs->links() !!}
            </div>
    
    
    </div>

    
    </div>
    <script type="text/javascript">
    $.fn.editable.defaults.mode = 'inline';
     // $(document).ready(function(){

     
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{csrf_token()}}'
            }
        }); 
      
        $('.update').editable({
               url: "{{ route('update') }}",
               type: 'text',
               pk: 1,
               name: 'name',
               title: 'Enter name',
               success:function(response,newValue){
                   console.log('Updated',response)
               }
        });

      
    </script>
@endsection