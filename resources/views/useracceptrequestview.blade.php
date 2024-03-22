
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
        
            <tr>
                <td data-title="ID">
                    {{$item['dispatchrequest_id']}}
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
                <td data-title="Action">
                    <a href="/recieveparcel/{{$item->dispatchrequest_id}}">
                        <button
                             type="submit"
                             class="h-10 w-20 text-white rounded-lg bg-red-500 hover:bg-red-600" >
                            Recieve Parcel
                         </button>
                     </a>
                </td>
               
           </tr>
           @endforeach  
    </tbody>
</table>


