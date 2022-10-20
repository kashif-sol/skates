<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    
  </head>
  <body>
    <table class="table table-bordered">
    <thead>
      <tr>
        <td><b>Email</b></td>
        <td><b>Ice sheets</b></td>
        <td><b>Length</b></td>     
        <td><b>Width</b></td>     
        <td><b>Customer ID</b></td>     
        <td><b>Amount</b></td>     
        
        <td><b>Status</b></td>     
        <td><b>Shipping Cost</b></td>     
      </tr>
      </thead>
      <tbody>
      <tr>
        <td>
            {{$show->email}}
        </td>
        <td>
            {{$show->ice_sheet}}
        </td>
        <td>
            {{$show->length}}
        </td>
        <td>
            {{$show->width}}
        </td>
        <td>{{$show->customer_id}}</td>
                <td>{{$show->amount}}</td>
              
                <td>{{$show->status}}</td>
                <td>{{$show->shipping_cost}}</td>
      </tr>
      </tbody>
    </table>
  </body>
</html>