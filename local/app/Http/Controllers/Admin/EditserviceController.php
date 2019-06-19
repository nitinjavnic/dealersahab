<?php

namespace Responsive\Http\Controllers\Admin;


use Responsive\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use Responsive\Http\Requests;
use Illuminate\Http\Request;
use Responsive\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use File;
use Image;


class EditserviceController extends Controller
{
    
   

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }
    
	
	public function showform($id) {
      $services = DB::select('select * from services where id = ?',[$id]);
      return view('admin.editservice',['services'=>$services]);
   }
	
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255'
            
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
	 
	  
	 
    protected function editservicedata(Request $request)
    {

		 $this->validate($request, [

        		'name' => 'required'


        	]);
         
		 $data = $request->all();
			
         $id=$data['id'];
        			
		$input['name'] = Input::get('name');

		
		$rules = array(
		
		'name'=>'required|unique:services,name,'.$id,
		
		'photo' => 'max:1024|mimes:jpg,jpeg,png'
		);
		
		
		$messages = array(

        );

		$validator = Validator::make(Input::all(), $rules, $messages);
		
		
		if ($validator->fails())
		{
			$failedRules = $validator->failed();
			return back()->withErrors($validator);
		}
		else
		{ 

		$name=$data['name'];
		$keywords=$data['keywords'];
		$description=$data['description'];
		$title=$data['title'];

		
		$currentphoto=$data['currentphoto'];
		$image = Input::file('photo');
        if($image!="")
		{	
            $servicephoto="/servicephoto/";
			$delpath = base_path('images'.$servicephoto.$currentphoto);
			File::delete($delpath);	
			$filename  = time() . '.' . $image->getClientOriginalExtension();
            
            $path = base_path('images'.$servicephoto.$filename);
			$destinationPath=base_path('images'.$servicephoto);
      
                /* Image::make($image->getRealPath())->resize(200, 200)->save($path);*/
				Input::file('photo')->move($destinationPath, $filename);
				$savefname=$filename;
		}
        else
		{
			$savefname=$currentphoto;
		}			
		
		
		
		/* DB::insert('insert into users (name, email,password,phone,admin) values (?, ?,?, ?,?)', [$name,$email,$password,$phone,$admin]);*/
		DB::update('update services set name="'.$name.'",image="'.$savefname.'",keywords="'.$keywords.'" ,description="'.$description.'" ,title="'.$title.'" where id = ?', [$id]);
		
            $url1= 'admin/services';
            return redirect($url1)->with('success', 'Category has been updated');

        }
		
		
		
		
    }
}
