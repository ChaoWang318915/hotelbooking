<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use App\Restaurant;
use App\Restaurant_image;
use App\Bar;
use App\Bar_image;
use App\Menuplan;
use App\Hotelinclude;
use DB;

class HotelincludeController extends Controller
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

    public function include_add(Request $request,$id)
	{
	   return view('/backend/hotels/add-include')->with('id',$id);
	}

    public function include_create(Request $request,$id)
    {

      $this->validate($request,[
            'include_name' => 'required',
            'description' => 'required',
            
        ]);
       $include=new Hotelinclude();
       $include->hotel_id=$id;
       $include->include_name=$request->include_name;
       $include->description=$request->description;
       if($files = $request->file('file'))
            {
              
             $files=$request->file('file');
                           
              foreach($files as $index => $file)
                  {
                     $name=$file->getClientOriginalName();

                     $file->move(public_path().'/images/include', $name); 
                     // $includeimage = new include_image;
                     // $includeimage->include_id = $include->id;
                     $include->include_icon =$name;
                     // $includeimage->save();
                  }

          }
       $include->save();
                    session()->flash("success","Bar has been created successfully");

          return redirect()->route('include-overview', ['id' => $id])->with('message', 'Bar has been created successfully');

    }

    public function include_edit(Request $request,$hotelId,$bid){
      $include=Hotelinclude::find($bid);
      // $include_image=Bar_image::where('bar_id',$bid)->get();
      // dd($restaurant_image);
// dd($include_image);
       return view('/backend/hotels/edit-include')->with('include',$include);     
    }

    public function include_update(Request $request,$id){


      // dd($request->file('file'));
      $this->validate($request,[
            'include_name' => 'required',
            'description' => 'required',
           
        ]);
     $rc= Hotelinclude::find($id);
     $hotelid = $rc->hotel_id;
      $rc->include_name=$request->include_name;
      $rc->description=$request->description;
     
    
         if($files = $request->file('file'))
            {
              
             $files=$request->file('file');
                           
              foreach($files as $index => $file)
                  {
                     $name=$file->getClientOriginalName();

                     $file->move(public_path().'/images/include', $name); 
                     // $restimage = new include_image;
                     // $restimage->include_id = $rc->id;
                     $rc->include_icon =$name;
                     // $restimage->save();
                  }

          }
      		$rc->save();
          session()->flash("success","Updated successfully");
          return Redirect::back()->with('message','Updated successfully !');
    }

    public function include_list(Request $request,$id)
    {
      $includes=Hotelinclude::where('hotel_id',$id)->orderBy('position')->get();
      return view('/backend/hotels/include-list')->with('includes',$includes);
    }

    public function include_status(Request $request)
    {
       $include_status=$request->status;
       $include_id=$request->include_id;
       // dd($include_id);
       $rst=Hotelinclude::where('id',$include_id)->update(['status'=>$include_status]);
       return response()->json(['success'=>'Status updated successfully']);
    }

    public function include_delete(Request $request,$id,$tid)
    {
      $include_delete=Hotelinclude::find($tid);
      $include_delete->delete();
      // $include_imgae=Bar_image::where('bar_id',$tid)->delete();
      session()->flash("delete","Deleted successfully");
      return redirect()->route('include-overview', ['id' => $id])->with('message', 'Deleted successfull');
    }

    public function sort(Request $request){
        
        $includes = Hotelinclude::all();

        foreach ($includes as $include) {

            foreach ($request->order as $order) {

                if ($order['id'] == $include->id) {

                    \DB::table('hotel_includes')->where('id',$include->id)->update(['position' => $order['position']]);
                    
                }
            }
        }
        
        return response()->json('Update Successfully.', 200);
    }
}