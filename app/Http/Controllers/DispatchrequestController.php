<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Acceptedrequest;
use App\Models\Dispatchrequest;
use Illuminate\Support\Facades\Session;

class DispatchrequestController extends Controller
{

    public function indexapi(){
        $dispatchrequest = Dispatchrequest::all();
       return response()->json([
           'status' => '200',
           'dispatchlist' => $dispatchrequest
       ], 200);
   }

    public function index(){
        return view('dispatchrequestview', ['dispatchrequestlists' => Dispatchrequest::latest()->simplePaginate()]);
    }

    public function completedrequest(){
        return view('completedrequestview', ['completedrequestlists' => Acceptedrequest::latest()->simplePaginate()]);
    }

    public function confirmedrequest($id){
        if($id){
            return redirect('/completedrequest')->with('message', 'Delivery Confirmed Successfully!');
        }
        
    }
    public function adddispatchrequest(){
        return view('adddispatchrequest');
    }

    

    public function createdispatchrequest (Request $request){
       
        $dispatcformFields = $request->validate([
            'pickup_request_details' => 'required',
            'pickup_address' => 'required',
            'item_pickup' => 'required',
            'recipient_name' => 'required',
            'recipient_phone' => 'required',
            'dropoff_address' => 'required'
        ]);
        $dispatcformFields['user_id'] = auth()->user()->id;
       if($dispatcformFields){
       //dd($dispatcformFields);
        Dispatchrequest::create($dispatcformFields);
        Session::flash('message', 'Request Successfull');
        return redirect('/completedrequest');
       }
        else{
            redirect('/adddispatchrequest');
        }
    }

    public function acceptrequest(Request $request, $dispatchrequest_id){
        $matchedFound = Dispatchrequest::all()->where('dispatchrequest_id', '=', $request->dispatchrequest_id);
        //dd($matchedFound);
        return view('matchedview', ['matchedrecord' => $matchedFound]);
        //view('useracceptrequestview', ['matchedrecord' => $matchedFound]);
    }

    public function useracceptrequest(Request $request, $dispatchrequest_id){
        $useraccepted =  Dispatchrequest::all()->where('dispatchrequest_id', '=', $request->dispatchrequest_id);
        //dd($useraccepted);
        return view('useracceptrequestview', ['matchedrecord' => $useraccepted]);
        // return redirect('/dispatchrequest')->with('message', 'success');
        //view('useracceptrequestview', ['matchedrecord' => $matchedFound]);
    }

    public function signedrequest(Request $request){
       $acceptedrequestFields = $request->all();
        //dd($request->all());
        Acceptedrequest::create($acceptedrequestFields);
        return redirect('/dispatchrequest')->with('message', 'Parcel Delivered Successfully!');
    
    }
}
