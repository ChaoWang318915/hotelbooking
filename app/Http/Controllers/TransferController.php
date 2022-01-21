<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use Session;
use App\Transfer;

class TransferController extends Controller
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

    public function edit_transfer(Request $request,$id)
    {
      $trans_data=Transfer::where('hotel_id',$id)->first();

      return view('/backend/hotels/transfers')->with('transfer',$trans_data);
    }
    public function transfer_update(Request $request,$id)
    {

      // dd($request->all());
      if(isset($request->waterplane_aval))
      {
          $request->waterplane_aval = '1';
      }
      else
      {
          $request->waterplane_aval = '0';
      }

      if(isset($request->domestic_aval))
      {
          $request->domestic_aval = '1';
      }
      else
      {
          $request->domestic_aval = '0';
      }

      if(isset($request->speedboat_aval))
      {
          $request->speedboat_aval = '1';
      }
      else
      {
          $request->speedboat_aval = '0';
      }

      if(isset($request->ferry_aval))
      {
          $request->ferry_aval = '1';
      }
      else
      {
          $request->ferry_aval = '0';
      }

      if(isset($request->vip_lounge))
      {
          $request->vip_lounge = '1';
      }
      else
      {
          $request->vip_lounge = '0';
      }

      if(isset($request->waterplane_recom))
      {
          $request->waterplane_recom = '1';
      }
      else
      {
          $request->waterplane_recom = '0';
      }

      if(isset($request->domestic_recom))
      {
          $request->domestic_recom = '1';
      }
      else
      {
          $request->domestic_recom = '0';
      }

      if(isset($request->speedboat_recom))
      {
          $request->speedboat_recom = '1';
      }
      else
      {
          $request->speedboat_recom = '0';
      }

      if(isset($request->ferry_recom))
      {
          $request->ferry_recom = '1';
      }
      else
      {
          $request->ferry_recom = '0';
      }


      if($id)
      {
        $tdata=Transfer::where('hotel_id',$id)->first();
        if($tdata)
        {
          $tdata->hotel_id=$id;
          $tdata->vip_lounge=$request->vip_lounge;
          $tdata->waterplane_distance=$request->waterplane_distance;
          $tdata->waterplane_duration=$request->waterplane_duration;
          $tdata->waterplane_recom=$request->waterplane_recom;
          $tdata->domestic_distance=$request->domestic_distance;
          $tdata->domestic_duration=$request->domestic_duration;
          $tdata->domestic_recom=$request->domestic_recom;
          $tdata->speedboat_distance=$request->speedboat_distance;
          $tdata->speedboat_duration=$request->speedboat_duration;
          $tdata->speedboat_recom=$request->speedboat_recom;
          $tdata->ferry_distance=$request->ferry_distance;
          $tdata->ferry_duration=$request->ferry_duration;
          $tdata->ferry_recom=$request->ferry_recom;
          $tdata->waterplane_aval=$request->waterplane_aval;
          $tdata->domestic_aval=$request->domestic_aval;
          $tdata->speedboat_aval=$request->speedboat_aval;
          $tdata->ferry_aval=$request->ferry_aval;
          $tdata->description=$request->description;
          $tdata->save();

          Session::flash("success","Transfer updated Successful");
          return Redirect::back()->with('message','Transfer updated Successful !');
        }
        else{

          $trans = new Transfer();
          $trans->hotel_id=$id;
          $trans->vip_lounge=$request->vip_lounge;
          $trans->waterplane_distance=$request->waterplane_distance;
          $trans->waterplane_duration=$request->waterplane_duration;
          $trans->waterplane_recom=$request->waterplane_recom;
          $trans->domestic_distance=$request->domestic_distance;
          $trans->domestic_duration=$request->domestic_duration;
          $trans->domestic_recom=$request->domestic_recom;
          $trans->speedboat_distance=$request->speedboat_distance;
          $trans->speedboat_duration=$request->speedboat_duration;
          $trans->speedboat_recom=$request->speedboat_recom;
          $trans->ferry_distance=$request->ferry_distance;
          $trans->ferry_duration=$request->ferry_duration;
          $trans->ferry_recom=$request->ferry_recom;
          $trans->waterplane_aval=$request->waterplane_aval;
          $trans->domestic_aval=$request->domestic_aval;
          $trans->speedboat_aval=$request->speedboat_aval;
          $trans->ferry_aval=$request->ferry_aval;
          $trans->description=$request->description;
          $trans->save();
        Session::flash("success","Transfer created successfully");
          return Redirect::back()->with('message','Transfer created Successful !');
        }
      }

    }

}