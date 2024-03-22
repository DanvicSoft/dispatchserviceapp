
<table border="5">
    <thead>
        <tr>
            <th class="col-sm-2"><?='ID'?></th>
            <th class="col-sm-2"><?='Pick up Address'?></th>
            <th class="col-sm-2"><?='Phone'?></th>
            <th class="col-sm-2"><?='Delivery Address'?></th>
            <th class="col-sm-2"><?='Action'?></th>
            
            
        </tr>
    </thead>
    <tbody>
        @foreach ($matchedrecord as $item)
<form method="post" action="/signedrequest">
    @csrf
            <tr>
                <td data-title="ID">
                   
                </td>
                <td data-title="Pick Up Address">
                    {{$item['pickup_request_details'];}}
                </td>
                <td data-title="Phone">
                    {{$item['recipient_phone'];}}
                </td>
                <td data-title="Drop off Address">
                    {{$item['dropoff_address'];}}
                </td>
                <input type="hidden"  name="pickup_request_details" value="{{$item['pickup_request_details'];}}">
        </input>
        <input type="hidden"  name="pickup_address" value="{{$item['pickup_address'];}}">
    </input>
    <input type="hidden"  name="item_pickup" value="{{$item['item_pickup'];}}">
</input>
<input type="hidden"  name="dropoff_address" value="{{$item['dropoff_address'];}}">
</input>
                <td data-title="Drop off Address">
                   <input type="submit" value="Sign Request">  </input>
                     
                </td>
               
           </tr>
           
        </form>
           @endforeach  
    </tbody>
</table>


