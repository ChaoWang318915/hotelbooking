<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hotel;
use App\Room;
use App\Room_image;
use Redirect;
use File;
use Session;
use Illuminate\Support\Facades\DB;

class RoomController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function room_add(Request $request, $id)
    {
        return view('/backend/hotels/add-room')->with('id', $id);
    }

    public function room_save(Request $request)
    {

        // dd($request->all());
        $validatedData = $request->validate([
            'room_name' => 'required',
            'room_size' => 'required',

        ]);
        $desc = $request->input('description');
        $desc = str_replace("&nbsp;", "", $desc);
        $hotel_id = $request->input('hotelId');
        $room = new Room();
        $room->hotel_id = $request->input('hotelId');
        $room->room_name = $request->input('room_name');
        $room->description = $desc;
        $room->room_size = $request->input('room_size');
        $room->occupancy_adults1 = $request->input('occupancy_adults1');
        $room->occupancy_childs1 = $request->input('occupancy_childs1');
        $room->occupancy_adults2 = $request->input('occupancy_adults2');
        $room->occupancy_childs2 = $request->input('occupancy_childs2');
        $room->room_amenities = $request->input('room_amenities');

        $room->policy_child = $request->input('policy_child');
        $room->policy_teen = $request->input('policy_teen');
        $room->policy_baby = $request->input('policy_baby');
        $room->min_room_occupancy = $request->input('min_room_occupancy');
        $room->max_room_occupancy = $request->input('max_room_occupancy');

        $room->save();
        $room_id = $room->id;
        if ($files = $request->file('file')) {

            $files = $request->file('file');

            foreach ($files as $index => $file) {
                $name = $file->getClientOriginalName();
                $file->move(public_path() . '/images/room', $name);
                $postImage = new Room_image;
                $postImage->room_id = $room->id;
                $postImage->room_image = $name;
                $postImage->save();
            }

        }
        Session::flash("success", "Room added Succesfully!");
        return redirect()->route('room-edit', [$hotel_id, $room_id])->with('message', 'Room added Succesfully!');
        //return Redirect::back()->with('message','Added Successful !');

    }

    public function room_list($hotel_id)
    {

        $rooms = Room::where('hotel_id', $hotel_id)->get();


        return view('/backend/hotels/rooms-overview')->with('rooms', $rooms)->with('hotel_id', $hotel_id);
    }

    public function room_delete(Request $request, $id)
    {
        $room_delete = Room::find($id);
        $hotel_id = $room_delete->hotel_id;
        // dd($hotel_id);
        $room_delete->delete();
        $room_image_delete = Room_image::where('room_id', $id)->delete();
        return redirect(route('rooms-overview', $hotel_id))->with('message', 'room Deleted Succesfully!');
    }

    public function room_edit(Request $request, $id, $rid)
    {
        $room = Room::find($rid);
        $room_image = Room_image::where('room_id', $rid)->get();
        return view('/backend/hotels/edit-room')->with('room', $room)->with('room_image', $room_image)->with('hotel_id', $id);
    }

    public function room_update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'room_name' => 'required',
            'room_size' => 'required',
        ]);


        $desc = $request->input('description');
        $string = htmlentities($desc, null, 'utf-8');
        $desc = str_replace("&nbsp;", "", $string);
        $desc = html_entity_decode($desc);


        // $desc = str_replace("&nbsp;", "", $desc);
        // print_r($desc);
        // exit();
        $uroom = Room::find($id);
        $uroom->room_name = $request->room_name;
        $uroom->room_status = $request->room_status;
        $uroom->description = $desc;
        $uroom->room_size = $request->room_size;
        $uroom->occupancy_adults1 = $request->occupancy_adults1;
        $uroom->occupancy_childs1 = $request->occupancy_childs1;
        $uroom->occupancy_adults2 = $request->occupancy_adults2;
        $uroom->occupancy_childs2 = $request->occupancy_childs2;

        $uroom->policy_child = $request->policy_child;
        $uroom->policy_teen = $request->policy_teen;
        $uroom->policy_baby = $request->policy_baby;
        $uroom->min_room_occupancy = $request->min_room_occupancy;
        $uroom->max_room_occupancy = $request->max_room_occupancy;
        
        $uroom->room_amenities = $request->room_amenities;
        $uroom->save();

        if ($files = $request->file('file')) {

            $files = $request->file('file');

            foreach ($files as $index => $file) {
                $name = $file->getClientOriginalName();

                $file->move(public_path() . '/images/room', $name);


                $postImage = new Room_image;
                $postImage->room_id = $id;
                $postImage->room_image = $name;
                $postImage->save();
            }

        }
        // Session::flash("success","Room Updated Succesfully!");
        return Redirect::back()->with('message', 'Updated Successful !');
    }

    public function room_image_delete(Request $request, $id)
    {
        $room_image = Room_image::find($id);
        $image_name = $room_image->room_image;
        $image_path = public_path() . "/images/room/" . $image_name;

        if (File::exists($image_path)) {
            File::delete($image_path);

        }
        $room_image->delete();


        return Redirect::back()->with('message', 'Image Deleted Successful !');
    }

    public function room_status(Request $request)
    {
        $status = $request->status;
        $room_id = $request->room_id;
        $hs = Room::Where('id', $room_id)
            ->update(['room_status' => $status]);
        return response()->json(['success' => 'Status updated successfully']);
    }
}
