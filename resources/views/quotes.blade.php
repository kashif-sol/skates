@include('layouts.app')
  
     @if(isset($order) && !empty($order))

        @if(!empty($order["msg"]))
            <div class="alert alert-primary" role="alert">
                {{ $order["msg"] }} - <a href="{{ $order["link"] }}">Check Order Detail</a>
            </div>
        @endif

     @endif
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
                        @if($quote->status != 1 )
                            <a href="/create-order/{{$quote->id}}"  class="btn btn-primary ml-2">Create Order</a>
                        @else 
                         <a href="#"  disabled class="btn btn-primary ml-2 disabled">Order Created</a>
                        @endif
                    </td>
                </tr>
            @endforeach
            @endif

        </tbody>

    </table>


