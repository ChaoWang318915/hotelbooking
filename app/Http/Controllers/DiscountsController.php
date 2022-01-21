<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use App\Room;
use App\Discount;


class DiscountsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function discount(Request $request,$id)
    { 
        $discounts=Discount::select('*')->where('hotel_id',$id)->get();
    	$rooms=Room::select('id','hotel_id','room_name')->where('hotel_id',$id)->get();
       return view('/backend/hotels/discounts')->with('rooms',$rooms)->with('discounts',$discounts);
    }

    public function discount_edit(Request $request,$id,$did){
        $discounts=Discount::where('hotel_id',$id)->where('id',$did)->first();
        // dd($discounts);
        // $discount = $discount[0];
        $rooms=Room::select('id','hotel_id','room_name')->where('hotel_id',$id)->get();
       return view('/backend/hotels/edit-discount')->with('rooms',$rooms)->with('discounts',$discounts);
    }

    public function discount_update(Request $request,$id,$did){
        $this->validate($request,[
            'discount_type' => 'required',
            'discount_name' => 'required',
            'discount_code' => 'required',
            'minimum_stay' => 'required',
            'booking_period_from' => 'required',
            'booking_period_to' => 'required',
            'travel_period_from' => 'required',
            'travel_period_to' => 'required',
            
        ]);

        $ds = Discount::find($did);
        
         $ds->discount_type=$request->discount_type;
         $ds->discount_name=$request->discount_name;
         $ds->discount_code=$request->discount_code;
         $ds->minimum_stay=$request->minimum_stay;
         $ds->booking_period_from=$request->booking_period_from;
         $ds->booking_period_to=$request->booking_period_to;
         $ds->travel_period_from=$request->travel_period_from;
         $ds->travel_period_to=$request->travel_period_to;
         
         $ds->reduction=$request->reduction;
         $ds->free_night_days=$request->free_night_days;
         $ds->free_night_value=$request->free_night_value;
         if(isset($request->free_night_repeat))
            {
              $ds->free_night_repeat = "1";
            }
            else
            {
              $ds->free_night_repeat = "0";
            }
        $ds->save();
            return redirect(route('discounts',$id))->with('message', 'Discount Updated Succesfully!');

    }

    public function discount_create(Request $request,$id)
    {
    	// dd($request);
        $this->validate($request,[
            'discount_type' => 'required',
            'discount_name' => 'required',
            'discount_code' => 'required',
            'minimum_stay' => 'required',
            'booking_period_from' => 'required',
            'booking_period_to' => 'required',
            'travel_period_from' => 'required',
            'travel_period_to' => 'required',
            
        ]);



        $rids=$request->room_id;
        if(count($rids) > 0){
            foreach ($rids as $key => $rid) {
             $ds=new Discount();
             $ds->hotel_id=$id;
             $ds->discount_type=$request->discount_type;
             $ds->discount_name=$request->discount_name;
             $ds->discount_code=$request->discount_code;
             $ds->minimum_stay=$request->minimum_stay;
             $ds->booking_period_from=$request->booking_period_from;
             $ds->booking_period_to=$request->booking_period_to;
             $ds->travel_period_from=$request->travel_period_from;
             $ds->travel_period_to=$request->travel_period_to;
             $ds->room_id=$rid;
             $ds->reduction=$request->reduction;
             $ds->free_night_days=$request->free_night_days;
             $ds->free_night_value=$request->free_night_value;

            if(isset($request->free_night_repeat))
            {
              $ds->free_night_repeat = "1";
            }
            else
            {
              $ds->free_night_repeat = "0";
            }
             $ds->save();

          }
        }else{
          $ds=new Discount();
             $ds->hotel_id=$id;
             $ds->discount_type=$request->discount_type;
             $ds->discount_name=$request->discount_name;
             $ds->discount_code=$request->discount_code;
             $ds->minimum_stay=$request->minimum_stay;
             $ds->booking_period_from=$request->booking_period_from;
             $ds->booking_period_to=$request->booking_period_to;
             $ds->travel_period_from=$request->travel_period_from;
             $ds->travel_period_to=$request->travel_period_to;
             $ds->room_id=0;
             $ds->reduction=$request->reduction;
             $ds->free_night_days=$request->free_night_days;
             $ds->free_night_value=$request->free_night_value;

            if(isset($request->free_night_repeat))
            {
              $ds->free_night_repeat = "1";
            }
            else
            {
              $ds->free_night_repeat = "0";
            }

             $ds->save();          
        }
        
        return redirect(route('discounts',$id))->with('message', 'Discount created Succesfully!');

    }
    public function discount_delete(Request $request,$id,$did)
    {
        $dis=Discount::find($did);
        $dis->delete();
        return redirect()->route('discounts',['id' => $id])->with('message','Discount Deleted Succesfully!');
    }
}