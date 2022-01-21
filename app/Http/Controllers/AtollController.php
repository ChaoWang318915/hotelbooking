<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Atoll;
use App\Atoll_image;
use Redirect;
use File;

class AtollController extends Controller
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

public function atoll_add(Request $request)
{
     $validatedData = $request->validate([
        'atoll_name' => 'required',
        'atoll_name_dhivehi' =>'required',
        
        'google_coordinates'=> 'required',
        
    ]);


          
          $atoll = new Atoll();
          $atoll->atoll_name = $request->input('atoll_name');
          $atoll->atoll_name_dhivehi = $request->input('atoll_name_dhivehi');
          $atoll->length_width = $request->input('length_width');
          $atoll->number_islands_atoll=$request->input('number_islands_atoll');
          $atoll->distance_to_male=$request->input('distance_to_male');
          $atoll->resident=$request->input('resident');
          $atoll->number_resorts_in_atoll=$request->input('number_resorts_in_atoll');
          $atoll->google_coordinates=$request->input('google_coordinates');
          $atoll->inhabited_islands=$request->input('inhabited_islands');
          $atoll->description=$request->input('description');
          $atoll->save();
      /*    if($files = $request->file('file'))
            {
              
             $files=$request->file('file');
                           
              foreach($files as $index => $file)
                  {
                     $name=$file->getClientOriginalName();
                     $file->move(public_path().'/images/atoll', $name);
                    
                     
                     $postImage = new Atoll_image;
                     $postImage->atoll_id = $atoll->id;
                     $postImage->image_name = $name;
                     $postImage->save();
                  }

          }*/
          return redirect('/atolls');
          

     
}
public function atoll_list(Request $request)
{
	$atolls = Atoll::select('id','atoll_name','atoll_status')->get();
	return view('/backend/atolls/atolls')->with('atolls',$atolls);
}
public function atoll_delete(Request $request,$id)
{
	$atoll_delete = Atoll::find($id);
	$atoll_delete->delete();
  $Atoll_image_delete=Atoll_image::where('atoll_id',$id)->delete();
	return redirect('/atolls')->with('message', 'Atoll Deleted Succesfully!');
}
public function atoll_status(Request $request)
{
  $atoll_id=$request->atoll_id;
  $atoll_status=$request->status;
  $at=Atoll::where('id',$atoll_id)
           ->update(['atoll_status'=>$atoll_status]);
  return response()->json(['success'=>'Status updated successfully']);
}
public function atoll_edit(Request $request,$id)
{
   $eatoll=Atoll::find($id);
   $atoll_image=Atoll_image::where('atoll_id',$id)->get();
  
   return view('/backend/atolls/edit-atoll')->with('eatoll',$eatoll)->with('atoll_image',$atoll_image);
}
public function atoll_update(Request $request,$id)
{
	  $validatedData = $request->validate([
        'atoll_name' => 'required',
        'atoll_name_dhivehi' =>'required',
        
        'google_coordinates'=> 'required',
        
    ]);

	  $uatoll=Atoll::find($id);
	  $uatoll->atoll_name=$request->atoll_name;
	  $uatoll->atoll_status=$request->atoll_status;
	  $uatoll->atoll_name_dhivehi=$request->atoll_name_dhivehi;
	  $uatoll->length_width=$request->length_width;
	  $uatoll->number_islands_atoll=$request->number_islands_atoll;
	  $uatoll->distance_to_male=$request->distance_to_male;
	  $uatoll->resident=$request->resident;
	  $uatoll->number_resorts_in_atoll=$request->number_resorts_in_atoll;
	  $uatoll->google_coordinates=$request->google_coordinates;
	  $uatoll->inhabited_islands=$request->inhabited_islands;
	  $uatoll->description=$request->description;
	  $uatoll->save();
        if($files = $request->file('file'))
            {
              
             $files=$request->file('file');
                           
              foreach($files as $index => $file)
                  {
                     $name=$file->getClientOriginalName();
                     $file->move(public_path().'/images/atoll', $name);
                    
                     
                     $postImage = new Atoll_image;
                     $postImage->atoll_id =$id;
                     $postImage->image_name =$name;
                     $postImage->save();
                  }

          }
      return redirect('/atolls')->with('message', 'Atoll Updated Succesfully!');

}
public function atoll_image_delete(Request $request,$id)
{
  $atoll_image = Atoll_image::find($id);
  $image_name=$atoll_image->image_name;
  $image_path = public_path()."/images/atoll/".$image_name;
 
  if(File::exists($image_path)) {
    File::delete($image_path);
   
}
  $atoll_image->delete();
  

  return Redirect::back()->with('message','Image Deleted Successful !');
}
    
}
