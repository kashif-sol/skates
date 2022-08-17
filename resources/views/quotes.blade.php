@include('layouts.app')
  
     
    <table class="table">
        <thead>
            <tr class="table-light">
                <th scope="col">Email</th>
                <th scope="col">ice sheets</th>
                <th scope="col">length</th>
                <th scope="col">width</th>
                <th scope="col"></th>
                </th>
            </tr>
        </thead>
        <tbody>
        @if(isset($quotes))
            @foreach ($quotes as  $quote)
                <tr class="table-light">
                    <td>{{$quote->email}}</td>
                    <td>{{$quote->ice_sheet}}</td>
                    <td>{{$quote->length}}</td>
                    <td>{{$quote->width}}</td>
                    <td></td>
                </tr>
            @endforeach
            @endif

        </tbody>

    </table>


