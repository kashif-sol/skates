@include('layouts.app')
  
     
    <table class="table">
        <thead>
            <tr class="table-light">
                <th scope="col">Email</th>
                <th scope="col">Ice sheets</th>
                <th scope="col">Length</th>
                <th scope="col">Width</th>
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
                    <td>
                        <a href="/quotes-detail/{{$quote->id}}"  class="btn btn-primary">Detail</a>
                        <a href="/create-order/{{$quote->id}}"  class="btn btn-primary ml-2">Create Order</a>
                    </td>
                </tr>
            @endforeach
            @endif

        </tbody>

    </table>


