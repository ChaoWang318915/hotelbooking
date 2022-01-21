<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Redirect;
use App\Hotel;
use App\Hotel_image;
use App\Transfer;
use App\Tag_manager;
use App\Discount;
use App\Booking_text_on_request;
use App\Booking_text_regular_price;
use App\Booking_text_special_price;
use App\Hotel_feature;
use App\Hotel_text;
use App\Info_page;
use App\Restaurant;
use App\Restaurant_image;
use App\Room;
use App\Room_image;
use App\Teaser_text;
use App\Text_content;
use App\HotelSessionPrice;
use App\Currency;
use App\Teaser;
use App\Atoll;


use DB;


				
				

class TeaserpageController extends Controller
{

	public function allHotels(Request $request){
		$allHotel = Hotel::all();
		return response()->json(['allHotel' => $allHotel]);
	}

    public function teaserpage(Request $request)
    {
      $hotels=Hotel::LeftJoin('transfers','hotels.id','=','transfers.hotel_id')->select('hotels.*','hotels.id as ids','transfers.*')->get();
      return view('/frontend/teaser-page')->with('hotels',$hotels);
    }

    public function teaserpagepost(Request $request)
    {

    	$hotel_special = $request->special_interest_value;
      $hotels=Hotel::LeftJoin('transfers','hotels.id','=','transfers.hotel_id')->select('hotels.*','hotels.id as ids','transfers.*')->get();
      return view('/frontend/teaser-page')->with('hotels',$hotels)->with('hotel_special',$hotel_special);
    }

    public function teaser_filter_bookmark(Request $request) {
    	// dd($request->all());
    	$currentDate = date('Y-m-d');
    	$hotels = \DB::table("hotels")
    					->select('hotels.*',
    						'hotels.id as hid',
    						'transfers.*','transfers.id as transfer_id',				
    						'hotel_features.*','hotel_features.id as hotel_features_id',
    						'hotel_texts.*','hotel_texts.id as hotel_texts_id',
    						'teaser_texts.*','teaser_texts.id as teaser_texts_id',
    						'info_pages.*','info_pages.id as info_pages_id',
    						'text_contents.*','text_contents.id as text_contents_id',
    						'booking_text_special_prices.*','booking_text_special_prices.id as booking_text_special_prices_id',
    						'booking_text_regular_prices.*','booking_text_regular_prices.id as booking_text_regular_prices_id',
    						'booking_text_on_requests.*','booking_text_on_requests.id as booking_text_on_requests_id'
    		
    					)
    					->LeftJoin('transfers','hotels.id','=','transfers.hotel_id')
    					->LeftJoin('hotel_features','hotels.id','=','hotel_features.hotel_id')
    					->LeftJoin('hotel_texts','hotels.id','=','hotel_texts.hotel_id')
    					->LeftJoin('teaser_texts','hotels.id','=','teaser_texts.hotel_id')
    					->LeftJoin('info_pages','hotels.id','=','info_pages.hotel_id')
    					->LeftJoin('text_contents','hotels.id','=','text_contents.hotel_id')
    					->LeftJoin('booking_text_special_prices','hotels.id','=','booking_text_special_prices.hotel_id')
    					->LeftJoin('booking_text_regular_prices','hotels.id','=','booking_text_regular_prices.hotel_id')
    					->LeftJoin('booking_text_on_requests','hotels.id','=','booking_text_on_requests.hotel_id');
    					// ->LeftJoin('teasers','teasers.id','=','teasers.hotel_id');
    		$euro_value = Currency::find(1);
		
    					// dd($request->hotelIDs);
		$hotels = $hotels->whereIn('hotels.id', $request->hotelIDs)->where('hotels.status',1)->get();
		// dd($hotels);
		foreach ($hotels as $hotel) {
			if(!empty($hotel)){
				$hotel->hotel_images = Hotel_image::where('hotel_id',$hotel->hid)->get();
				$hotel->hotel_rooms = Room::where('hotel_id',$hotel->hid)->get();
				$hotel_room_min=[];
				$hotel_room_min = DB::select("select rooms.*, hotel_session_prices.priceDoppel
										from rooms
										left join hotel_session_prices on (
										    rooms.id = hotel_session_prices.RoomId 
										    and hotel_session_prices.priceDoppel = (
										        select min(priceDoppel)
										        from hotel_session_prices
										        where RoomId = rooms.id
										        
										        and hotel_session_prices.priceDoppel <>0
										        

										    ) 
										)

										    where rooms.hotel_id=".$hotel->hid." 
										    order by hotel_session_prices.priceDoppel
										    limit 1
										        
										;");
				if(count($hotel_room_min)>0){
					$hotel->hotel_room_min = $hotel_room_min[0];
				}else{
					$hotel->hotel_room_min = "";
				}
				
				// $hotel->tag_manger = Tag_manager::where('hotel_id',$hotel->hid)->where('start','<=',$currentDate)->where('end','>=',$currentDate)->get();
				$hotel->tag_manger = Tag_manager::where('hotel_id',$hotel->hid)->get();

				$hotel->Discount = Discount::where('hotel_id',$hotel->hid)->get();
				$atoll = \DB::table("islands")->select('atoll_id')->where('id',$hotel->island)->where('island_status',1)->get();
				$island = \DB::table("islands")->select('island_name')->where('id',$hotel->island)->where('island_status',1)->get();
				//dd($atoll[0]->atoll_id);
				if(count($island)){
					$hotel->island_name = $island[0];
					// dd($hotel->atoll);
				
				}else{
					$hotel->island_name = '';
				}

				if(count($atoll)){
					$hotel->atoll = Atoll::where('id',$atoll[0]->atoll_id)->where('atoll_status',1)->get();
					// dd($hotel->atoll);
					if(count($hotel->atoll)){
						$hotel->atoll = $hotel->atoll[0];
					}
				}else{
					$hotel->atoll = '';
				}
				$hotel_rates = [];
				if(!empty($hotel->hotel_rooms)){
					foreach ($hotel->hotel_rooms as $room) {
						$room_rates = HotelSessionPrice::where('RoomId','=',$room->id)->get();

				      if(count($room_rates)){
				      	$room_price =   \DB::table('hotel_session_prices')->where('RoomId','=',$room->id)->where('PriceDoppel','>',0)->min('PriceDoppel');

				      	$room_price_euro = $room_price;
				      	// if($hotel->invoice_currency =="euro"){
				      	// 	$room_price_euro = $room_price;
				      	// }else{

				      	// 	$room_price_euro = round($room_price * $euro_value->exchange_value);
				      	// 	// $room_price_euro = $room_price;	
				      	// }

				      	// $room_price_euro = round($room_price * 0.845);
				      	// $room_price_euro = $room_price;
				      	
				      }else{
				      	$room_price = 0;
				      	$room_price_euro = 0;
				  	  }
				  	  array_push($hotel_rates, $room_price_euro);
					}
					$hotel_rates =array_filter($hotel_rates,'strlen');
					$hotel_rates =array_filter($hotel_rates);
					// dd($hotel_rates);
					if(!empty($hotel_rates)){
						// $a = array_filter($hotel_rates);
						// if(count($a)) {
						//     $avg = array_sum($a)/count($a);
						//     $hotel->min_rate = round($avg);

						// }
						$hotel->min_rate = min($hotel_rates);
						$hotel->min_meal_plan = HotelSessionPrice::where('priceDoppel',$hotel->min_rate)->where('HotelId',$hotel->hid)->first();
						if(isset($hotel->min_meal_plan) && $hotel->min_meal_plan !="" && $hotel->min_meal_plan !=null){
							$hotel->min_meal_plan = $MealOptionsCustomName[$hotel->min_meal_plan->MainMeal];
						}else{
							$hotel->min_meal_plan = $hotel->board;
						} 
						$getDiscount = Discount::where('hotel_id','=',$hotel->hid)->where('discount_type','<>','Free-Night')->orderBy('created_at', 'desc')->first();
						// dd($getDiscount);
						if(!empty($getDiscount)){
							$hotel->is_discount = 1;
							$hotel->before_discount = round($hotel->min_rate * $euro_value->exchange_value);

							

							if($getDiscount->reduction !=null && is_numeric($getDiscount->reduction)){
								if($getDiscount->discount_type == 'Percent'){
									// dd($hotel->min_rate * $getDiscount->reduction/100);
									$reduction = (int)$hotel->min_rate * (int)$getDiscount->reduction/100;
									// dd($hotel->min_rate);
									$hotel->min_rate = (int)$hotel->min_rate -(int)$reduction;
									if($hotel->invoice_currency =="euro"){
							      		$hotel->min_rate = $hotel->min_rate;
							      	}else{
							      		// dd($euro_value->exchange_value,$room_price);
							      		$hotel->min_rate = round($hotel->min_rate * $euro_value->exchange_value);
							      		// $room_price_euro = $room_price;	
							      	}
								}else{
									$hotel->min_rate = (int)$hotel->min_rate - (int)$getDiscount->reduction;
									$hotel->min_rate = round($hotel->min_rate);
									if($hotel->invoice_currency =="euro"){
							      		$hotel->min_rate = $hotel->min_rate;
							      	}else{
							      		// dd($euro_value->exchange_value,$room_price);
							      		$hotel->min_rate = round($hotel->min_rate * $euro_value->exchange_value);
							      		// $room_price_euro = $room_price;	
							      	}
								}	
							}
							
							
						}else {
							$hotel->before_discount = 0;
							$hotel->is_discount = 0;
						}
						 
					}else{
						$hotel->min_rate = 0;
						$hotel->min_meal_plan = $hotel->board;
					}
				}
				
				
			}
		}

		// dd($hotels);
		

		$filledarr = [];
		

		



		$teaser_header=Teaser::where('id',1)->get();
		// $hotels->teaser_header = $teaser;
		// echo "<pre>";


		// print_r($hotels);
		// exit();
		
		return response()->json(['hotels' => $hotels,'teaser_header'=> $teaser_header]);
		// print_r($hotels);
		// dd($hotels);
		// $previousUrl = app('url')->previous();
		// dd($previousUrl);
		// return redirect()->to($previousUrl)->with(compact('hotels'));
    }

    public function teaser_filter(Request $request) {

    	$MealOptionsCustomName = array(
			0=>'select',
			'B&B'=>'Bed & Breakfast',
			'HB'=>'Halbpension',
			'FB'=>'Vollpension',
			'AI'=>'All Inclusive',
			'HBP'=>'Halbpension Premium',
			'PAI'=>'Premium All Inclusive',
			'PLAI'=>'Platinum All Inclusive',
			'K1'=>'K1',
			'K2'=>'K2',
			'SB'=>'Selbstverpflegung',
			'SAI'=>'Silver All Inclusive'
			);
    	// dd($request->all());
    	$currentDate = date('Y-m-d');
    	$hotels = \DB::table("hotels")
    					->select('hotels.*',
    						'hotels.id as hid',
    						'transfers.*','transfers.id as transfer_id',				
    						'hotel_features.*','hotel_features.id as hotel_features_id',
    						'hotel_texts.*','hotel_texts.id as hotel_texts_id',
    						'teaser_texts.*','teaser_texts.id as teaser_texts_id',
    						'info_pages.*','info_pages.id as info_pages_id',
    						'text_contents.*','text_contents.id as text_contents_id',
    						'booking_text_special_prices.*','booking_text_special_prices.id as booking_text_special_prices_id',
    						'booking_text_regular_prices.*','booking_text_regular_prices.id as booking_text_regular_prices_id',
    						'booking_text_on_requests.*','booking_text_on_requests.id as booking_text_on_requests_id'
    		
    					)
    					->LeftJoin('transfers','hotels.id','=','transfers.hotel_id')
    					->LeftJoin('hotel_features','hotels.id','=','hotel_features.hotel_id')
    					->LeftJoin('hotel_texts','hotels.id','=','hotel_texts.hotel_id')
    					->LeftJoin('teaser_texts','hotels.id','=','teaser_texts.hotel_id')
    					->LeftJoin('info_pages','hotels.id','=','info_pages.hotel_id')
    					->LeftJoin('text_contents','hotels.id','=','text_contents.hotel_id')
    					->LeftJoin('booking_text_special_prices','hotels.id','=','booking_text_special_prices.hotel_id')
    					->LeftJoin('booking_text_regular_prices','hotels.id','=','booking_text_regular_prices.hotel_id')
    					->LeftJoin('booking_text_on_requests','hotels.id','=','booking_text_on_requests.hotel_id');
    					// ->LeftJoin('teasers','teasers.id','=','teasers.hotel_id');
    	$euro_value = Currency::find(1);
		if(!empty($request->hotelcategory))
		{   	
	    	foreach ($request->hotelcategory as $hcat) {
	    		$hotels->whereRaw('FIND_IN_SET(?,hotels.hotelcategory1)', [$hcat]);
	    	}
		}

		if(!empty($request->catering))
		{   	
	    	foreach ($request->catering as $board) {
	    		$hotels->whereRaw('FIND_IN_SET(?,hotels.board)', [$board]);
	    	}
		}

		if(!empty($request->minstay))
		{   	
	    	$hotels->where('hotels.minimum_stay',$request->minstay);	
		}

		if(!empty($request->stars))
		{   	
	    	$point = 0;

			$point = $request->stars[0]+0.5;
	    	// dd($point);
	    	$hotels->whereBetween('hotels.stars',[$request->stars,$point]);	
		}

		if(!empty($request->transfer))
		{   	
			foreach ($request->transfer as $transfer) {
	    		$hotels->orWhere('transfers.'.$transfer,'1');
	    	}
		}

		if(!empty($request->divingbases))
		{   	
			$hotels->where('hotels.divingbases',$request->divingbases);
	    	// foreach ($request->diving_bases as $dib) {
	    	// 	$hotels->whereRaw('FIND_IN_SET(?,hotels.divingbases)', [$dib]);
	    	// }
		}

		$hotels = $hotels->where('hotels.status',1)->orderBy('hotels.hotel_name', 'Asc')->get();
		// dd($hotels);
		foreach ($hotels as $hotel) {
			if(!empty($hotel)){
				$hotel->hotel_images = Hotel_image::where('hotel_id',$hotel->hid)->get();
				$hotel->hotel_rooms = Room::where('hotel_id',$hotel->hid)->get();
				$hotel_room_min=[];
				$hotel_room_min = DB::select("select rooms.*, hotel_session_prices.priceDoppel
										from rooms
										left join hotel_session_prices on (
										    rooms.id = hotel_session_prices.RoomId 
										    and hotel_session_prices.priceDoppel = (
										        select min(priceDoppel)
										        from hotel_session_prices
										        where RoomId = rooms.id
										        
										        and hotel_session_prices.priceDoppel <>0
										        

										    ) 
										)

										    where rooms.hotel_id=".$hotel->hid." 
										    order by hotel_session_prices.priceDoppel
										    limit 1
										        
										;");
				if(count($hotel_room_min)>0){
					$hotel->hotel_room_min = $hotel_room_min[0];
				}else{
					$hotel->hotel_room_min = "";
				}
				// $hotel->tag_manger = Tag_manager::where('hotel_id',$hotel->hid)->where('start','<=',$currentDate)->where('end','>=',$currentDate)->get();
				$hotel->tag_manger = Tag_manager::where('hotel_id',$hotel->hid)->get();

				$hotel->Discount = Discount::where('hotel_id',$hotel->hid)->get();
				$atoll = \DB::table("islands")->select('atoll_id')->where('id',$hotel->island)->where('island_status',1)->get();
				$island = \DB::table("islands")->select('island_name')->where('id',$hotel->island)->where('island_status',1)->get();
				//dd($atoll[0]->atoll_id);
				if(count($island)){
					$hotel->island_name = $island[0];
					// dd($hotel->atoll);
				
				}else{
					$hotel->island_name = '';
				}

				if(count($atoll)){
					$hotel->atoll = Atoll::where('id',$atoll[0]->atoll_id)->where('atoll_status',1)->get();
					// dd($hotel->atoll);
					if(count($hotel->atoll)){
						$hotel->atoll = $hotel->atoll[0];
					}
				}else{
					$hotel->atoll = '';
				}
				$hotel_rates = [];
				if(!empty($hotel->hotel_rooms)){
					foreach ($hotel->hotel_rooms as $room) {
						$room_rates = HotelSessionPrice::where('RoomId','=',$room->id)->get();

				      if(count($room_rates)){
				      	$room_price =   \DB::table('hotel_session_prices')->where('RoomId','=',$room->id)->where('PriceDoppel','>',0)->min('PriceDoppel');
				      	$room_price_euro = $room_price;
				      	// dd($room_price);

				      	// $room_price_euro = $room_price;
				      	
				      }else{
				      	$room_price = 0;
				      	$room_price_euro = 0;
				  	  }
				  	  $hotel_rates[$room->id] = $room_price_euro;
				  	  // array_push($hotel_rates, $room_price_euro);
					}
					// dd($hotel_rates);

					$hotel_rates =array_filter($hotel_rates,'strlen');
					$hotel_rates =array_filter($hotel_rates);
					if(!empty($hotel_rates)){
						asort($hotel_rates);
						$min_room_id = array_keys($hotel_rates);
						$min_room_id = $min_room_id[0];
						// dd($min_room_id[0]);
						// $a = array_filter($hotel_rates);
						// if(count($a)) {
						//     $avg = array_sum($a)/count($a);
						//     $hotel->min_rate = round($avg);

						// }
						// $hotel->min_rate = min($hotel_rates);

						$hotel->min_rate = $hotel_rates[$min_room_id];
						$hotel->min_meal_plan = HotelSessionPrice::where('priceDoppel',$hotel->min_rate)->where('RoomId',$min_room_id)->latest()->first();
						// dd($hotel->min_meal_plan);
						if(isset($hotel->min_meal_plan) && $hotel->min_meal_plan !="" && $hotel->min_meal_plan !=null){
							$hotel->min_meal_plan = $MealOptionsCustomName[$hotel->min_meal_plan->MainMeal];
						}else{
							$hotel->min_meal_plan = $hotel->board;
						}  
						// dd($hotel->min_meal_plan);
						$getDiscount = Discount::where('hotel_id','=',$hotel->hid)->where('discount_type','<>','Free-Night')->orderBy('created_at', 'desc')->first();
						// dd($getDiscount);
						if(!empty($getDiscount)){
							$hotel->is_discount = 1;
							$hotel->before_discount = round($hotel->min_rate * $euro_value->exchange_value);

							

							if($getDiscount->reduction !=null && is_numeric($getDiscount->reduction)){
								if($getDiscount->discount_type == 'Percent'){
									// dd($hotel->min_rate * $getDiscount->reduction/100);
									$reduction = (int)$hotel->min_rate * (int)$getDiscount->reduction/100;
									// dd($hotel->min_rate);
									$hotel->min_rate = (int)$hotel->min_rate -(int)$reduction;
									$hotel->min_rate = round($hotel->min_rate);

									
				      	
							      	// $room_price_euro = round($room_price * 0.845);
							      	if($hotel->invoice_currency =="euro"){
							      		$hotel->min_rate = $hotel->min_rate;
							      	}else{
							      		// dd($euro_value->exchange_value,$room_price);
							      		$hotel->min_rate = round($hotel->min_rate * $euro_value->exchange_value);
							      		// $room_price_euro = $room_price;	
							      	}

								}else{
									$hotel->min_rate = (int)$hotel->min_rate - (int)$getDiscount->reduction;
									// dd($hotel->min_rate * $euro_value->exchange_value);
									$hotel->min_rate = round($hotel->min_rate);


				      	
							      	// $room_price_euro = round($room_price * 0.845);
							      	if($hotel->invoice_currency =="euro"){
							      		$hotel->min_rate = $hotel->min_rate;
							      	}else{
							      		// dd($euro_value->exchange_value,$room_price);
							      		$hotel->min_rate = round($hotel->min_rate * $euro_value->exchange_value);
							      		// $room_price_euro = $room_price;	
							      	}
								}	
							}
							
							
						}else {
							$hotel->before_discount = 0;
							$hotel->is_discount = 0;
						}
						 
					}else{
						$hotel->min_rate = 0;
						$hotel->min_meal_plan = $hotel->board;
					}
				}
				
				
			}
		}

		// dd($hotels);
		if(!empty($request->hotelPrice))
		{   	
	    	foreach ($hotels as $key => $hotel) {
	    		if(isset($hotel->min_rate)){
	    			if((int)$hotel->min_rate > (int)$request->hotelPrice){
	    				unset($hotels[$key]);
	    			}
	    		}
	    	}
		}

		$filledarr = [];
		if(isset($request->discount) && !empty($request->discount))
		{   	

	    	foreach ($hotels as $key => $hotel) {
	    		$is_dicountedHotel = 0;
	    		// dd($key);
	    		if(isset($hotel->tag_manger) && count($hotel->tag_manger)){
	    			
	    			foreach ($hotel->tag_manger as $tagkey => $tagvalue) {

	    				if($tagvalue['tag_code_for'] == 'Discount'){
	    					$is_dicountedHotel++;
	    					// if(($tagvalue['start'] <= $currentDate) && ($tagvalue['end'] >= $currentDate)){
	    						
	    					// }else{
	    					// 	// array_push($filledarr, $hotel->hid);
	    					// 	unset($hotels[$key]);
	    					// }
	    				}else{

    						// unset($hotels[$key]);
    					}
	    			}
	    		}else{
	    			// dd($hotels[$key]);
					unset($hotels[$key]);
				}

				if($is_dicountedHotel ==0){
    				unset($hotels[$key]);
    			}
	    	}
	    	
		}

		if(isset($request->recom) && !empty($request->recom))
		{   	

	    	foreach ($hotels as $key => $hotel) {
	    			$is_recommendedHotel = 0;
	    		// dd($key);
	    		if(isset($hotel->tag_manger) && count($hotel->tag_manger)){
	    			foreach ($hotel->tag_manger as $tagkey => $tagvalue) {
	    				$currentDate = date('Y-m-d');

	    				// dd($hotel->tag_manger);
	    				if($tagvalue['tag_code_for'] == 'Recommendation'){
	    					$is_recommendedHotel++;
	    					// if(($tagvalue['start'] <= $currentDate) && ($tagvalue['end'] >= $currentDate)){
	    						
	    					// }else{
	    					// 	// array_push($filledarr, $hotel->hid);
	    					// 	unset($hotels[$key]);
	    					// }
	    				}else{

    						// unset($hotels[$key]);
    					}

	    			}


	    		}else{
	    			// dd($hotels[$key]);
					unset($hotels[$key]);
				}
				if($is_recommendedHotel ==0){
    				unset($hotels[$key]);
    			}
	    	}
	    	
		}




		$teaser_header=Teaser::where('id',1)->get();
		// $hotels->teaser_header = $teaser;
		// echo "<pre>";


		// print_r($hotels);
		// exit();
		// return $hotels;
		return response()->json(['hotels' => $hotels,'teaser_header'=> $teaser_header]);
		// print_r($hotels);
		// dd($hotels);
		// $previousUrl = app('url')->previous();
		// dd($previousUrl);
		// return redirect()->to($previousUrl)->with(compact('hotels'));
    }

}