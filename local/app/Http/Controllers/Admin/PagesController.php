<?php

namespace Responsive\Http\Controllers\Admin;



use File;
use Image;
use Responsive\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use Responsive\Http\Requests;
use Illuminate\Http\Request;
use Responsive\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return Response
     */
    public function index()
    {
        $pages = DB::table('pages')->get();

        return view('admin.pages', ['pages' => $pages]);
    }
	
	
	public function showform($id) {
      $pages = DB::select('select * from pages where page_id = ?',[$id]);
      return view('admin.edit-page',['pages'=>$pages]);
   }
   
   
   
   
   protected function pagedata(Request $request)
    {
		 $data = $request->all();
			
         $page_id=$data['page_id'];
        			
		 $page_title=$data['page_title'];

        $image = Input::file('photo');
        if($image!="")
        {
            $filename  = time() . '.' . $image->getClientOriginalExtension();
            $userphoto="/Aboutus/";
            $path = base_path('images'.$userphoto.$filename);
            $destinationPath=base_path('images'.$userphoto);
            Input::file('photo')->move($destinationPath, $filename);
            $namef=$filename;
        }
        else
        {
            $namef="";
        }


		$page_desc = DB::connection()->getPdo()->quote($data['page_desc']);
		
		
		DB::update('update pages set page_title="'.$page_title.'",page_desc="'.$page_desc.'" ,photo="'.$namef.'" where page_id = ?', [$page_id]);
		
        $url1= 'admin/pages';
        return redirect($url1)->with('success', 'Page has been updated');





    }
   
   
   
   
   
	
	public function destroy($id) {
		
		$image = DB::table('testimonials')->where('id', $id)->first();
		$orginalfile=$image->image;
		$testimonialphoto="/testimonialphoto/";
       $path = base_path('images'.$testimonialphoto.$orginalfile);
	  File::delete($path);
      DB::delete('delete from testimonials where id = ?',[$id]);
	   
      return back();
      
   }
	
}