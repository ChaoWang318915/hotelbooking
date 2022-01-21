<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use App\Teaser_text;
use App\Hotel_text;
use App\Hotel_feature;
use App\Info_page;
use App\Text_content;

class TextController extends Controller
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
   public function teaser_text(Request $request,$id)
   {
      $teaser_text=Teaser_text::where('hotel_id',$id)->first();
      return view('/backend/hotels/texts')->with('teaser_text',$teaser_text);
   }
   public function text_update(Request $request,$id)
   {
    if($id)
    {
      $teaser_text=Teaser_text::where('hotel_id',$id)->first();
      if($teaser_text)
      {
        $teaser_text->hotel_id=$id;
        $teaser_text->standard_teaser_text=$request->standard_teaser_text;
        $teaser_text->diver=$request->diver;
        $teaser_text->family=$request->family;
        $teaser_text->luxury=$request->luxury;
        $teaser_text->honeymoon=$request->honeymoon;
        $teaser_text->recreation=$request->recreation;
        $teaser_text->friends_of_maldives=$request->friends_of_maldives;
        $teaser_text->best_ager=$request->best_ager;
        $teaser_text->adults_only=$request->adults_only;
        $teaser_text->save();
        return Redirect::back()->with('message','Teaser updated Successful !');
      }
      else{
        $text = new Teaser_text();
        $text->hotel_id=$id;
        $text->standard_teaser_text=$request->standard_teaser_text;
        $text->diver=$request->diver;
        $text->family=$request->family;
        $text->luxury=$request->luxury;
        $text->honeymoon=$request->honeymoon;
        $text->recreation=$request->recreation;
        $text->friends_of_maldives=$request->friends_of_maldives;
        $text->best_ager=$request->best_ager;
        $text->adults_only=$request->adults_only;
        $text->save();
        return Redirect::back()->with('message','Teaser Text created Successful !');
      }
    }
   }
   public function hotel_text(Request $request,$id)
   {
      $hotel_text=Hotel_text::where('hotel_id',$id)->first();
      return view('/backend/hotels/hotel-texts')->with('hotel_text',$hotel_text);
   }
   public function hotel_text_update(Request $request,$id)
   {
      if($id)
      {
        $hotel_text=Hotel_text::where('hotel_id',$id)->first();
        if($hotel_text)
        {
           $hotel_text->hotel_id=$id;
           $hotel_text->hotel_detail_page=$request->hotel_detail_page;
           $hotel_text->contentbox2=$request->contentbox2;
           $hotel_text->contentbox3=$request->contentbox3;
           $hotel_text->contentbox4=$request->contentbox4;
           $hotel_text->contentbox5=$request->contentbox5;
           $hotel_text->contentbox6=$request->contentbox6;
           $hotel_text->contentbox7=$request->contentbox7;
           $hotel_text->contentbox8=$request->contentbox8;
           $hotel_text->save();
           return Redirect::back()->with('message','Hotel Text updated Successful !');

        }
        else{
              $htext=new Hotel_text();
              $htext->hotel_id=$id;
              $htext->hotel_detail_page=$request->hotel_detail_page;
              $htext->contentbox2=$request->contentbox2;
              $htext->contentbox3=$request->contentbox3;
              $htext->contentbox4=$request->contentbox4;
              $htext->contentbox5=$request->contentbox5;
              $htext->contentbox6=$request->contentbox6;
              $htext->contentbox7=$request->contentbox7;
              $htext->contentbox8=$request->contentbox8;
              $htext->save();
              return Redirect::back()->with('message','Hotel Text creadted Successful !');
           
        }
      }
   }
   public function hotel_features(Request $request,$id)
   {
        $hotel_feature=Hotel_feature::where('hotel_id',$id)->first();
        return view('/backend/hotels/hotel-features')->with('hotel_feature',$hotel_feature);
   }
    public function hotel_features_update(Request $request,$id)
    {
      if($id)
      {
        $hotel_feature=Hotel_feature::where('hotel_id',$id)->first();
        if($hotel_feature)
        {
              $hotel_feature->hotel_id=$id;
              $hotel_feature->text_hotel=$request->text_hotel;
              $hotel_feature->hotel_features=$request->hotel_features;
              $hotel_feature->sport_recreation=$request->sport_recreation;
              $hotel_feature->entertainment=$request->entertainment;
              $hotel_feature->guestservice=$request->guestservice;
              $hotel_feature->spa_wellnaess=$request->spa_wellnaess;
              $hotel_feature->catering=$request->catering;
              $hotel_feature->save();
              return Redirect::back()->with('message','Hotel Features updated Successful !');
        }
        else{
              $hf=new hotel_feature();
              $hf->hotel_id=$id;
              $hf->text_hotel=$request->text_hotel;
              $hf->hotel_features=$request->hotel_features;
              $hf->sport_recreation=$request->sport_recreation;
              $hf->entertainment=$request->entertainment;
              $hf->guestservice=$request->guestservice;
              $hf->spa_wellnaess=$request->spa_wellnaess;
              $hf->catering=$request->catering;
              $hf->save();
              return Redirect::back()->with('message','Hotel Features created Successful !');
        }
      }
    }
    public function info_pages(Request $request,$id)
    {
      $info=Info_page::where('hotel_id',$id)->first();
      return view('/backend/hotels/info-pages')->with('info',$info);
    }
    public function info_pages_update(Request $request,$id)
    {
      if($id)
      {
        $info_pages=Info_page::where('hotel_id',$id)->first();
        if($info_pages)
        {
              $info_pages->hotel_id=$id;
              $info_pages->contentbox1=$request->contentbox1;
              $info_pages->contentbox2=$request->contentbox2;
              $info_pages->contentbox3=$request->contentbox3;
              $info_pages->contentbox4=$request->contentbox4;
              $info_pages->contentbox5=$request->contentbox5;
              $info_pages->contentbox6=$request->contentbox6;
              $info_pages->contentbox7=$request->contentbox7;
              $info_pages->contentbox8=$request->contentbox8;
              $info_pages->save();
               return Redirect::back()->with('message','Info pages updated Successful !');     
        }
        else{
              $ipages=new Info_page();
              $ipages->hotel_id=$id;
              $ipages->contentbox1=$request->contentbox1;
              $ipages->contentbox2=$request->contentbox2;
              $ipages->contentbox3=$request->contentbox3;
              $ipages->contentbox4=$request->contentbox4;
              $ipages->contentbox5=$request->contentbox5;
              $ipages->contentbox6=$request->contentbox6;
              $ipages->contentbox7=$request->contentbox7;
              $ipages->contentbox8=$request->contentbox8;
              $ipages->save();
              return Redirect::back()->with('message','Info pages created Successful !');
        }
      }
    }
    public function text_content(Request $request,$id)
    {
      $content=Text_content::where('hotel_id',$id)->first();
      return view('/backend/hotels/content')->with('content',$content);
    }
    public function content_update(Request $request,$id)
    {
      if($id)
      {
        $content=Text_content::where('hotel_id',$id)->first();
        if($content)
        {
              $content->hotel_id=$id;
              $content->contentbox1=$request->contentbox1;
              $content->contentbox2=$request->contentbox2;
              $content->contentbox3=$request->contentbox3;
              $content->contentbox4=$request->contentbox4;
              $content->contentbox5=$request->contentbox5;
              $content->contentbox6=$request->contentbox6;
              $content->contentbox7=$request->contentbox7;
              $content->contentbox8=$request->contentbox8;
              $content->save();
              return Redirect::back()->with('message','Info pages updated Successful !');   

        }
        else{
              $content_update=new Text_content();
              $content_update->hotel_id=$id;
              $content_update->contentbox1=$request->contentbox1;
              $content_update->contentbox2=$request->contentbox2;
              $content_update->contentbox3=$request->contentbox3;
              $content_update->contentbox4=$request->contentbox4;
              $content_update->contentbox5=$request->contentbox5;
              $content_update->contentbox6=$request->contentbox6;
              $content_update->contentbox7=$request->contentbox7;
              $content_update->contentbox8=$request->contentbox8;
              $content_update->save();
              return Redirect::back()->with('message','Info pages created Successful !');
        } 

      }
      
    }
}