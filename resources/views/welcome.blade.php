@extends('layouts.app')

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->

        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->

                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <div class="row">
                            <div class="button">

                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop">
                                    Create Settings
                                </button>
                                <a href="sqfts" class="btn btn-danger"> Square feet</a>
                                <a href="skaters" class="btn btn-dark">Skaters</a>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Create Setting</h5>

                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('store-form') }}" method="POST">

                                            <div class="inputs" style=" padding-left: 25%;">
                                                @csrf
                                                <input type="hidden" name="id" id="id">
                                                <input type="text" name="name" placeholder="Enter Setting Name"
                                                    style="width: 260px"><br>
                                                <br>
                                                <input type="text" name="description"
                                                    placeholder="Enter Setting Description"
                                                    style="width: 260px"><br><br>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Content Row -->


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->

            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->


    <!-- Logout Modal-->
    <table class="table">
    <p style="padding-left: 20px;">User Settings</p>
        <thead>
            <tr class="table-light">
                <th scope="col">Name</th>
                <th scope="col">Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($settings as $setting)
                <tr class="table-light">
                    <td>{{ $setting->name }}</td>
                  
                    <td>{{ $setting->description }}</td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>

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

</body>

