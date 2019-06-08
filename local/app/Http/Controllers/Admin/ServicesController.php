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

class ServicesController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return Response
     */
    public function index()
    {
        $services = DB::table('services')
		             ->orderBy('id','desc')
					->get();

        return view('admin.services', ['services' => $services]);
    }
	
	
	public function destroy($id) {
		
		$image = DB::table('services')->where('id', $id)->get();
		$orginalfile=$image[0]->image;
		
		$simage = DB::table('subservices')->where('service', $id)->get();
		
		$simage_count = DB::table('subservices')->where('service', $id)->count();
		
		
		$userphoto="/servicephoto/";
       $path = base_path('images'.$userphoto.$orginalfile);
	   File::delete($path);
	   if(!empty($simage_count))
	   {
		   $subfile=$simage[0]->subimage;
	   $spath = base_path('images/subservicephoto/'.$subfile);
	  
	  File::delete($spath);
	  DB::delete('delete from subservices where service = ?',[$id]);
	   }
      DB::delete('delete from services where id = ?',[$id]);
	   
      return back();
      
   }

    public function activeservices($id){

        $services = DB::select('select * from services where id = ?',[$id]);
        $services_active = $services[0]->is_active;
        if($services_active==0){
            $shop_text = 1;
            DB::update('update services set is_active="'.$shop_text.'" where id = ?', [$id]);
            return back()->with('success', 'Shop has been active successfully!');

        }else if ($services_active==1){
            $shop_text = 0;
            DB::update('update services set is_active="'.$shop_text.'" where id = ?', [$id]);
            return back()->with('success', 'Shop has been active successfully!');

        }




    }

	
}