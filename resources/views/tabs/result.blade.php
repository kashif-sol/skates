@include('layouts.app')


<body>
<div class="m-4">
    <ul class="nav nav-tabs  navbar-light bg-light " id="myTab">
        <li class="nav-item">
            <a href="#home" class="nav-link active navbar-brand mb-0 h1" data-bs-toggle="tab">Tab1</a>
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
          
            <form action="{{url('update-tab')}}" method="POST">
                @csrf
                   {{ method_field('POST') }} 
                   <input type="hidden" value="tab1" name="tab_type" >
            <table class="mt-2">
                <tr>
                    <th></th>
                    <th>Size</th>
                    <th>Priority</th>
                    <th>Multiples</th>
                </tr>
          
                @foreach($tab as $key=> $tab)
                <tr>
                 
                  <td>  <input type="hidden" name="id" value="{{$tab['id']}}"></td>
                  
                    <td ><input type="text"  name="size" class="focus" value="{{$tab['size']}}" readonly></td>
                    <td><input type="text" name="priority[{{$tab['size']}}]" value="{{$tab['priority']}}" ></td>
                    <td><input type="text" name="multiple[{{$tab['size']}}]" value="{{$tab['multiple']}}" ></td>
                
                   
                   
                </tr> 
                @endforeach
            </table>
            <div class="md" style="margin-left: 550px;">
            <button class="btn btn-primary"  type="submit">Save</button>
        </div>
        </form>
             </div>
             
        <div class="tab-pane fade" id="profile">
            <form action="{{url('update-tab')}}" method="POST">
                @csrf
                   {{ method_field('POST') }} 
                   <input type="hidden" value="tab2" name="tab_type" >
            <table class="mt-2">
                <tr>
                    <th>Size</th>
                    <th>Priority</th>
                    <th>Multiples</th>
                </tr>
          
                @foreach($tab_2 as $tab)
                <tr>
                  
                    <td ><input type="text" name="size" class="focus" value="{{$tab['size']}}" readonly></td>
                    <td><input type="text" name="priority[{{$tab['size']}}]" value="{{$tab['priority']}}" ></td>
                    <td><input type="text" name="multiple[{{$tab['size']}}]" value="{{$tab['multiple']}}" ></td>
                </tr> 
                @endforeach
            </table>  
            <div class="md" style="margin-left: 550px;">
                <button class="btn btn-primary"  type="submit">Save</button>
            </div>
                 </form>      
        </div>
        
        <div class="tab-pane fade" id="messages">
            <form action="{{url('update-tab')}}" method="POST">
                @csrf
                   {{ method_field('POST') }} 
                   <input type="hidden" value="tab3" name="tab_type" >
            <table class="mt-2">
                <tr>
                    <th>Size</th>
                    <th>Priority</th>
                    <th>Multiple</th>
                </tr>
          
                @foreach($tab_3 as $tab)
                <tr>
                  
                    <td ><input type="text" name="size" class="focus" value="{{$tab['size']}}" readonly></td>
                    <td><input type="text" name="priority[{{$tab['size']}}]" value="{{$tab['priority']}}" ></td>
                    <td><input type="text" name="multiple[{{$tab['size']}}]" value="{{$tab['multiple']}}" ></td>
                </tr> 
                @endforeach
            </table>
            <div class="md" style="margin-left: 550px;">
                <button class="btn btn-primary"  type="submit">Save</button>
            </div> 
                </form> 
                  </div>
    </div>
</div>
</body> 
