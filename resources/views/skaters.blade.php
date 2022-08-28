@include('layouts.app')
  
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Create Skater's/Sqft</h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form action="submitform" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">SQFT</label>
                            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="sqfts_id" required>

                                <option selected>Choose...</option>
                                @if(isset ($dataa))
                                @foreach ($dataa as $data)
                                    <option value="{{ $data->id }}">{{$data->min_sqft}}||{{ $data->max_sqft }}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Of/Skaterssqfts</label>
                            <input type="text" class="form-control" name="ofskaterssqfts"
                                id="exampleFormControlInput1" placeholder="Enter Of/SkatersSqfts" required>
                        </div>


                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Of/Rental/Skaters needed</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="ofrentalskatersneeded" rows="3" required></textarea>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


   
    <form action="submitforms" enctype="multipart/form-data" method="post">
    @csrf

    <select class="js-states browser-default select2" name="sqfts_id" required id="sqfts_id" style="padding: 6px; border-radius: 5px; padding-left: 59px;">
        <option value="option_select" disabled selected>Sqfts Available</option>
      @if(isset($dataa))
        @foreach($dataa as  $user)
            <option  value="{{ $user->id}}" >{{ $user->min_sqft}}||{{ $user->max_sqft}}</option>
        @endforeach
    @endif
    </select>
<button class="btn btn-primary" type="submit">Search</button>
  </form>
 
@if(isset ($save))
<h3>Data for{{$save->min_sqft}}||{{$save->max_sqft}} sqft </h3>
@endif
    <table class="table">
        <thead>
            <tr class="table-light">
                <th scope="col">Of/skater's/Sqfts</th>
                <th scope="col">Of/Rental's/Skatersneeded</th>
                <th scope="col"></th>
                <th scope="col">Actions</th>
                <th scope="col" style="text-align: right"> <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" >Create Skaters</a>
                </th>
                
                
            </tr>
        </thead>
        <tbody>
@if(isset($country_data))
            @foreach ($country_data as  $user)
                <tr class="table-light">
             

                    <td>{{ $user->ofskaterssqfts }}</td>
                    <td>{{ $user->ofrentalskatersneeded }}</td>
                    <td></td>
                    <td> 
                        <a href="{{ route('sqfts') }}"onclick="event.preventDefault(); document.getElementById( 'delete-form-{{ $user->sqfts_id }}').submit();" class="btn btn-primary"> Delete</a>
                        <a data-skaters="{{ $user->ofskaterssqfts }}" data-rent="{{ $user->ofrentalskatersneeded }}" data-sqft="{{$save->id}}" href="#" class="btn btn-primary edit-skaters"> Edit</a>
                    </td>
                    <td></td>
                    <form id="delete-form-{{ $user->sqfts_id }}" + action="{{ route('skater.destroy', $user->sqfts_id) }}"
                        method="post">
                        @csrf @method('DELETE')
                    </form>
                     

                  
                   





                </tr>
            @endforeach
            @endif

        </tbody>

    </table>



    <script>

        $(function(){
            $(".edit-skaters").click(function(){
                $("#exampleFormControlInput1").val( $(this).data("skaters"));
                $("#exampleFormControlTextarea1").val($(this).data("rent"));
                $("#inlineFormCustomSelectPref").val($(this).data("sqft"));
                $("#staticBackdrop").modal("show");
            })
        })
    </script>