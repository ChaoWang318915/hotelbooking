<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use App\Tag_manager;

class TagController extends Controller
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
public function tag_manager(Request $requesr,$id)
{
  
    $tags=Tag_manager::where('hotel_id',$id)->get();
 
  return view('/backend/hotels/tag-manager')->with('tags',$tags);
}
public function tag_add(Request $request,$id)
{
  $validatedData = $request->validate([
        'tag_name' => 'required',
        'tag_code_for'=> 'required',
        'page_on_frontend'=>'required',
        'start'=>'required',
        'end'=>'required',
        ]);
    $tag=new Tag_manager();
    $tag->hotel_id=$id;
    $tag->tag_name=$request->tag_name;
    $tag->tag_code_for=$request->tag_code_for;
    $tag->page_on_frontend=$request->page_on_frontend;
    $tag->start=$request->start;
    $tag->end=$request->end;
    $tag->save();
    return redirect()->route('tag-manager', ['id' => $id])->with('message', 'Tag Added Succesfully!');
}
public function tag_delete(Request $request,$id,$tid)
{
    $tag_delete=Tag_manager::find($tid);
    $tag_delete->delete();
    return redirect()->route('tag-manager', ['id' => $id])->with('message', 'Tag Deleted Succesfully!');
}

Public function tag_edit(Request $request,$id,$tid)
{
    $tags=Tag_manager::find($tid);
    return view('/backend/hotels/tag-edit')->with('tags',$tags);
}
public function tag_update(Request $request,$id,$tid)
{
    $validatedData = $request->validate([
        'tag_name' => 'required',
        'tag_code_for'=> 'required',
        'page_on_frontend'=>'required',
        'start'=>'required',
        'end'=>'required',
        ]);
    $tags=Tag_manager::find($tid);
    $tags->hotel_id=$id;
    $tags->tag_name=$request->tag_name;
    $tags->tag_status=$request->tag_status;
    $tags->tag_code_for=$request->tag_code_for;
    $tags->page_on_frontend=$request->page_on_frontend;
    $tags->start=$request->start;
    $tags->end=$request->end;
    $tags->save(); 
    return redirect()->route('tag-manager', ['id' => $id])->with('message', 'Tag Updated Succesfully!');     
}
public function tag_status(Request $request)
{
    $tag_status=$request->tag_status;
    $tag_id=$request->tag_id;
    $tagst=Tag_manager::where('id',$tag_id)->update(['tag_status'=>$tag_status]);
    return response()->json(['success'=>'Status updated successfully']);
}
 
}