<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

use Redirect;
use App\Hotel;
use App\HotelSessionPrice;
use App\Hotel_image;
use App\Hotel_detail_image;
use App\Transfer;
use App\Teaser_text;
use App\Hotel_feature;
use App\Room;
use App\Room_image;
use Session;
use Carbon;
use App\Atoll;
use App\Booking_text_regular_price;
use File;

class HotelpageController extends Controller
{

    public function gallery_image($id){
        $path = public_path('images/hotel-galleries/'.$id);
        if(File::exists($path)) {
            $files = File::files($path);
            $images = [];

            foreach ($files as $file) {
                $images[] = $file->getRelativePathname();
            }
        }else{
            $images=[];
        }
        

        // dd($images);
        return $images;
    }

    public function hotelpage(Request $request, $url_key)
    {
        $params = Session::get('search_params');
        Session::forget('search_params');
        // dd($params);
        $room_id = isset($params['room_id']) ? $params['room_id'] : 0;
        // dd($params);
        $to = date('Y-m-d', strtotime($params['end_date']));

        $from = date('Y-m-d', strtotime($params['start_date']));

        $date1 = date_create($to);
        $date2 = date_create($from);
        $diff = date_diff($date1, $date2);

        // dd($diff);

        $search_data['date1'] = $params['start_date'];
        $search_data['date2'] = $params['end_date'];
        $search_data['erwachsene'] = isset($params['erwachsene']) ? $params['erwachsene'] : 0;
        $search_data['kinder'] = isset($params['kinder']) ? $params['kinder'] : 0;
        $search_data['alter_kind_1'] = isset($params['alter_kind_1']) ? $params['alter_kind_1'] : 0;
        $search_data['alter_kind_2'] = isset($params['alter_kind_2']) ? $params['alter_kind_2'] : 0;
        $search_data['alter_kind_3'] = isset($params['alter_kind_3']) ? $params['alter_kind_3'] : 0;
        $search_data['alter_kind_4'] = isset($params['alter_kind_4']) ? $params['alter_kind_4'] : 0;
        $search_data['zimmer'] = isset($params['zimmer']) ? $params['zimmer'] : 0;
        // dd($search_data);
        $search_data['hotel_id'] = $params['hotel_id'];
        $search_data['days'] = $diff->days;
        // dd($search_data['days']);
        $id = Hotel::where('url_key', $url_key)->where('status', 1)->first();
        $hoteldetails = Hotel::findorfail($id);
        // dd($id->id);
        $id = $id->id;
        $hotels = Hotel::LeftJoin('hotel_images', 'hotels.id', '=', 'hotel_images.hotel_id')
                        ->LeftJoin('hotel_features', 'hotels.id', '=', 'hotel_features.hotel_id')
                        ->LeftJoin('teaser_texts', 'hotels.id', '=', 'teaser_texts.hotel_id')
                        ->LeftJoin('hotel_texts', 'hotels.id', '=', 'hotel_texts.hotel_id')
                        ->LeftJoin('islands', 'hotels.island', '=', 'islands.id')
                        ->where('hotels.id', '=', $id)
                        ->select('hotels.*', 'hotels.id as ids', 'hotels.google_coordinates as hotel_google_coordinates', 'hotel_images.*', 'teaser_texts.*', 'hotel_features.*', 'hotel_texts.*', 'islands.*', 'islands.google_coordinates as island_google_coordinates')
                        ->first();
        // dd($hotels);

        //DB::enableQueryLog();        
        $erwachsene = $search_data['erwachsene'];
        $kinder = $search_data['kinder'];
        if ($search_data['date1'] && $search_data['date2']) {
            $rooms = $this->findRoom($id, $room_id, $erwachsene, $kinder, 0);
        } else {
            $rooms = Room::select('rooms.*')
            ->where('hotel_id', '=', $id)
            ->where('room_status', '=', 1)
            ->get();
        }
        
        //dd(DB::getQueryLog());

        $booking_text_regular_prices = Booking_text_regular_price::where('hotel_id', '=', $id)->get();
        $free_baby = 0;

        if ($rooms) {
           
            if (count($booking_text_regular_prices)) {
                $booking_text_regular_prices = $booking_text_regular_prices[0];
                // dd($hotels->atoll);

            } else {
                $booking_text_regular_prices = '';
            }
            $Hotel_detail_image = Hotel_detail_image::where('hotel_id', $id)->orderBy('created_at', 'desc')->first();
            // dd($Hotel_detail_image);

            $atoll = DB::table("islands")->select('atoll_id')->where('id', $hotels->island)->where('island_status', '=', 1)->get();
            $island = DB::table("islands")->select('island_name')->where('id', $hotels->island)->where('island_status', '=', 1)->get();
            //dd($atoll[0]->atoll_id);
            if (count($island)) {
                $hotels->island_name = $island[0];
                // dd($hotels->atoll);

            } else {
                $hotels->island_name = '';
            }

            if (count($atoll)) {
                $hotels->atoll = Atoll::where('id', $atoll[0]->atoll_id)->get();
                // dd($hotels->atoll);
                if (count($hotels->atoll)) {
                    $hotels->atoll = $hotels->atoll[0];
                }
            } else {
                $hotels->atoll = '';
            }
            
            $total_persons = $search_data['erwachsene'] + $search_data['kinder'];
            $price_type = "none";
            if ($search_data['erwachsene'] == 1) {
                $price_type = "PriceSingle";
            } elseif ($search_data['erwachsene'] == 2) {
                $price_type = "PriceDoppel";
            } elseif ($search_data['erwachsene'] == 3) {
                $price_type = "PriceTripple";
            }
            elseif($search_data['erwachsene'] > 3){
                $price_type = "PriceRoom";
            }

            $gallery_images = $this->gallery_image($id);
            // dd($search_data);
            Session::forget('search_params');
            return view('/frontend/hotel-page')
                    ->with('hotels', $hotels)
                    ->with('price_type', $price_type)
                    ->with('rooms', $rooms)
                    ->with('search_data', $search_data)
                    ->with('hoteldetails', $hoteldetails)
                    ->with('Hotel_detail_image', $Hotel_detail_image)
                    ->with('total_persons', $total_persons)
                    ->with('booking_text_regular_prices', $booking_text_regular_prices)
                    ->with('HotelID', $id)
                    ->with('roomId', $room_id)
                    ->with('gallery_images', $gallery_images);
        }
    }

    public function hotel_search(Request $request)
    {
        $hotel = Hotel::where('id',$request->hotel_id)->where('status',1)->get();
        $params = $request->all();
        // dd($params);
        $hotel = $hotel[0];
        Session::put('search_params', $params);
        return redirect()->route('hotel-page', $hotel->url_key);
    }

    public function user_currency(Request $request)
    {
        $user_selected_currency = $request->user_selected_currency;
        Session::put('user_selected_currency', $user_selected_currency);
        return Redirect::back()->with('message', 'Currency Changed !');
    }

    public function hotel_list_ajax(Request $request)
    {
        $hotels = Hotel::LeftJoin('islands', 'hotels.island', '=', 'islands.id')
            ->LeftJoin('atolls', 'islands.atoll_id', '=', 'atolls.id')
            ->select('hotels.hotel_name', 'hotels.id', 'hotels.country', 'hotels.stars', 'islands.island_name', 'atolls.atoll_name', 'hotels.status')
            ->get();

        return $hotels;
    }

    public function get_minstay(Request $request)
    {
        $room_id = $request->input('room_id');
        $hotel_id = $request->input('hotel_id');
        $date_from = $request->input('date_from');
        $date_to = $request->input('date_to');

        if ($date_from && $date_to) {
            $date_from = $this->parseDate($date_from);
            $date_to = $this->parseDate($date_to);

            //DB::enableQueryLog();
            $session_id = DB::table("hotel_sessions")
                ->select('id')
                ->where('HotelId', '=', $hotel_id)
                ->where('Start', '<=', $date_from)
                ->where('End', '>=', $date_to)
                ->first();
            $minStay = DB::table("hotel_session_prices")
                ->select('minStay')
                ->where('SessionId', '=', $session_id->id)
                ->where('HotelId', '=', $hotel_id)
                ->where('RoomId', '=', $room_id)
                ->first();
            //dd(DB::getQueryLog());
            return $minStay->minStay;
        }

        $hotel = Hotel::select('minimum_stay')->where('id', '=', $hotel_id)->first();
        return $hotel->minimum_stay;
    }

    private function parseDate($date)
    {
        $date = explode(".", $date);
        return $date[2] . "-" . $date[1] . "-" . $date[0];
    }

    public function get_room_occupancy(Request $request)
    {
        $room = Room::find($request->input('room_id'));
        $childrenCount = $request->input('children_count');
        $adultsCount = $request->input('adults_count');
        $adultOne = $room->occupancy_adults1;
        $adultTwo = $room->occupancy_adults2;
        $childOne = $room->occupancy_childs1;
        $childTwo = $room->occupancy_childs2;
        $out = [];

        if ($adultsCount > $adultOne || $childrenCount > $childOne) {
            if ($adultsCount > $adultTwo || $childrenCount > $childTwo) {
                $out['success'] = 2;
            }
        } else {
            $out['success'] = 1;
        }

        $out['adult'] = $adultOne > $adultTwo ? $adultOne : $adultTwo;
        $out['child'] = $childOne > $childTwo ? $childOne : $childTwo;
        return json_encode($out);
    }


    public function get_room_by_hotel(Request $request)
    {
        $id = $request->hotelID;
        $rooms = Room::select('rooms.*')->where('hotel_id', '=', $id)->where('room_status', '=', 1)->get();

        return $rooms;
    }

    public function get_hotel_rooms(Request $request)
    {
        $id = $request->input('hotel_id');
        $rooms = Room::select('id', 'room_name as text')->where('hotel_id', '=', $id)->where('room_status', '=', 1)->get()->toArray();
        return json_encode($rooms);
    }

    private function findRoom($id, $room_id, $erwachsene, $kinder)
    {
        if ($erwachsene === 0) {
            return false;
        }
        $query = Room::select('rooms.*')
            ->where('hotel_id', '=', $id)
            ->where('room_status', '=', 1);
            if ($room_id) {
                $query->where('id', $room_id);    
            }
            $query->where(function ($query) use ($erwachsene, $kinder) {
                $query->where(function ($query) use ($erwachsene, $kinder) {
                    $query->where("occupancy_adults1", ">=", $erwachsene);
                    $query->where("occupancy_childs1", ">=", $kinder);
                })->orWhere(function ($query) use ($erwachsene, $kinder) {
                    $query->where("occupancy_adults2", ">=", $erwachsene);
                    $query->where("occupancy_childs2", ">=", $kinder);
                });
            });
        $rooms = $query->get();
        if ($rooms->count() == 0) {
            if ($kinder > 0) {
                $kinder--;
            } else {
                $erwachsene--;
            }
            return $this->findRoom($id, $room_id, $erwachsene, $kinder);
        } else {
            return $rooms;
        }
    }
}
