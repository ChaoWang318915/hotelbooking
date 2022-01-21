<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking_text_regular_price;
use App\Booking_text_on_request;
use App\Booking_text_special_price;
use Redirect;

class BookingTextController extends Controller
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
    public function regular_price_view(Request $request,$id)
    {
       $rp=Booking_text_regular_price::where('hotel_id',$id)->first();
       return view('/backend/hotels/booking-texts')->with('rp',$rp);
    }
    public function regular_price_update(Request $request,$id)
    {
        if($id)
        {
            $rp=Booking_text_regular_price::where('hotel_id',$id)->first();
            if($rp)
            {
               $rp->hotel_id=$id;
               $rp->check_in=$request->check_in;
               $rp->check_out=$request->check_out;
               $rp->info_check_in=$request->info_check_in;
               $rp->no_arrival_allowed_on=$request->no_arrival_allowed_on;
               $rp->required_at_check_in=$request->required_at_check_in;
               $rp->days_before_arrival=$request->days_before_arrival;
               $rp->cancellation_policy=$request->cancellation_policy;
               $rp->payment_information=$request->payment_information;
               $rp->price_information=$request->price_information;
               $rp->information_booking=$request->information_booking;
               $rp->inclusive=$request->inclusive;
               $rp->costs_paid_site=$request->costs_paid_site;
               $rp->hotel_policy=$request->hotel_policy;
               $rp->free_container=$request->free_container;
               $rp->save();
               return Redirect::back()->with('message','updated Successful !'); 


            }
            else{
                $rprice=new Booking_text_regular_price();
                $rprice->hotel_id=$id;
                $rprice->check_in=$request->check_in;
               $rprice->check_out=$request->check_out;
               $rprice->info_check_in=$request->info_check_in;
               $rprice->no_arrival_allowed_on=$request->no_arrival_allowed_on;
               $rprice->required_at_check_in=$request->required_at_check_in;
               $rprice->days_before_arrival=$request->days_before_arrival;
               $rprice->cancellation_policy=$request->cancellation_policy;
               $rprice->payment_information=$request->payment_information;
               $rprice->price_information=$request->price_information;
               $rprice->information_booking=$request->information_booking;
               $rprice->inclusive=$request->inclusive;
               $rprice->costs_paid_site=$request->costs_paid_site;
               $rprice->hotel_policy=$request->hotel_policy;
               $rprice->free_container=$request->free_container;
               $rprice->save();
                  return Redirect::back()->with('message','Created Successful !'); 

            }
        }
    }
    public function on_request(Request $request,$id)
    { 
       $rp=Booking_text_on_request::where('hotel_id',$id)->first();
       return view('/backend/hotels/on-request')->with('rp',$rp);
    }
    public function on_request_update(Request $request,$id)
    {
       if($id)
        {
            $on_request=Booking_text_on_request::where('hotel_id',$id)->first();
            if($on_request)
            {
               $on_request->hotel_id=$id;
               $on_request->check_in=$request->check_in;
               $on_request->check_out=$request->check_out;
               $on_request->info_check_in=$request->info_check_in;
               $on_request->no_arrival_allowed_on=$request->no_arrival_allowed_on;
               $on_request->required_at_check_in=$request->required_at_check_in;
               $on_request->days_before_arrival=$request->days_before_arrival;
               $on_request->cancellation_policy=$request->cancellation_policy;
               $on_request->payment_information=$request->payment_information;
               $on_request->price_information=$request->price_information;
               $on_request->information_booking=$request->information_booking;
               $on_request->inclusive=$request->inclusive;
               $on_request->costs_paid_site=$request->costs_paid_site;
               $on_request->hotel_policy=$request->hotel_policy;
               $on_request->free_container=$request->free_container;
               $on_request->save();
                  return Redirect::back()->with('message','updated Successful !'); 

            }
            else{
                $orequest=new Booking_text_on_request();
                $orequest->hotel_id=$id;
                $orequest->check_in=$request->check_in;
               $orequest->check_out=$request->check_out;
               $orequest->info_check_in=$request->info_check_in;
               $orequest->no_arrival_allowed_on=$request->no_arrival_allowed_on;
               $orequest->required_at_check_in=$request->required_at_check_in;
               $orequest->days_before_arrival=$request->days_before_arrival;
               $orequest->cancellation_policy=$request->cancellation_policy;
               $orequest->payment_information=$request->payment_information;
               $orequest->price_information=$request->price_information;
               $orequest->information_booking=$request->information_booking;
               $orequest->inclusive=$request->inclusive;
               $orequest->costs_paid_site=$request->costs_paid_site;
               $orequest->hotel_policy=$request->hotel_policy;
               $orequest->free_container=$request->free_container;
               $orequest->save();
                   return Redirect::back()->with('message','Created Successful !'); 
            }
        }
    }
      public function special_price(Request $request,$id)
    { 
       $rp=Booking_text_special_price::where('hotel_id',$id)->first();
       return view('/backend/hotels/special-price')->with('rp',$rp);
    }

    public function special_price_update(Request $request,$id)
    {


      $validatedData = $request->validate([
          'check_in' => 'required',
          'check_out'=> 'required',
          'info_check_in'=>'required|not_in:0',
          'no_arrival_allowed_on'=>'required|not_in:0',
          'required_at_check_in'=>'required',
          'days_before_arrival'=>'required|not_in:0',
          'cancellation_policy'=>'required|not_in:0',
          'payment_information'=>'required||not_in:0',
          'price_information'=>'required|not_in:0',
          'information_booking'=>'required|not_in:0',
          'inclusive'=>'required|not_in:0',
          'costs_paid_site'=>'required|not_in:0',
          'hotel_policy'=>'required|not_in:0',
          'free_container'=>'required|not_in:0',
          
      ]);
      if($id)
        {
            $sp=Booking_text_special_price::where('hotel_id',$id)->first();
            if($sp)
            {
               $sp->hotel_id=$id;
               $sp->check_in=$request->check_in;
               $sp->check_out=$request->check_out;
               $sp->info_check_in=$request->info_check_in;
               $sp->no_arrival_allowed_on=$request->no_arrival_allowed_on;
               $sp->required_at_check_in=$request->required_at_check_in;
               $sp->days_before_arrival=$request->days_before_arrival;
               $sp->cancellation_policy=$request->cancellation_policy;
               $sp->payment_information=$request->payment_information;
               $sp->price_information=$request->price_information;
               $sp->information_booking=$request->information_booking;
               $sp->inclusive=$request->inclusive;
               $sp->costs_paid_site=$request->costs_paid_site;
               $sp->hotel_policy=$request->hotel_policy;
               $sp->free_container=$request->free_container;
               $sp->save();
               session()->flash("success","Updated successfully");
                  return Redirect::back()->with('message','updated Successful !'); 

            }
            else{
                $bsp=new Booking_text_special_price();
                $bsp->hotel_id=$id;
                $bsp->check_in=$request->check_in;
               $bsp->check_out=$request->check_out;
               $bsp->info_check_in=$request->info_check_in;
               $bsp->no_arrival_allowed_on=$request->no_arrival_allowed_on;
               $bsp->required_at_check_in=$request->required_at_check_in;
               $bsp->days_before_arrival=$request->days_before_arrival;
               $bsp->cancellation_policy=$request->cancellation_policy;
               $bsp->payment_information=$request->payment_information;
               $bsp->price_information=$request->price_information;
               $bsp->information_booking=$request->information_booking;
               $bsp->inclusive=$request->inclusive;
               $bsp->costs_paid_site=$request->costs_paid_site;
               $bsp->hotel_policy=$request->hotel_policy;
               $bsp->free_container=$request->free_container;
               $bsp->save();
               session()->flash("success","Updated successfully");
                  return Redirect::back()->with('message','Created Successful !'); 

            }
        }
    }

}