<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Island;
use App\Hotel;
use App\Hotel_image;
use App\Hotel_detail_image;
use Redirect;
use File;
use Session;
use Illuminate\Validation\Rule;

class HotelController extends Controller
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

    public function hotel_add(Request $request)
    {
        $islands = Island::LeftJoin('atolls', 'islands.atoll_id', '=', 'atolls.id')
            ->select('islands.id', 'islands.island_name', 'atolls.atoll_name')
            ->orderBy('islands.island_name', 'asc')
            ->get();
        return view('/backend/hotels/hotel-details')->with('islands', $islands);
    }

    public function hotel_save(Request $request)
    {
        $validatedData = $request->validate([
            'hotel_name' => 'required',
            'country' => 'required',
            'stars' => 'required',
            'hotelcategory1' => 'required',


            'number_rooms' => 'required',
            'invoice_currency' => 'required|not_in:0',
            'minimum_stay' => 'required|not_in:0',
            'board' => 'required||not_in:0',

            'url_key'=>'required|unique:hotels,url_key',
        ]);
        if ($request->has('bstatus')) {
            $bstatus = 1;
        } else {
            $bstatus = 0;
        }
        $request->hotelcategory1 = implode(',', $request->hotelcategory1);
        if ($request->divingbases) {

            $request->divingbases = implode(',', $request->divingbases);
        }
        $hotel = new Hotel();
        $hotel->hotel_name = $request->input('hotel_name');
        $hotel->online_bookable = $bstatus;
        $hotel->island = $request->input('island');
        $hotel->country = $request->input('country');
        $hotel->streetno = $request->input('streetno');
        $hotel->street = $request->input('street');
        $hotel->zip = $request->input('zip');
        $hotel->city = $request->input('city');
        $hotel->phone = $request->input('phone');
        $hotel->e_mail = $request->input('e_mail');
        // $hotel->e_mail=$request->input('inhabited_islands');
        $hotel->fax = $request->input('fax');
        $hotel->internet = $request->input('internet');
        $hotel->google_coordinates = $request->input('google_coordinates');
        $hotel->meta_title = $request->input('meta_title');
        $hotel->meta_description = $request->input('meta_description');
        $hotel->meta_keyword = $request->input('meta_keyword');
        $hotel->stars = $request->input('stars');
        $hotel->hotelcategory1 = $request->hotelcategory1;
        $hotel->divingbases = $request->divingbases;

        $hotel->number_rooms = $request->input('number_rooms');
        $hotel->invoice_currency = $request->input('invoice_currency');
        $hotel->credit_cards = $request->input('credit_cards');
        $hotel->minimum_stay = $request->input('minimum_stay');
        $hotel->minimum_text = $request->input('minimum_text');
        $hotel->board = $request->input('board');
        $hotel->accessible = $request->input('accessible');
        $hotel->wifi = $request->input('wifi');
        $hotel->child_policy_for_rates = $request->input('child_policy_for_rates');

        $hotel->cpfr_baby_min = $request->input('cpfr_baby_min');
        $hotel->cpfr_baby_max = $request->input('cpfr_baby_max');
        $hotel->cpfr_child_min = $request->input('cpfr_child_min');
        $hotel->cpfr_child_max = $request->input('cpfr_child_max');
        $hotel->cpfr_teen_min = $request->input('cpfr_teen_min');
        $hotel->cpfr_teen_max = $request->input('cpfr_teen_max');
        $hotel->cpfr_adult_min = $request->input('cpfr_adult_min');
        $hotel->cpfr_adult_max = $request->input('cpfr_adult_max');

        $hotel->url_key = $request->input('url_key');
        $hotel->save();
        // dd($request->file('file'));
        if ($files = $request->file('file')) {
            $files = $request->file('file');

            $otherPath = public_path() . '/images/hotel-galleries/' . $hotel->id .'/others';
            // create folder if dont exist
            if(!File::isDirectory($otherPath)){
                File::makeDirectory($otherPath, 0777, true, true);
            }            

            foreach ($files as $index => $file) {
                $name = $file->getClientOriginalName();
                $file->move($otherPath, $name);


                $postImage = new Hotel_image;
                $postImage->hotel_id = $hotel->id;
                $postImage->h_image = $name;
                // dd($postImage);
                $postImage->save();
            }

        }
        Session::flash("success", "Hotel Added Succesfully!");
        return redirect()->route('hotel-edit', $hotel->id)->with('message', 'Hotel Added Succesfully!');

    }

    public function hotel_list(Request $request)
    {
        $hotels = Hotel::LeftJoin('islands', 'hotels.island', '=', 'islands.id')
            ->LeftJoin('atolls', 'islands.atoll_id', '=', 'atolls.id')
            ->select('hotels.hotel_name', 'hotels.id', 'hotels.country', 'hotels.stars', 'islands.island_name', 'atolls.atoll_name', 'hotels.status')
            ->get();

        return view('/backend/hotels/hotel-administration')->with('hotels', $hotels);
    }


    public function hotel_search(Request $request)
    {
        $hotel = Hotel::findorfail($request->hotel_id);
        $params = $request->all();
        Session::put('search_params', $params);
        return redirect()->route('hotel-page', $hotel->url_key);
    }

    public function hotel_list_ajax(Request $request)
    {
        $hotels = Hotel::LeftJoin('islands', 'hotels.island', '=', 'islands.id')
            ->LeftJoin('atolls', 'islands.atoll_id', '=', 'atolls.id')
            ->select('hotels.hotel_name', 'hotels.id', 'hotels.country', 'hotels.stars', 'islands.island_name', 'atolls.atoll_name', 'hotels.status')
            ->get();

        return $hotels;
    }

    public function hotel_delete(Request $request, $id)
    {
        $hotel_delete = Hotel::find($id);
        $hotel_delete->delete();
        $hotel_image_delete = Hotel_image::where('hotel_id', $id)->delete();

        return redirect('/hotel-administration')->with('message', 'Hotel Deleted Succesfully!');
    }

    public function status_update(Request $request)
    {
        $status = $request->status;
        $hotel_id = $request->hotel_id;
        $hs = Hotel::Where('id', $hotel_id)
            ->update(['status' => $status]);
        return response()->json(['success' => 'Status updated successfully']);
    }

    public function hotel_edit(Request $request, $id)
    {
        $islands = Island::LeftJoin('atolls', 'islands.atoll_id', '=', 'atolls.id')
            ->select('islands.id', 'islands.island_name', 'atolls.atoll_name')
            ->orderBy('islands.island_name', 'asc')
            ->get();
        $hotel = Hotel::LeftJoin('islands', 'hotels.island', '=', 'islands.id')
            ->LeftJoin('atolls', 'islands.atoll_id', '=', 'atolls.id')
            ->where('hotels.id', $id)
            ->select('hotels.*', 'islands.island_name', 'atolls.atoll_name', 'hotels.status')
            ->first();
        $hotel_image = Hotel_image::where('hotel_id', $id)->get();
        $hotel_detail_image = Hotel_detail_image::where('hotel_id', $id)->get();


        return view('/backend/hotels/edit-hotel-details')->with('hotel', $hotel)->with('islands', $islands)->with('hotel_image', $hotel_image)->with('hotel_detail_image', $hotel_detail_image);
    }

    public function hotel_update(Request $request, $id)
    {

        $url_key = $request->url_key;
        $validatedData = $request->validate([
            'hotel_name' => 'required',
            'country' => 'required',
            'stars' => 'required',
            'hotelcategory1' => 'required',

            'number_rooms' => 'required',
            'invoice_currency' => 'required|not_in:0',
            'minimum_stay' => 'required|not_in:0',
            'board' => 'required||not_in:0',
            // 'url_key'=>' Rule::unique('users')->ignore($user->id),',
            'url_key'=>'unique:hotels,url_key,'. $request->$url_key,
            'url_key' => [
                Rule::unique('hotels')->ignore($id)
            ]
        ]);


        if ($request->has('bstatus')) {
            $bstatus = 1;
        } else {
            $bstatus = 0;
        }

        $request->hotelcategory1 = implode(',', $request->hotelcategory1);
        if ($request->divingbases) {

            $request->divingbases = implode(',', $request->divingbases);
        }
        $uhotel = Hotel::find($id);
        $uhotel->hotel_name = $request->hotel_name;
        $uhotel->status = $request->status;
        $uhotel->online_bookable = $bstatus;
        $uhotel->island = $request->island;
        $uhotel->country = $request->country;
        $uhotel->streetno = $request->streetno;
        $uhotel->street = $request->street;
        $uhotel->zip = $request->zip;
        $uhotel->city = $request->city;
        $uhotel->phone = $request->phone;
        $uhotel->e_mail = $request->e_mail;
        $uhotel->fax = $request->fax;
        $uhotel->internet = $request->internet;
        $uhotel->google_coordinates = $request->google_coordinates;
        $uhotel->meta_title = $request->meta_title;
        $uhotel->meta_description = $request->meta_description;
        $uhotel->meta_keyword = $request->meta_keyword;
        $uhotel->stars = $request->stars;
        $uhotel->hotelcategory1 = $request->hotelcategory1;
        $uhotel->divingbases = $request->divingbases;
        // $uhotel->hotelcategory2=$request->hotelcategory2;
        // $uhotel->hotelcategory3=$request->hotelcategory3;
        // $uhotel->hotelcategory3=$request->hotelcategory3;
        $uhotel->number_rooms = $request->number_rooms;
        $uhotel->invoice_currency = $request->invoice_currency;
        $uhotel->credit_cards = $request->credit_cards;
        $uhotel->minimum_stay = $request->minimum_stay;
        $uhotel->minimum_text = $request->minimum_text;
        $uhotel->board = $request->board;
        $uhotel->accessible = $request->accessible;
        $uhotel->wifi = $request->wifi;
        $uhotel->child_policy_for_rates = $request->child_policy_for_rates;

        $uhotel->cpfr_baby_min = $request->cpfr_baby_min;
        $uhotel->cpfr_baby_max = $request->cpfr_baby_max;
        $uhotel->cpfr_child_min = $request->cpfr_child_min;
        $uhotel->cpfr_child_max = $request->cpfr_child_max;
        $uhotel->cpfr_teen_min = $request->cpfr_teen_min;
        $uhotel->cpfr_teen_max = $request->cpfr_teen_max;
        $uhotel->cpfr_adult_min = $request->cpfr_adult_min;
        $uhotel->cpfr_adult_max = $request->cpfr_adult_max;

        $uhotel->url_key = $request->url_key;
        // dd($uhotel);
        $uhotel->save();

        if ($files = $request->file('file')) {
            $files = $request->file('file');
            
            $otherPath = public_path() . '/images/hotel-galleries/' . $id .'/others';
            // create folder if dont exist
            if(!File::isDirectory($otherPath)){
                File::makeDirectory($otherPath, 0777, true, true);
            }

            foreach ($files as $index => $file) {
                $name = $file->getClientOriginalName();

                $file->move($otherPath, $name);
                $postImage = new Hotel_image;
                $postImage->hotel_id = $id;
                $postImage->h_image = $name;
                $postImage->save();
            }

        }

        if ($files2 = $request->file('file2')) {
            $files2 = $request->file('file2');

            $hotelDetailPath = public_path() . '/images/hotel-galleries/' . $id .'/others/hoteldetail';
            // create folder if dont exist
            if(!File::isDirectory($hotelDetailPath)){
                File::makeDirectory($hotelDetailPath, 0777, true, true);
            }

            foreach ($files2 as $index => $file) {
                $name = $file->getClientOriginalName();
                $file->move($hotelDetailPath, $name);
                $postImage2 = new Hotel_detail_image;
                $postImage2->hotel_id = $id;
                $postImage2->h_image = $name;
                $postImage2->save();
            }

        }

        Session::flash("success", "Hotel Updated Succesfully!");
        return redirect('/hotel-edit/' . $id)->with('message', 'hotel Updated Succesfully!');
    }

    public function hotel_image_delete(Request $request, $id)
    {
        $hotel_image = Hotel_image::find($id);
        $image_name = $hotel_image->h_image;
        $image_path = public_path() . "/images/hotel/" . $image_name;

        if (File::exists($image_path)) {
            File::delete($image_path);

        }
        $hotel_image->delete();


        return Redirect::back()->with('message', 'Image Deleted Successful !');
    }

    public function hotel_detail_image_delete(Request $request, $id)
    {
        $hotel_image = Hotel_detail_image::find($id);
        $image_name = $hotel_image->h_image;
        $image_path = public_path() . "/images/hotel/" . $image_name;

        if (File::exists($image_path)) {
            File::delete($image_path);

        }
        $hotel_image->delete();


        return Redirect::back()->with('message', 'Image Deleted Successful !');
    }

}
