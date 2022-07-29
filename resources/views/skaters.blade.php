@extends('layouts.app')


<body>

    <div class="buttons text-right" style="padding-top: 8px;background: #fbf1f1;; border-radius: 2px;padding-bottom: 7px;">

        <a href="{{ route('main') }}" class="btn btn-danger">Dashboard</a>
    
       
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Create Skater's/Sqft
        </button>
          
    </div>
   <hr></hr>
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
                            <label for="exampleFormControlSelect1">Sqfts</label>
                            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="sqfts_id">

                                <option selected>Choose...</option>
                                @if(isset ($dataa))
                                @foreach ($dataa as $data)
                                    <option value="{{ $data->id }}">{{ $data->sqft }}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Of/skaterssqfts</label>
                            <input type="text" class="form-control" name="ofskaterssqfts"
                                id="exampleFormControlInput1" placeholder="Enter ofskaterssqfts">
                        </div>


                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Of/Rental/skatersneeded</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="ofrentalskatersneeded" rows="3"></textarea>
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
            <option  value="{{ $user->id}}" >{{ $user->sqft}}</option>
        @endforeach
    @endif
    </select>
<button class="btn btn-primary" type="submit">Search</button>
  </form>
 
@if(isset ($save))
<h3>Data for {{$save->sqft}} sqft </h3>
@endif
    <table class="table">
        <thead>
            <tr class="table-light">
                <th scope="col">Of/skater's/Sqfts</th>
                <th scope="col">Of/Rental's/Skatersneeded</th>
                <th scope="col">Actions</th>
                <th></th>
                
                
            </tr>
        </thead>
        <tbody>
@if(isset($country_data))
            @foreach ($country_data as  $user)
                <tr class="table-light">
             

                    <td>{{ $user->ofskaterssqfts }}</td>
                    <td>{{ $user->ofrentalskatersneeded }}</td>
                    <td> <a href="{{ route('sqfts') }}"onclick="event.preventDefault(); document.getElementById( 'delete-form-{{ $user->sqfts_id }}').submit();" class="btn btn-primary"> Delete</a></td>
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

</body>

</html>
