<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Sqfts</title>

    <!-- Custom fonts for this template-->
    <link href="public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.3.0/mdb.min.css" rel="stylesheet" />

</head>

<body id="page-top">
    <div class="buttons text-right" style="padding-top: 8px;background: #fbf1f1;; border-radius: 2px;padding-bottom: 7px;">
    <a href="{{ route('main') }}" class="btn btn-danger">Dashboard</a>
         <a href="skaters" class="btn btn-primary">Skaters</a>
        
      
    </div>
   
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('store-sqft') }}" method="POST">

                        <div class="inputs" style=" padding-left: 25%;">
                            @csrf
                            <input type="hidden" name="id" id="id">
                            <input type="text" name="sqft" placeholder="Enter Sqft" style="width: 260px"><br>
                            <br>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <h3>Sqfts Available</h3>
    <table class="table">
       
        <thead>
       
    
            <tr class="table-light">
              
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col">SQFT</th>
                <th scope="col"></th>
                <th scope="col">Action</th>
                <th scope="col" style="text-align: right"> <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop"> Create Sqft </button>
</th>
             

                <!-- <th class="table-warning">Description</th> -->
            </tr>
        </thead>
        <tbody>

            @foreach ($data as $setting)
                <tr class="table-light">
                    <td></td>
                    <td></td>
                    <td>{{ $setting->sqft }}</td>
                    <td></td>

                    <!-- <td><a class="btn btn-primary" href="{{ route('sqfts.edit', $setting->id) }}">Edit</a></td> -->
                    <td> <a class="btn btn-primary" href="" id="editCompany" data-toggle="modal"
                            data-target='#practice_modal' data-id="{{ $setting->id }}">Edit</a> 
                            <a href="{{ route('sqfts') }}"onclick="event.preventDefault(); document.getElementById( 'delete-form-{{ $setting->id }}').submit();" class="btn btn-primary"> Delete</a> </td>
                    <td>
                    </td>
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
                    <input type="hidden" id="color_id" name="color_id" value="">
                    <div class="modal-body">
                        <input type="text" name="sqft" id="sqft" value="" class="form-control">
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
                var sqft = $("#sqft").val();

                $.ajax({
                    url: 'sqfts/' + id,
                    type: "POST",
                    data: {
                        id: id,
                        sqft: sqft,
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
                    $('#sqft').val(data.data.sqft);
                })
            });

        });
    </script>




</body>

</html>
