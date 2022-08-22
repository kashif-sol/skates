@include('layouts.app')
  
     @php
      ///   dd($data);
       $tabs_data = [];
       $sum_figure = 0;
        $sum_hockey = 0;
     @endphp
    <table class="table">
        <thead>
            <tr class="table-light">
                <th scope="col">Email</th>
                <th scope="col">ice sheets</th>
                <th scope="col">length</th>
                <th scope="col">width</th>
                <th scope="col">Sq.feet</th>
                <th scope="col">Rental Skates needed</th>
                <th scope="col">Per Session</th>
                <th scope="col">Sparx</th>
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
                    <td>{{$data['total_sqfeet']}}</td> 

                    @if(isset($data))
                    <td> {{$data['no_rental_skates_needed']}}</td> 
                    <td> {{$data['skates_per_session']}}</td> 
                    <td> {{$data['total_sparx']}}</td> 
                    @endif
                </tr>
            
            @endif

        </tbody>

    </table>

    @if(isset($data))



        

        <div class="row  p-3">
            <h2>Tab Values</h2>
            <table class="table">
                <thead>
                    <tr class="table-light">
                        <th scope="col">Size</th>
                        <th scope="col">Figure</th>
                        @if($quote_detail->tab == "TAB1")
                        <th scope="col">Hockey</th>
                        @endif
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if($quote_detail->tab == "TAB1")
                        @php 
                            $tabs_data = $data['Tab1']; 
                        @endphp
                    @elseif($quote_detail->tab == "TAB2")
                        @php 
                            $tabs_data = $data['Tab2']; 
                        @endphp
                    @elseif($quote_detail->tab == "TAB3")
                        @php 
                            $tabs_data = $data['Tab3']; 
                        @endphp
                    @endif

                    @foreach ($tabs_data as $tabss)
                    <tr>
                        @foreach ($tabss as $tabs)
                        
                        
                        <td>{{$tabs}}</td>
                        
                           
                        @endforeach
                    </tr>
                    @endforeach
                     <tr>
                    <td>Total</td>
                     <td></td>
                      <td></td>
                      </tr>
                </tbody>
            </table>

        </div>

    @endif


