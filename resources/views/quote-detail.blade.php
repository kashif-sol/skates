@include('layouts.app')
  
     @php
      ///   dd($data);
       $tabs_data = [];
       $sum_figure = 0;
        $sum_hockey = 0;
      ///dd($quote_tab_data);
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
            <form method="POST" action="{{route('edit-quote-tab')}}" >
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
                @if(empty($quote_tab_data))
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

                    @foreach ($tabs_data as $index => $tabss)
                    @php
                        $size = $tabss[0];
                    @endphp
                    <tr>
                        @foreach ($tabss as $tabs)
                        
                        
                        <td>
                            <input type="text" value="{{$tabs}}" name="tab4[{{$size}}][]" >
                        </td>
                        
                           
                        @endforeach
                    </tr>
                    @endforeach
                     <tr>
                    <td></td>
                     <td></td>
                      <td></td>
                      </tr>
                @else 

                 @foreach ($quote_tab_data as $tabs)
                    <tr>
                        <td>
                            <input type="text" value="{{$tabs["size"]}}" name="tab4[{{$tabs["size"]}}][]" >
                        </td>
                        <td>
                            <input type="text" value="{{$tabs["figure"]}}" name="tab4[{{$tabs["size"]}}][]" >
                        </td>
                        @if(!empty($tabs["hockey"]) && $tabs["hockey"] > 0)
                            <td>
                                <input type="text" value="{{$tabs["hockey"]}}" name="tab4[{{$tabs["size"]}}][]" >
                            </td>
                        @else
                         <input type="text" value="0" name="tab4[{{$tabs["size"]}}][]" >
                        @endif
                     </tr>
                        
                @endforeach

               

                @endif
    
                </tbody>
            </table>
            <input type="hidden" name="quoteId" value="{{$quote_detail->id}}" >
             <button type="submit" class="btn btn-primary" style="float: right;">Save</button>
            </form>

        </div>

    @endif
 <h2>Customer QTY</h2>
 <table class="table">
        <thead>
            <tr class="table-light">
                <th scope="col">Size</th>
                <th scope="col">Figure</th>
                <th scope="col">Hockey</th>
                </th>
            </tr>
        </thead>
        <tbody>
        @if(isset($tab4_data))
           
                
              
                @foreach ($tab4_data as $record)
                <tr class="table-light">
                    <td>{{$record->size}}</td>
                    <td>{{$record->figure}}</td>
                    <td>{{$record->hockey}}</td>
                      </tr>
                @endforeach
                
                    
              
            
            @endif

        </tbody>

    </table>

    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <form action="{{route('quote-send')}}"   method="GET">
               
                <input type="hidden" name="quoteId" value="{{$quote_detail->id}}" >
                <label>Amount</label>
                <input type="text" name="quoteAmount" id="quoteAmount" value="{{$quote_detail->amount}}" style="    width: 20%;">
                <button type="submit" class="btn btn-primary">Send</button>
            </form>
        </div>
    </div>
    </div>


