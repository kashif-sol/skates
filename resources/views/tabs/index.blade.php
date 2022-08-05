<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tabs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<style>
    td{
        padding: 5px;
    }
    th{
        text-align: center;
    }
    input{
        padding: 9px;
        border-radius: 5px;
        border: 1px solid #6aa1d1;
    }
    .focus{
        border-top-style: hidden;
    border-right-style: hidden;
    border-left-style: hidden;
    border-bottom-style: hidden;
    background-color: #eee;
    padding: 9px;
    }

</style>
</head>

<body>
    <div class="m-4">
        <ul class="nav nav-tabs" id="myTab">
            <li class="nav-item">
                <a href="#home" class="nav-link active" data-bs-toggle="tab">Tab1</a>
            </li>
            <li class="nav-item">
                <a href="#profile" class="nav-link" data-bs-toggle="tab">Tab2</a>
            </li>
            <li class="nav-item">
                <a href="#messages" class="nav-link" data-bs-toggle="tab">Tab3</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="home">
                {{-- <h4 class="mt-2">Home tab content</h4> --}}
                {{-- <p>Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui. Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth.</p> --}}
                <form action="{{route('tab1.store')}}" method="POST">
                    @csrf
                    <table class="mt-2">
                        <tr>
                            <th>Size</th>
                            <th>Figure</th>
                            <th> Hockey</th>
                        </tr>
                        <tr>
                            <td ><input type="text" name="size" class="focus" value="8y" readonly></td>
                            <td><input type="text" name="figure1" placeholder="6%"></td>
                            <td><input type="text" name="figure2" placeholder="6%"></td>

                        </tr>
                        <tr>
                            <td ><input type="text" name="size1" class="focus" value="9y" readonly></td>
                            <td><input type="text" name="figure7" placeholder="6%"></td>
                            <td><input type="text" name="figure8" placeholder="6%"></td>

                        </tr>
                        <tr>
                            <td ><input type="text" name="size2"  class="focus" value="10y" readonly></td>
                            <td><input type="text" name="figure9" placeholder="6%"></td>
                            <td><input type="text" name="figure10" placeholder="6%"></td>

                        </tr>
                        <tr>
                            <td ><input type="text" name="size3" class="focus" value="11y" readonly></td>
                            <td><input type="text" name="figure11" placeholder="6%"></td>
                            <td><input type="text" name="figure12" placeholder="6%"></td>

                        </tr>
                        <tr>
                            <td ><input type="text" name="size4" class="focus" value="12y" readonly></td>
                            <td><input type="text" name="figure13" placeholder="6%"></td>
                            <td><input type="text" name="figure14" placeholder="6%"></td>

                        </tr>
                        <tr>
                            <td ><input type="text" name="size5" class="focus" value="1" readonly></td>
                            <td><input type="text" name="figure15" placeholder="6%"></td>
                            <td><input type="text" name="figure16" placeholder="6%"></td>

                        </tr>
                        <tr>
                            <td ><input type="text" name="size6"  class="focus" value="2" readonly></td>
                            <td><input type="text" name="figure17" placeholder="6%"></td>
                            <td><input type="text" name="figure18" placeholder="6%"></td>

                        </tr>
                        <tr>
                            <td ><input type="text" name="size7" class="focus" value="3" readonly></td>
                            <td><input type="text" name="figure19" placeholder="6%"></td>
                            <td><input type="text" name="figure20" placeholder="6%"></td>

                        </tr>
                        <tr>
                            <td ><input type="text" name="size8" class="focus" value="4" readonly></td>
                            <td><input type="text" name="figure21" placeholder="6%"></td>
                            <td><input type="text" name="figure22" placeholder="6%"></td>

                        </tr>
                        <tr>
                            <td ><input type="text" name="size9" class="focus" value="5" readonly></td>
                            <td><input type="text" name="figure23" placeholder="6%"></td>
                            <td><input type="text" name="figure24" placeholder="6%"></td>

                        </tr>
                        <tr>
                            <td ><input type="text" name="size10" class="focus" value="6" readonly></td>
                            <td><input type="text" name="figure25" placeholder="6%"></td>
                            <td><input type="text" name="figure26" placeholder="6%"></td>

                        </tr>
                        <tr>
                            <td ><input type="text" name="size11" class="focus" value="7" readonly></td>
                            <td><input type="text" name="figure27" placeholder="6%"></td>
                            <td><input type="text" name="figure28" placeholder="6%"></td>

                        </tr>
                        <tr>
                            <td ><input type="text" name="size12" class="focus" value="8" readonly></td>
                            <td><input type="text" name="figure29" placeholder="6%"></td>
                            <td><input type="text" name="figure30"  placeholder="6%"></td>

                        </tr>
                        <tr>
                            <td ><input type="text" name="size13" class="focus" value="9" readonly></td>
                            <td><input type="text" name="figure31" placeholder="6%"></td>
                            <td><input type="text" name="figure32" placeholder="6%"></td>

                        </tr>
                        <tr>
                            <td ><input type="text" name="size14" class="focus" value="10" readonly></td>
                            <td><input type="text" name="figure33" placeholder="6%"></td>
                            <td><input type="text" name="figure34" placeholder="6%"></td>

                        </tr>
                        <tr>
                            <td ><input type="text" name="size15" class="focus" value="11" readonly></td>
                            <td><input type="text" name="figure35" placeholder="6%"></td>
                            <td><input type="text" name="figure36" placeholder="6%"></td>

                        </tr>
                        <tr>
                            <td ><input type="text" name="size16" class="focus" value="12" readonly></td>
                            <td><input type="text" name="figure37" placeholder="6%"></td>
                            <td><input type="text" name="figure38" placeholder="6%"></td>

                        </tr>
                        <tr>
                            <td ><input type="text" name="size17" class="focus" value="13" readonly></td>
                            <td><input type="text" name="figure39" placeholder="6%"></td>
                            <td><input type="text" name="figure40" placeholder="6%"></td>

                        </tr>


                    </table>
                    <button class="btn btn-primary" style="float: right" type="submit">Save</button>
                </form>

            </div>
            <div class="tab-pane fade" id="profile">
                <form action="{{route('tab2.store')}}" method="POST">
                    @csrf
                    <table class="mt-2">
                        <tr>
                            <th>Size</th>
                            <th>Figure</th>
                        </tr>
                        <tr>
                            <td ><input type="text" name="size" class="focus" value="8y" readonly></td>
                            <td><input type="text" name="figure1" placeholder="6%"></td>

                        </tr>
                        <tr>
                            <td ><input type="text" name="size1" class="focus" value="9y" readonly></td>
                            <td><input type="text" name="figure2" placeholder="6%"></td>

                        </tr>
                        <tr>
                            <td ><input type="text" name="size2"  class="focus" value="10y" readonly></td>
                            <td><input type="text" name="figure3" placeholder="6%"></td>

                        </tr>
                        <tr>
                            <td ><input type="text" name="size3" class="focus" value="11y" readonly></td>
                            <td><input type="text" name="figure4" placeholder="6%"></td>

                        </tr>
                        <tr>
                            <td ><input type="text" name="size4" class="focus" value="12y" readonly></td>
                            <td><input type="text" name="figure5" placeholder="6%"></td>

                        </tr>
                        <tr>
                            <td ><input type="text" name="size5" class="focus" value="1" readonly></td>
                            <td><input type="text" name="figure6" placeholder="6%"></td>

                        </tr>
                        <tr>
                            <td ><input type="text" name="size6"  class="focus" value="2" readonly></td>
                            <td><input type="text" name="figure7" placeholder="6%"></td>

                        </tr>
                        <tr>
                            <td ><input type="text" name="size7" class="focus" value="3" readonly></td>
                            <td><input type="text" name="figure8" placeholder="6%"></td>

                        </tr>
                        <tr>
                            <td ><input type="text" name="size8" class="focus" value="4" readonly></td>
                            <td><input type="text" name="figure9" placeholder="6%"></td>

                        </tr>
                        <tr>
                            <td ><input type="text" name="size9" class="focus" value="5" readonly></td>
                            <td><input type="text" name="figure10" placeholder="6%"></td>

                        </tr>
                        <tr>
                            <td ><input type="text" name="size10" class="focus" value="6" readonly></td>
                            <td><input type="text" name="figure11" placeholder="6%"></td>

                        </tr>
                        <tr>
                            <td ><input type="text" name="size11" class="focus" value="7" readonly></td>
                            <td><input type="text" name="figure12" placeholder="6%"></td>

                        </tr>
                        <tr>
                            <td ><input type="text" name="size12" class="focus" value="8" readonly></td>
                            <td><input type="text" name="figure13" placeholder="6%"></td>

                        </tr>
                        <tr>
                            <td ><input type="text" name="size13" class="focus" value="9" readonly></td>
                            <td><input type="text" name="figure14" placeholder="6%"></td>

                        </tr>
                        <tr>
                            <td ><input type="text" name="size14" class="focus" value="10" readonly></td>
                            <td><input type="text" name="figure15" placeholder="6%"></td>

                        </tr>
                        <tr>
                            <td ><input type="text" name="size15" class="focus" value="11" readonly></td>
                            <td><input type="text" name="figure16" placeholder="6%"></td>

                        </tr>
                        <tr>
                            <td ><input type="text" name="size16" class="focus" value="12" readonly></td>
                            <td><input type="text" name="figure17" placeholder="6%"></td>

                        </tr>
                        <tr>
                            <td ><input type="text" name="size17" class="focus" value="13" readonly></td>
                            <td><input type="text" name="figure18" placeholder="6%"></td>

                        </tr>


                    </table>
                    <button class="btn btn-primary" style="float: right" type="submit">Save</button>
                </form>
            </div>
            <div class="tab-pane fade" id="messages">
                <form action="{{route('tab3.store')}}" method="POST">
                    @csrf
                    <table class="mt-2">
                        <tr>
                            <th>Size</th>
                            <th>Hockey</th>
                        </tr>
                        <tr>
                            <td ><input type="text" name="size" class="focus" value="8y" readonly></td>
                            <td><input type="text" name="figure1" placeholder="6%"></td>

                        </tr>
                        <tr>
                            <td ><input type="text" name="size1" class="focus" value="9y" readonly></td>
                            <td><input type="text" name="figure2" placeholder="6%"></td>

                        </tr>
                        <tr>
                            <td ><input type="text" name="size2"  class="focus" value="10y" readonly></td>
                            <td><input type="text" name="figure3" placeholder="6%"></td>

                        </tr>
                        <tr>
                            <td ><input type="text" name="size3" class="focus" value="11y" readonly></td>
                            <td><input type="text" name="figure4" placeholder="6%"></td>

                        </tr>
                        <tr>
                            <td ><input type="text" name="size4" class="focus" value="12y" readonly></td>
                            <td><input type="text" name="figure5" placeholder="6%"></td>

                        </tr>
                        <tr>
                            <td ><input type="text" name="size5" class="focus" value="1" readonly></td>
                            <td><input type="text" name="figure6" placeholder="6%"></td>

                        </tr>
                        <tr>
                            <td ><input type="text" name="size6"  class="focus" value="2" readonly></td>
                            <td><input type="text" name="figure7" placeholder="6%"></td>

                        </tr>
                        <tr>
                            <td ><input type="text" name="size7" class="focus" value="3" readonly></td>
                            <td><input type="text" name="figure8" placeholder="6%"></td>

                        </tr>
                        <tr>
                            <td ><input type="text" name="size8" class="focus" value="4" readonly></td>
                            <td><input type="text" name="figure9" placeholder="6%"></td>

                        </tr>
                        <tr>
                            <td ><input type="text" name="size9" class="focus" value="5" readonly></td>
                            <td><input type="text" name="figure10" placeholder="6%"></td>

                        </tr>
                        <tr>
                            <td ><input type="text" name="size10" class="focus" value="6" readonly></td>
                            <td><input type="text" name="figure11" placeholder="6%"></td>

                        </tr>
                        <tr>
                            <td ><input type="text" name="size11" class="focus" value="7" readonly></td>
                            <td><input type="text" name="figure12" placeholder="6%"></td>

                        </tr>
                        <tr>
                            <td ><input type="text" name="size12" class="focus" value="8" readonly></td>
                            <td><input type="text" name="figure13" placeholder="6%"></td>

                        </tr>
                        <tr>
                            <td ><input type="text" name="size13" class="focus" value="9" readonly></td>
                            <td><input type="text" name="figure14" placeholder="6%"></td>

                        </tr>
                        <tr>
                            <td ><input type="text" name="size14" class="focus" value="10" readonly></td>
                            <td><input type="text" name="figure15" placeholder="6%"></td>

                        </tr>
                        <tr>
                            <td ><input type="text" name="size15" class="focus" value="11" readonly></td>
                            <td><input type="text" name="figure16" placeholder="6%"></td>

                        </tr>
                        <tr>
                            <td ><input type="text" name="size16" class="focus" value="12" readonly></td>
                            <td><input type="text" name="figure17" placeholder="6%"></td>

                        </tr>
                        <tr>
                            <td ><input type="text" name="size17" class="focus" value="13" readonly></td>
                            <td><input type="text" name="figure18" placeholder="6%"></td>

                        </tr>


                    </table>
                    <button class="btn btn-primary" style="float: right" type="submit">Save</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
