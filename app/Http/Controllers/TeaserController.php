<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teaser;
use App\Sitemanager;
use Redirect;

class TeaserController extends Controller
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
public function teaser_page(Request $request)
{
  $teaser=Teaser::first();
  return view('/backend/teaserpage_header/tp-header-texts')->with('teaser',$teaser);
}



 public function teaser_update(Request $request,$id)
 {
   $uteaser=Teaser::find($id);
   $uteaser->packages=$request->packages;
   $uteaser->diver=$request->diver;
   $uteaser->family=$request->family;
   $uteaser->luxury=$request->luxury;
   $uteaser->honeymoon=$request->honeymoon;
   $uteaser->recreation=$request->recreation;
   $uteaser->friends_of_maldives=$request->friends_of_maldives;
   $uteaser->best_ager=$request->best_ager;
   $uteaser->adults_only=$request->adults_only;
   $uteaser->save();
   return Redirect('tp-header-texts')->with('message', 'Teaser page Updated');

 }
 public function sitemanager_page(Request $request)
 {
    $sitemanager=Sitemanager::first();
    return view('/backend/sitemanager/sitemanager')->with('sitemanager',$sitemanager);   
 }
 public function sitemanager_update(Request $request,$id)
 {
   $validatedData = $request->validate([
        'name' => 'required',
        'domain'=> 'required',
        
    ]);
    $sitemanager=Sitemanager::find($id);
    $sitemanager->name=$request->name;
    $sitemanager->language=$request->language;
    $sitemanager->domain=$request->domain;
    $sitemanager->template=$request->template;
    $sitemanager->meta_title=$request->meta_title;
    $sitemanager->meta_keywords=$request->meta_keywords;
    $sitemanager->meta_description=$request->meta_description;
    $sitemanager->save();
    return Redirect('sitemanager')->with('message', 'sitemanager page Updated');
 }    
}