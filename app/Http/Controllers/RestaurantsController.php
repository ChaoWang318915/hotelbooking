<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use App\Restaurant;
use App\Restaurant_image;
use App\Bar;
use App\Bar_image;
use App\Menuplan;

class RestaurantsController extends Controller
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

    public function restaurant_create(Request $request,$id)
    {

      $this->validate($request,[
            // 'restaurant_name' => 'required',
            // 'description' => 'required',
            // 'cuisine' => 'required',
            // 'menu' => 'required',
            // 'menuplan_incl' => 'required',
            // 'opening_hours' => 'required',
            // 'open_for' => 'required',
            // 'drescode' => 'required'
        ]);
      $rc=new Restaurant();
      $rc->restaurant_name=$request->restaurant_name;
      $rc->description=$request->description;
      $rc->cuisine=$request->cuisine;
      $rc->menu=$request->menu;
      $rc->menuplan_incl=$request->menuplan_incl;
      $rc->opening_hours=$request->opening_hours;
      $rc->open_for=$request->open_for;
      $rc->drescode=$request->drescode;
      $rc->hotel_id = $id;
      $rc->save();
         if($files = $request->file('file'))
            {
              
             $files=$request->file('file');
                           
              foreach($files as $index => $file)
                  {
                     $name=$file->getClientOriginalName();

                     $file->move(public_path().'/images/restaurant', $name); 
                     $restimage = new Restaurant_image;
                     $restimage->restaurant_id = $rc->id;
                     $restimage->image_name =$name;
                     $restimage->save();
                  }

          }
          session()->flash("success","Restaurant has been created successfully");
          return redirect()->route('restaurants-bars-overview', ['id' => $id])->with('message', 'Restaurant has been created successfully');

    }
    public function bar_create(Request $request,$id)
    {

      $this->validate($request,[
            // 'bar_name' => 'required',
            // 'description' => 'required',
            
        ]);
       $bar=new Bar();
       $bar->hotel_id=$id;
       $bar->bar_name=$request->bar_name;
       $bar->description=$request->description;
       $bar->save();
       if($files = $request->file('file'))
            {
              
             $files=$request->file('file');
                           
              foreach($files as $index => $file)
                  {
                     $name=$file->getClientOriginalName();

                     $file->move(public_path().'/images/restaurant', $name); 
                     $barimage = new Bar_image;
                     $barimage->bar_id = $bar->id;
                     $barimage->bar_image =$name;
                     $barimage->save();
                  }

          }
                    session()->flash("success","Bar has been created successfully");

          return redirect()->route('bar-overview', ['id' => $id])->with('message', 'Bar has been created successfully');

    }
    public function menuplan_create(Request $request,$id)
    {

      $this->validate($request,[
            // 'baby' => 'required',
            // 'child' => 'required',
            // 'adult' => 'required',
            // 'baby_age' => 'required',
            // 'child_age' => 'required',
            // 'adult_age' => 'required',
            // // 'kind' => 'required',
            
            // 'menuplan_name1' => 'required',
            // 'description1' => 'required',
            // 'terms1' => 'required',
            // 'menuplan_name2' => 'required',
            // 'description2' => 'required',
            // 'terms2' => 'required',
            // 'menuplan_name3' => 'required',
            // 'description3' => 'required',
            // 'terms3' => 'required',
        ]);
       $menu=new Menuplan();
       $menu->hotel_id=$id;
       $menu->baby=$request->baby;
       $menu->child=$request->child;
       $menu->adult=$request->adult;
       $menu->baby_age=$request->baby_age;
       $menu->child_age=$request->child_age;
       $menu->adult_age=$request->adult_age;
       // $menu->kind=$request->kind;
       $menu->erwachsener=$request->erwachsener;
       $menu->menuplan_name1=$request->menuplan_name1;
       $menu->description1=$request->description1;
       $menu->terms1=$request->terms1;
       $menu->menuplan_name2=$request->menuplan_name2;
       $menu->description2=$request->description2;
       $menu->terms2=$request->terms2;
       $menu->menuplan_name3=$request->menuplan_name3;
       $menu->description3=$request->description3;
       $menu->terms3=$request->terms3;
       $menu->save();
                           session()->flash("success","Menu Plan has been created successfully");

       return redirect()->route('menuplan-overview', ['id' => $id])->with('message', 'Menu Plan has been created successfully');
    }



      public function restaurant_edit(Request $request,$hotelId,$rid){
      $restaurant=Restaurant::find($rid);
      $restaurant_image=Restaurant_image::where('restaurant_id',$rid)->get();
      // dd($restaurant_image);

       return view('/backend/hotels/edit-restaurants')->with('restaurant',$restaurant)->with('restaurant_image',$restaurant_image);     
    }

    public function bar_edit(Request $request,$hotelId,$bid){
      $bar=Bar::find($bid);
      $bar_image=Bar_image::where('bar_id',$bid)->get();
      // dd($restaurant_image);
// dd($bar_image);
       return view('/backend/hotels/edit-bars')->with('bar',$bar)->with('bar_image',$bar_image);     
    }

    public function menuplan_edit(Request $request,$hotelId,$mid){
      $menu=Menuplan::find($mid);
      
      // dd($restaurant_image);
// dd($bar_image);
       return view('/backend/hotels/edit-menuplan')->with('menu',$menu);     
    }


    public function restaurant_update(Request $request,$id){

      $this->validate($request,[
            // 'restaurant_name' => 'required',
            // 'description' => 'required',
            // 'cuisine' => 'required',
            // 'menu' => 'required',
            // 'menuplan_incl' => 'required',
            // 'opening_hours' => 'required',
            // 'open_for' => 'required',
            // 'drescode' => 'required'
        ]);
     $rc= Restaurant::find($id);
     $hotelid = $rc->hotel_id;
      $rc->restaurant_name=$request->restaurant_name;
      $rc->description=$request->description;
      $rc->cuisine=$request->cuisine;
      $rc->menu=$request->menu;
      $rc->menuplan_incl=$request->menuplan_incl;
      $rc->opening_hours=$request->opening_hours;
      $rc->open_for=$request->open_for;
      $rc->drescode=$request->drescode;
    
      $rc->save();
         if($files = $request->file('file'))
            {
              
             $files=$request->file('file');
                           
              foreach($files as $index => $file)
                  {
                     $name=$file->getClientOriginalName();

                     $file->move(public_path().'/images/restaurant', $name); 
                     $restimage = new Restaurant_image;
                     $restimage->restaurant_id = $rc->id;
                     $restimage->image_name =$name;
                     $restimage->save();
                  }

          }
          session()->flash("success","Restaurant has been updated successfully");
          return Redirect::back()->with('message','Restaurant has been updated successfully !');
    }

    public function menuplan_update(Request $request,$id)
    {
      // dd($request);
      $this->validate($request,[
            // 'baby' => 'required',
            // 'child' => 'required',
            // 'adult' => 'required',
            // // 'kind' => 'required',
            // 'baby_age' => 'required',
            // 'child_age' => 'required',
            // 'adult_age' => 'required',
            
            // 'menuplan_name1' => 'required',
            // 'description1' => 'required',
            // 'terms1' => 'required',
            // 'menuplan_name2' => 'required',
            // 'description2' => 'required',
            // 'terms2' => 'required',
            // 'menuplan_name3' => 'required',
            // 'description3' => 'required',
            // 'terms3' => 'required',
        ]);
       $menu= Menuplan::find($id);

       $menu->baby=$request->baby;
       $menu->child=$request->child;
       $menu->adult=$request->adult;
       // $menu->kind=$request->kind;
       $menu->baby_age=$request->baby_age;
       $menu->child_age=$request->child_age;
       $menu->adult_age=$request->adult_age;
       
       $menu->menuplan_name1=$request->menuplan_name1;
       $menu->description1=$request->description1;
       $menu->terms1=$request->terms1;
       $menu->menuplan_name2=$request->menuplan_name2;
       $menu->description2=$request->description2;
       $menu->terms2=$request->terms2;
       $menu->menuplan_name3=$request->menuplan_name3;
       $menu->description3=$request->description3;
       $menu->terms3=$request->terms3;
       $menu->save();
                           session()->flash("success","Menuplan has been updated successfully");
          return Redirect::back()->with('message','Menuplan has been updated successfully !');
    }

    public function bar_update(Request $request,$id){


      // dd($request);
      $this->validate($request,[
            // 'bar_name' => 'required',
            // 'description' => 'required',
           
        ]);
     $rc= Bar::find($id);
     $hotelid = $rc->hotel_id;
      $rc->bar_name=$request->bar_name;
      $rc->description=$request->description;
     
    
      $rc->save();
         if($files = $request->file('file'))
            {
              
             $files=$request->file('file');
                           
              foreach($files as $index => $file)
                  {
                     $name=$file->getClientOriginalName();

                     $file->move(public_path().'/images/bar', $name); 
                     $restimage = new Bar_image;
                     $restimage->bar_id = $rc->id;
                     $restimage->bar_image =$name;
                     $restimage->save();
                  }

          }
          session()->flash("success","bar has been updated successfully");
          return Redirect::back()->with('message','bar has been updated successfully !');
    }
    //this method created by Shrikant Tendolkar.
    public function restaurant_list(Request $request,$id)
    {
      $rest_array = [];
      $final_array = [];

      $restaurants= Restaurant::where('hotel_id',$id)->get();
      
      foreach($restaurants as $restaurant)
      {
        $restaurant->category = 'Restaurnts';
        $rest_array[] = $restaurant;
      }     
  
      $bars  = Bar::where('hotel_id',$id)->get();
      
      foreach($bars as $bar)
      {
        $bar->category = 'Bar';
        $rest_array[] = $bar;
      }    
   
      $menuplans = Menuplan::where('hotel_id',$id)->get();

      foreach($menuplans as $menuplan)
      {
        $menuplan->category = 'Menuplan';
        $rest_array[] = $menuplan;
      }

      if (!empty($rest_array)) {
        $final_array = collect($rest_array)->sortBy('created_at');
      }     
         
      return view('/backend/hotels/restaurants-bars-overview')->with('restBar',$final_array);
    }
    public function restaurant_delete(Request $request,$id,$tid)
    {
      $rest_delete=Restaurant::find($tid);
      $rest_delete->delete();
      $rest_imgae=Restaurant_image::where('restaurant_id',$tid)->delete();
      session()->flash("delete","Restaurant has been deleted successfully");
      return redirect()->route('restaurants-bars-overview', ['id' => $id])->with('message', 'restaurant deleted successfull');
    }
    public function restaurant_status(Request $request)
    {
       $rest_status=$request->rest_status;
       $rest_id=$request->rest_id;
       $rst=Restaurant::where('id',$rest_id)->update(['rest_status'=>$rest_status]);
       return response()->json(['success'=>'Status updated successfully']);
    }





    public function menuplan_status(Request $request)
    {
       $rest_status=$request->rest_status;
       $rest_id=$request->rest_id;
       $rst=Menuplan::where('id',$rest_id)->update(['rest_status'=>$rest_status]);
       return response()->json(['success'=>'Status updated successfully']);
    }


      public function bar_list(Request $request,$id)
    {
      $bars=Bar::where('hotel_id',$id)->get();
      return view('/backend/hotels/bar-list')->with('bars',$bars);
    }
       public function menuplan_list(Request $request,$id)
    {
      $menus=Menuplan::where('hotel_id',$id)->get();
      return view('/backend/hotels/menuplan-list')->with('menus',$menus);
    }
    public function bar_delete(Request $request,$id,$tid)
    {
      $bar_delete=Bar::find($tid);
      $bar_delete->delete();
      $bar_imgae=Bar_image::where('bar_id',$tid)->delete();
      session()->flash("delete","Bar has been deleted successfully");
      return redirect()->route('restaurants-bars-overview', ['id' => $id])->with('message', 'bar deleted successfull');
    }
      public function bar_status(Request $request)
    {
       $bar_status=$request->rest_status;
       $bar_id=$request->rest_id;
       // dd($bar_id);
       $rst=Bar::where('id',$bar_id)->update(['rest_status'=>$bar_status]);
       return response()->json(['success'=>'Status updated successfully']);
    }

    public function menuplan_delete(Request $request,$id,$tid)
    {
      $menu_delete=Menuplan::find($tid);
      $menu_delete->delete();
      session()->flash("delete","Menuplan has been deleted successfully");
      return redirect()->route('restaurants-bars-overview', ['id' => $id])->with('message', 'Menuplan deleted successfull');
    }
  }
