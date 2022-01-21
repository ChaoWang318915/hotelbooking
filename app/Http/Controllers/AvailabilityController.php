<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hotel;
use App\Availability;
use App\Room;
use Redirect;
use File;

class AvailabilityController extends Controller
{
	 public function __construct()
    {
        $this->middleware('auth');
    }

 // public function availability_overview(Request $request)
 // {
 // 	$hotels=Hotel::select('id','hotel_name')->get();
 //   return view('/backend/availability/availability-overview')->with('hotels',$hotels);
 // }
    public function index(){
    	$hotels=Hotel::select('id','hotel_name')->get();
   		return view('/backend/availability/availability-overview')->with('hotels',$hotels);
    }


    public function show($id){
    	// dd($id);
        $hotel = '';
    	$hotels=Hotel::select('id','hotel_name')->get();
        $hotel = Hotel::findorfail($id);
        // dd($hotel->rooms);
        $rooms = $hotel->rooms;
    	$hotel_id = $id;
    	return view('backend.availability.availability-overview',compact('hotel_id','hotels','hotel','rooms'));
    }


    public function store(Request $request){

        // dd(count($request->all()));
        $hotel_id = $request->hotel_id;

        $hotel_rooms = Room::where('hotel_id',$hotel_id)->get();
        $input = $request->all();

        unset($input['_token']);
        unset($input['hotel_id']);

        foreach ($hotel_rooms as $k => $v)
        {
          Availability::where('room_id', $v->id)->delete();
        }
        // dd($input);
        foreach ($input as $k => $v) {

            if($v == null){
                $v =0;
            }

            list($Prefix,$RoomId,$DayId) = explode('-', $k);
            if ($Prefix=='in_DayValue')
            {
            $avl_data['hotel_id'] = $hotel_id;
            $avl_data['room_id'] = $RoomId;
            $avl_data['day_id'] = $DayId;
            $avl_data['availability_count'] = $v;

            $data = Availability::create($avl_data);
            $data->save();
               
          }
        }

        return redirect('availability-overview/'.$hotel_id);


     }



}