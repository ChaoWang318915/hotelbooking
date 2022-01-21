<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Atoll;
use App\Island;
use App\Island_image;
use Redirect;
use Session;

use File;

class IslandController extends Controller
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

public function island_add(Request $request)
{
  $atolls = Atoll::select('id','atoll_name')->get();
  return view('/backend/islands/add-islands')->with('atolls',$atolls);  
}
public function island_save(Request $request)
{
	$validatedData = $request->validate([
        'island_name' => 'required',
        'atoll_id'=> 'required',
        'length_width'=>'required',
        'size'=>'required',
        'distance_to_male'=>'required',
        'island_usage'=>'required',
        // 'google_coordinates'=>'required',
        
        'description'=>'required',
        
    ]);
        $island = new Island();
        $island->island_name = $request->input('island_name');
        $island->atoll_id = $request->input('atoll_id');
        $island->length_width = $request->input('length_width');
        $island->size = $request->input('size');
        $island->distance_to_male = $request->input('distance_to_male');
        $island->island_usage=$request->input('island_usage');
        $island->population = $request->input('population');
        $island->google_coordinates = $request->input('google_coordinates');
        $island->neighbouring_islands = $request->input('neighbouring_islands');
        $island->description = $request->input('description');
        $island->save();

           if($files = $request->file('file'))
            {
              
             $files=$request->file('file');
                           
              foreach($files as $index => $file)
                  {
                     $name=$file->getClientOriginalName();

                     $file->move(public_path().'/images/island', $name);
                    
                     
                     $postImage = new Island_image;
                     $postImage->island_id = $island->id;
                     $postImage->image_name = $name;
                     $postImage->save();
                  }

          }
             Session::flash("success","Island created Succesfully!");
        return redirect('/islands')->with('message','Island Added Suceesfull');
}
 public function island_list(Request $request)
 {
 	$islands=Island::LeftJoin('atolls','islands.atoll_id','=','atolls.id')
             ->select('islands.id','islands.island_name','islands.atoll_id','atolls.atoll_name','islands.island_status')
             ->orderBy('atolls.atoll_name', 'asc')
             ->get();
             return view('/backend/islands/islands')->with('islands',$islands);
 }
 public function island_delete(Request $request,$id)
 {
    $island_delete=Island::find($id);
    $island_delete->delete();
    return redirect('/islands')->with('message', 'Island Deleted Succesfully!');
      
 }
 public function island_status(Request $request)
 {
   $island_status=$request->status;
   $island_id=$request->island_id;
   $is=Island::where('id',$island_id)
              ->update(['island_status'=>$island_status]);
   return response()->json(['success'=>'Status updated successfully']);

 }
 public function island_edit(Request $request,$id)
 {
    $atolls = Atoll::select('id','atoll_name')->get();
    $islands=Island::LeftJoin('atolls','islands.atoll_id','=','atolls.id')
                  ->where('islands.id',$id)
                  ->select('islands.*','atolls.atoll_name')
                  ->first();
   $island_image=Island_image::where('island_id',$id)->get();


             return view('/backend/islands/edit-islands')->with('islands',$islands)->with('atolls',$atolls)->with('island_image',$island_image);
 }
 public function island_update(Request $request,$id)
 {
    $validatedData = $request->validate([
        'island_name' => 'required',
        'atoll_id'=> 'required',
        'length_width'=>'required',
        'size'=>'required',
        'distance_to_male'=>'required',
        'island_usage'=>'required',
        'google_coordinates'=>'required',
        
        'description'=>'required',
        
    ]);
    $uislands=Island::find($id);
    $uislands->island_name=$request->island_name;
    $uislands->island_name=$request->island_name;
    $uislands->island_status=$request->island_status;
    $uislands->atoll_id=$request->atoll_id;
    $uislands->length_width=$request->length_width;
    $uislands->size=$request->size;
    $uislands->distance_to_male=$request->distance_to_male;
    $uislands->island_usage=$request->island_usage;
    $uislands->population=$request->population;
    $uislands->google_coordinates=$request->google_coordinates;
    $uislands->neighbouring_islands=$request->neighbouring_islands;
    $uislands->description=$request->description;
    $uislands->save();
      if($files = $request->file('file'))
            {
              
             $files=$request->file('file');
                           
              foreach($files as $index => $file)
                  {
                     $name=$file->getClientOriginalName();
                     $file->move(public_path().'/images/island', $name);
                    
                     
                     $postImage = new Island_image;
                     $postImage->island_id =$id;
                     $postImage->image_name =$name;
                     $postImage->save();
                  }

          }
            Session::flash("success","Island Updated Succesfully!");
    return redirect('/islands')->with('message', 'Island Updated Succesfully!');
 }


 public function island_image_delete(Request $request,$id)
{
  $island_image = Island_image::find($id);
  $image_name=$island_image->image_name;
  $image_path = public_path()."/images/island/".$image_name;
 
  if(File::exists($image_path)) {
    File::delete($image_path);
   
}
  $island_image->delete();
  

  return Redirect::back()->with('message','Image Deleted Successful !');
}
    
}