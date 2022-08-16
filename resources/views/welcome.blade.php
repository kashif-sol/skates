@include('layouts.app')


    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel" style="padding-left: 25px;">SQFTEET</h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('store-sqft') }}" method="POST">

                        <div class="inputs"  style=" padding-left: 5%;>
                            @csrf
                            <input type="hidden" name="id" id="id">
                            <input type="text" name="max_sqft" placeholder="Maximum Sqft" style="width: 338px;"><br><br>
                          
                            <input type="text" name="min_sqft" placeholder="Minimum Sqft" style="width: 338px;"><br><br>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    
    <h3 style="text-align: center;">Sqfts Available</h3>
    <table class="table">
       
        <thead>
       
    
            <tr class="table-light">
              
             
                <th scope="col">Mininmum Sqft</th>
                <th scope="col">Maximum Sqft</th>
                <th scope="col">Action</th>
                <th scope="col" style="text-align: right"> <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop"> Create Sqft </button>
</th>
<th scope="col"></th>

             

                <!-- <th class="table-warning">Description</th> -->
            </tr>
        </thead>
        <tbody>

            @foreach ($data as $setting)
                <tr class="table-light">
                    
                    <td>{{ $setting->min_sqft }}</td>
                    <td>{{ $setting->max_sqft }}</td>

                    <!-- <td><a class="btn btn-primary" href="{{ route('sqfts.edit', $setting->id) }}">Edit</a></td> -->
                    <td> <a class="btn btn-primary" href="" id="editCompany" data-toggle="modal"
                            data-target='#practice_modal' data-id="{{ $setting->id }}">Edit</a> 
                            <a href="{{ route('sqfts') }}"onclick="event.preventDefault(); document.getElementById( 'delete-form-{{ $setting->id }}').submit();" class="btn btn-primary"> Delete</a> </td>
                    <td>
                    </td>
                    <td></td>
                    <form id="delete-form-{{ $setting->id }}" + action="{{ route('sqfts.destroy', $setting->id) }}"
                        method="post">
                        @csrf @method('DELETE')
                    </form>
                </tr>
            @endforeach
        </tbody>

    </table>
    <!-- edit modal -->
    <div class="modal fade" id="practice_modal">
        <div class="modal-dialog">
            <form id="companydata">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Edit Sqft</h5>

                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="inputs"style=" padding-left: 5%; >
                    <input type="hidden" id="color_id" name="color_id" value="">
                    <div class="modal-body">
                        <input type="text" name="sqft" id="sqft" value="" style="width: 338px;"><br><br>
                        <input type="text" name="min_sqft" id="min_sqft"  value=""  style="width: 338px;"><br><br>
                    </div>
                </div>

                    <div class="modal-footer">
                        <input type="submit" value="Submit" id="submit" class="btn btn-primary"
                            style="width: 101px;">

                    </div>
                </div>
            </form>
        </div>
    </div>



    <!-- Bootstrap core JavaScript-->
    <script src="public/vendor/jquery/jquery.min.js"></script>
    <script src="public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="public/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="public/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="public/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="public/js/demo/chart-area-demo.js"></script>
    <script src="public/js/demo/chart-pie-demo.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('body').on('click', '#submit', function(event) {
                event.preventDefault()
                var id = $("#color_id").val();
                var max_sqft = $("#sqft").val();
                var min_sqft= $("#min_sqft").val();

                $.ajax({
                    url: 'sqfts/' + id,
                    type: "POST",
                    data: {
                        id: id,
                        max_sqft: max_sqft,
                        min_sqft: min_sqft
                        
                        
                    },

                    dataType: 'json',
                    success: function(data) {

                        $('#companydata').trigger("reset");
                        $('#practice_modal').modal('hide');
                        window.location.reload(true);
                    }
                });
            });


            $('body').on('click', '#editCompany', function(event) {

                event.preventDefault();
                var id = $(this).data('id');
                console.log(id)
                $.get('sqfts.edit/' + id, function(data) {
                    $('#userCrudModal').html("Edit category");
                    $('#submit').val("Edit Sqft");
                    $('#practice_modal').modal('show');
                    $('#color_id').val(data.data.id);
                    $('#sqft').val(data.data.max_sqft);
                    $('#min_sqft').val(data.data.min_sqft);
                })
            });

        });
    </script>




</body>

</html>
