<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use App\Room;
use App\Rate_date;
use App\Rates_menuplan;
use App\HotelSession;
use App\HotelSessionMeal;
use App\HotelSessionSp;
use App\HotelSessionPrice;
use App\HotelSessionTransfer;



class RatesController extends Controller
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
   public function price_overview(Request $request,$id)
   {
    $hotel_session=HotelSession::where('hotelId',$id)->get();
    $hotel_session_meals=HotelSessionMeal::where('hotelId',$id)->get();
    $hotel_session_transfer=HotelSessionTransfer::where('hotelId',$id)->get();
    $hotel_session_sps=HotelSessionSp::where('hotelId',$id)->get();
    $rooms=Room::where('hotel_id',$id)->get();
    $hotelId = $id;
    
    // $rate_menuplans=Rate_date::select('id','hotel_id','from','to')->where('hotel_id',$id)->where('rate_type','rate_menuplan')->get();
    // $rate_transfers=Rate_date::select('id','hotel_id','from','to')->where('hotel_id',$id)->where('rate_type','rate_transfer')->get();
    // $additional_services=Rate_date::select('id','hotel_id','from','to')->where('hotel_id',$id)->where('rate_type','additional_service')->get();
    $Preise = $this->GetSessionPriceTable($id);

    return view('/backend/hotels/price-overview',compact('hotel_session','hotel_session_meals','hotel_session_transfer','Preise','hotel_session_sps','rooms','hotelId'));
   }
    public function add_price(Request $request,$id,$did)
    {
       $rooms=Room::where('hotel_id',$id)->get();
      // dd($rooms);
       $SessionId = $did;
       // dd($SessionId);
       $hotelId = $id;
       $hotel_session=HotelSession::where('hotelId',$id)->get();
       $hotel_session_rate=HotelSession::where('id',$did)->get();
       // dd($hotel_session_rate);
       $Preise = $this->GetSessionPriceTable($id);


        $hotel_session_meals=HotelSessionMeal::where('hotelId',$id)->get();
        $hotel_session_transfer=HotelSessionTransfer::where('hotelId',$id)->get();
        $hotel_session_sps=HotelSessionSp::where('hotelId',$id)->get();
        $rooms=Room::where('hotel_id',$id)->get();
        $hotelId = $id;
       // dd($Preise);

       return view('backend.hotels.edit-price',compact('rooms','SessionId','Preise','hotelId','hotel_session','hotel_session_meals','hotel_session_transfer','hotel_session_sps','hotel_session_rate'));
    }

    public function add_session(Request $request,$id)
    {   
        $request->validate([
          'from' => 'required',
          'to' =>'required',
          
        ]);
        $session=new HotelSession();
        $session->hotelId=$id;
        $session->Start=$request->from;
        $session->End=$request->to;
        $session->save();
        return redirect()->route('price-overview',['id' => $id]);

    }

    public function add_session_sp(Request $request,$id)
    {   
        $request->validate([
          'from' => 'required',
          'to' =>'required',
          
        ]);
        $session=new HotelSessionSp();
        $session->hotelId=$id;
        $session->Start=$request->from;
        $session->End=$request->to;
        $session->save();
        return redirect()->route('price-overview',['id' => $id]);

    }

    public function add_session_meal(Request $request,$id)
    {   
        $request->validate([
          'from' => 'required',
          'to' =>'required',
          
        ]);
        $session=new HotelSessionMeal();
        $session->hotelId=$id;
        $session->Start=$request->from;
        $session->End=$request->to;
        $session->save();
        return redirect()->route('price-overview',['id' => $id]);

    }

    public function add_session_transfer(Request $request,$id)
    {   
        $request->validate([
          'from' => 'required',
          'to' =>'required',
          
        ]);

        $session=new HotelSessionTransfer();
        $session->hotelId=$id;
        $session->Start=$request->from;
        $session->End=$request->to;
        $session->save();
        return redirect()->route('price-overview',['id' => $id]);

    }


    public function price_menuplan(Request $request,$id,$did)
    {
        $rd=Rates_menuplan::where('rates_id',$did)->first();
        return view('/backend/hotels/price-menuplan')->with('rd',$rd);
    }


    public function price_mealplan(Request $request,$hotelId,$menuplanid)
    {

      // dd($hotelId);
        $mealplans=HotelSessionMeal::find($menuplanid);
        $hotel_session=HotelSession::where('hotelId',$hotelId)->get();
        // dd($hotel_session);
        $hotel_session_meals=HotelSessionMeal::where('hotelId',$hotelId)->get();
        $hotel_session_transfer=HotelSessionTransfer::where('hotelId',$hotelId)->get();
        $hotel_session_sps=HotelSessionSp::where('hotelId',$hotelId)->get();
        $rooms=Room::where('hotel_id',$hotelId)->get();
        $hotelId = $hotelId;
        
        $SessionId = $menuplanid;
        $Preise = $this->GetSessionPriceTable($hotelId);

        return view('/backend/hotels/price-mealplan',compact('mealplans','rooms','SessionId','Preise','hotelId','hotel_session','hotel_session_meals','hotel_session_transfer','hotel_session_sps'));
    }

    public function price_transfer(Request $request,$hotelId,$transferid)
    {

     
        $transfer=HotelSessionTransfer::find($transferid);
        $hotel_session=HotelSession::where('hotelId',$hotelId)->get();
        // dd($hotel_session);
        $hotel_session_meals=HotelSessionMeal::where('hotelId',$hotelId)->get();
        $hotel_session_transfer=HotelSessionTransfer::where('hotelId',$hotelId)->get();
        $hotel_session_sps=HotelSessionSp::where('hotelId',$hotelId)->get();
        $rooms=Room::where('hotel_id',$hotelId)->get();
        $hotelId = $hotelId;
        
        $SessionId = $transferid;
        $Preise = $this->GetSessionPriceTable($hotelId);

        return view('/backend/hotels/edit-transfer',compact('transfer','rooms','SessionId','Preise','hotelId','hotel_session','hotel_session_meals','hotel_session_transfer','hotel_session_sps'));
    }

    public function price_sp(Request $request,$hotelId,$spid)
    {

      // dd($hotelId);
        $sp=HotelSessionSp::find($spid);
        $hotel_session=HotelSession::where('hotelId',$hotelId)->get();
        // dd($hotel_session);
        $hotel_session_meals=HotelSessionMeal::where('hotelId',$hotelId)->get();
        $hotel_session_transfer=HotelSessionTransfer::where('hotelId',$hotelId)->get();
        $hotel_session_sps=HotelSessionSp::where('hotelId',$hotelId)->get();
        $rooms=Room::where('hotel_id',$hotelId)->get();
        $hotelId = $hotelId;
        
        $SessionId = $spid;
        $Preise = $this->GetSessionPriceTable($hotelId);

        return view('/backend/hotels/edit-sp',compact('sp','rooms','SessionId','Preise','hotelId','hotel_session','hotel_session_meals','hotel_session_transfer','hotel_session_sps'));
    }

  public function price_menuplan_update(Request $request,$id,$did)
  {
    $rd=Rates_menuplan::where('rates_id',$did)->first();
    if($rd)
    {

    }
    else{
         $file = $request->file('file');
         $name=$file->getClientOriginalName();
         $file->move(public_path().'/images/room', $name); 
          $rm=new Rates_menuplan();
          $rm->hotel_id=$id;
          $rm->rates_id=$did;
          $rm->menuplan_name=$request->menuplan_name;
          $rm->rates_adult=$request->rates_adult;
          $rm->rates_child=$request->rates_child;
          $rm->rates_baby=$request->rates_baby;
          $rm->rates_teen=$request->rates_teen;
          $rm->menuplan_description=$request->menuplan_description;
          $rm->image_name=$name;
          $rm->save();
    }
  }



  public function store_price(Request $request,$hotelId,$sessionId){
    // dd($request);
      unset($request['_token']);
      unset($request['date_id']);
      HotelSessionPrice::where(['HotelId'=>$hotelId,'SessionId'=>$sessionId])->delete();
      $hotel_rooms = Room::where('hotel_id',$hotelId)->get();
      // dd($hotel_rooms); 
      foreach ($hotel_rooms as $k => $v)
      {
        $hotelsession = HotelSession::where(['id'=>$sessionId,'hotelId'=>$hotelId])->get();
        // dd($hotelsession);
        foreach ($hotelsession as $x) {
              // dd($request['StornoValue-'.$x->id.'-'.$v->id]);

              $avl_data['HotelId'] = $hotelId;
              $avl_data['RoomId'] = $v->id;
              $avl_data['SessionId'] = $sessionId;
              $avl_data['PriceSingle'] = $this->CheckValue($request['PriceSingle-'.$x->id.'-'.$v->id]);
              $avl_data['PriceDoppel'] = $this->CheckValue($request['PriceDoppel-'.$x->id.'-'.$v->id]);
              $avl_data['PriceTripple'] = $this->CheckValue($request['PriceTripple-'.$x->id.'-'.$v->id]);
              $avl_data['PriceRoom'] = $this->CheckValue($request['PriceRoom-'.$x->id.'-'.$v->id]);
              $avl_data['PriceExtraPax'] = $this->CheckValue($request['PriceExtraPax-'.$x->id.'-'.$v->id]);
              $avl_data['PriceKind1'] = $this->CheckValue($request['PriceKind1-'.$x->id.'-'.$v->id]);
              $avl_data['PriceKind2'] = $this->CheckValue($request['PriceKind2-'.$x->id.'-'.$v->id]);
              $avl_data['PriceKind3'] = $this->CheckValue($request['PriceKind3-'.$x->id.'-'.$v->id]);
              $avl_data['MainMeal'] = $this->CheckValue($request['MainMeal-'.$x->id.'-'.$v->id]);
              $avl_data['ShowPricePerson'] = $this->CheckValue($request['ShowPricePerson-'.$x->id.'-'.$v->id]);
              $avl_data['ChildInc'] = $this->CheckValue($request['ChildInc-'.$x->id.'-'.$v->id]);
              $avl_data['MealType1'] = $this->CheckValue($request['MealType1-'.$x->id.'-'.$v->id]);
              $avl_data['MealValue1'] = $this->CheckValue($request['MealValue1-'.$x->id.'-'.$v->id]);
              $avl_data['MealType2'] = $this->CheckValue($request['MealType2-'.$x->id.'-'.$v->id]);
              $avl_data['MealValue2'] = $this->CheckValue($request['MealValue2-'.$x->id.'-'.$v->id]);
              $avl_data['MealType3'] = $this->CheckValue($request['MealType3-'.$x->id.'-'.$v->id]);
              $avl_data['MealValue3'] = $this->CheckValue($request['MealValue3-'.$x->id.'-'.$v->id]);
              $avl_data['MealType4'] = $this->CheckValue($request['MealType4-'.$x->id.'-'.$v->id]);
              $avl_data['MealValue4'] = $this->CheckValue($request['MealValue4-'.$x->id.'-'.$v->id]);
              $avl_data['MinStay'] = $this->CheckValue($request['MinStay-'.$x->id.'-'.$v->id]);
              $avl_data['StornoType'] = $this->CheckValue($request['StornoType-'.$x->id.'-'.$v->id]);
              $avl_data['StornoValue'] = $this->CheckValue($request['StornoValue-'.$x->id.'-'.$v->id]);
              $avl_data['RateCode'] = $request['RateCode'];
              
              $shotelsession = HotelSession::find($sessionId);
              // dd($request['RateCode-'.$x->id.'-'.$v->id]);
              $shotelsession->RateCode = $request['RateCode'];
              $shotelsession->save();
              // dd($avl_data);
              $data = HotelSessionPrice::create($avl_data);
              $data->save();
        }

      }
      return Redirect::back()->with('message','updated Successful !'); 
    
  }

  public function meal_plan_update(Request $request,$hotelId,$mealplanid){

      // dd($request);
      // dd($this->CheckValue($request->Value_Teen_1));
      $tags=HotelSessionMeal::find($mealplanid);
      // dd($tags);

    for($i=1;$i<=6;$i++) 
    {
      $mt = 'Meal_'.$i;
      $a = 'Value_Adult_'.$i;
      $b = 'Value_Baby_'.$i;
      $c = 'Value_Child_'.$i;
      $t = 'Value_Teen_'.$i;

      $tmt = 'MealType'.$i;
      $ta = 'AdultValue'.$i;
      $tb = 'BabyValue'.$i;
      $tc = 'ChildValue'.$i;
      $tt = 'TeenValue'.$i;

      $tags->$tmt=$this->CheckValue($request->$mt);
      $tags->$ta=$this->CheckValue($request->$a);
      $tags->$tb=$this->CheckValue($request->$b);
      $tags->$tc=$this->CheckValue($request->$c);
      $tags->$tt=$this->CheckValue($request->$t);
          
    }



      // dd($tags);
      $tags->save(); 
      return Redirect::back()->with('message','updated Successful !');  
  }


  public function transfer_updatedata(Request $request,$hotelId,$transferid){
      // dd($request);
      // dd($this->CheckValue($request->Value_Teen_1));
      $tags=HotelSessionTransfer::find($transferid);

      // dd($tags);
    

      $tags->Type=$this->CheckValue($request->Type);
      $tags->Adult=$this->CheckValue($request->Value_Adult);
      $tags->Baby=$this->CheckValue($request->Value_Baby);
      $tags->Child=$this->CheckValue($request->Value_Child);
      $tags->Teen=$this->CheckValue($request->Value_Teen);
          




      // dd($tags);
      $tags->save(); 
      return Redirect::back()->with('message','updated Successful !');  
  }

  public function sp_updatedata(Request $request,$hotelId,$spid){
      // dd($request);
      // dd($this->CheckValue($request->Value_Teen_1));
      $tags=HotelSessionSp::find($spid);

      // dd($tags);
    

      $tags->Type=$this->CheckValue($request->Type);
      $tags->Adult=$this->CheckValue($request->Value_Adult);
      $tags->Baby=$this->CheckValue($request->Value_Baby);
      $tags->Child=$this->CheckValue($request->Value_Child);
      $tags->Teen=$this->CheckValue($request->Value_Teen);
          




      // dd($tags);
      $tags->save(); 
      return Redirect::back()->with('message','updated Successful !');  
  }

  public function session_update(Request $request,$sessionid)
  {
      $validatedData = $request->validate([
          'to' => 'required',
          'from'=> 'required',
          
          ]);
      $tags=HotelSession::find($sessionid);

      $tags->Start=$request->from;
      $tags->End=$request->to;
      $tags->save(); 
      return Redirect::back()->with('message','updated Successful !');     
  }

  public function session_update_mealplan(Request $request,$sessionid)
  {

    // dd($sessionid);
      $validatedData = $request->validate([
          'to' => 'required',
          'from'=> 'required',
          
          ]);
      $tags=HotelSessionMeal::find($sessionid);

      $tags->Start=$request->from;
      $tags->End=$request->to;
      $tags->save(); 
      return Redirect::back()->with('message','updated Successful !');     
  }

  public function session_update_transfer(Request $request,$sessionid)
  {

    // dd($sessionid);
      $validatedData = $request->validate([
          'to' => 'required',
          'from'=> 'required',
          
          ]);
      $tags=HotelSessionTransfer::find($sessionid);

      $tags->Start=$request->from;
      $tags->End=$request->to;
      $tags->save(); 
      return Redirect::back()->with('message','updated Successful !');     
  }

  public function session_update_sp(Request $request,$sessionid)
  {

    // dd($sessionid);
      $validatedData = $request->validate([
          'to' => 'required',
          'from'=> 'required',
          
          ]);
      $tags=HotelSessionSp::find($sessionid);

      $tags->Start=$request->from;
      $tags->End=$request->to;
      $tags->save(); 
      return Redirect::back()->with('message','updated Successful !');     
  }

  public function price_delete(Request $request,$sessionid)
    {
      $bar_delete=HotelSession::find($sessionid);
      $id = $bar_delete->HotelId;
      $bar_delete->delete();
      
      return redirect()->route('price-overview',['id' => $id])->with('message','Deleted Successful !'); 
       // return Redirect::back()->
    }

    public function price_transfer_delete(Request $request,$sessionid)
    {
      $bar_delete=HotelSessionTransfer::find($sessionid);
      $id = $bar_delete->HotelId;
      $bar_delete->delete();
      
      return redirect()->route('price-overview',['id' => $id])->with('message','Deleted Successful !'); 
       // return Redirect::back()->
    }

    public function price_sp_delete(Request $request,$sessionid)
    {
      $bar_delete=HotelSessionSp::find($sessionid);
      $id = $bar_delete->HotelId;
      $bar_delete->delete();
      
      return redirect()->route('price-overview',['id' => $id])->with('message','Deleted Successful !'); 
       // return Redirect::back()->
    }

    public function price_meal_delete(Request $request,$sessionid)
    {
      $bar_delete=HotelSessionMeal::find($sessionid);
       $id = $bar_delete->HotelId;
      
      $bar_delete->delete();
      
      return redirect()->route('price-overview',['id' => $id])->with('message','Deleted Successful !'); 
       // return Redirect::back()->with('message','Deleted Successful !'); 
    }


  public function GetSessionPriceTable($hotelId){
    $hotel_session_prices=HotelSessionPrice::where('HotelId',$hotelId)->get();
    // dd($hotel_session_prices);
    $d = array();
    foreach ($hotel_session_prices as $key => $value) {
      $d[$value->RoomId][$value->SessionId]['PriceSingle'] = $value->PriceSingle;
      $d[$value->RoomId][$value->SessionId]['PriceDoppel'] = $value->PriceDoppel;
      $d[$value->RoomId][$value->SessionId]['PriceTripple'] = $value->PriceTripple;
      $d[$value->RoomId][$value->SessionId]['PriceRoom'] = $value->PriceRoom;
      $d[$value->RoomId][$value->SessionId]['PriceEvaluetraPavalue'] = $value->PriceEvaluetraPavalue;
      
      $d[$value->RoomId][$value->SessionId]['PriceKind1'] = $value->PriceKind1;
      $d[$value->RoomId][$value->SessionId]['PriceKind2'] = $value->PriceKind2;
      $d[$value->RoomId][$value->SessionId]['PriceKind3'] = $value->PriceKind3;
      
      $d[$value->RoomId][$value->SessionId]['MainMeal'] = $value->MainMeal;
      
      $d[$value->RoomId][$value->SessionId]['ShowPricePerson'] = $value->ShowPricePerson;
      $d[$value->RoomId][$value->SessionId]['ChildInc'] = $value->ChildInc;
      $d[$value->RoomId][$value->SessionId]['PriceExtraPax'] = $value->PriceExtraPax;
      
   
      
      $d[$value->RoomId][$value->SessionId]['MinStay'] = $value->MinStay;
      
      $d[$value->RoomId][$value->SessionId]['StornoType'] = $value->StornoType;
      $d[$value->RoomId][$value->SessionId]['StornoValue'] = $value->StornoValue;
      
      $d[$value->RoomId][$value->SessionId]['RateCode'] = $value->RateCode;
    }

    return $d;

  }


  public static function CheckValue($value)
  {
    if (isset($value)) return $value;
    return 0;
  }

  }