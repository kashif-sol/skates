@include('layouts.app')
  
     
    <table class="table">
        <thead>
            <tr class="table-light">
                <th scope="col">Email</th>
                <th scope="col">ice sheets</th>
                <th scope="col">length</th>
                <th scope="col">width</th>
               
                </th>
            </tr>
        </thead>
        <tbody>
        @if(isset($quote_detail))
           
                <tr class="table-light">
                    <td>{{$quote_detail->email}}</td>
                    <td>{{$quote_detail->ice_sheet}}</td>
                    <td>{{$quote_detail->length}}</td>
                    <td>{{$quote_detail->width}}</td>
               
                </tr>
            
            @endif

        </tbody>

    </table>


