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


class EdittestimonialController extends Controller
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
      $testimonials = DB::select('select * from testimonials where id = ?',[$id]);
      return view('admin.edit-testimonial',['testimonials'=>$testimonials]);
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
	 
	  
	 
    protected function testimonialdata(Request $request)
    {
        /*return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);*/
		
		
		
		 $this->validate($request, [

        		'name' => 'required'

        		
				
				

        	]);
         
		 $data = $request->all();
			
         $id=$data['id'];
        			
		$input['name'] = Input::get('name');
       
		
		$rules = array(
		
		'name'=>'required|unique:testimonials,name,'.$id,
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
		  

			/*User::create([
            'name' => $data['name'],
            'email' => $data['email'],
			'admin' => '0',
            'password' => bcrypt($data['password']),
			'phone' => $data['phone']
			
        ]);*/
		$name=$data['name'];
		$star=$data['star'];

		
		$currentphoto=$data['currentphoto'];
		
		
		$image = Input::file('photo');
        if($image!="")
		{	
            $testimonialphoto="/testimonialphoto/";
			$delpath = base_path('images'.$testimonialphoto.$currentphoto);
			File::delete($delpath);	
			$filename  = time() . '.' . $image->getClientOriginalExtension();
            
            $path = base_path('images'.$testimonialphoto.$filename);
			$destinationPath=base_path('images'.$testimonialphoto);
      
                 Image::make($image->getRealPath())->resize(100, 100)->save($path);
				/*Input::file('photo')->move($destinationPath, $filename);*/
				$savefname=$filename;
		}
        else
		{
			$savefname=$currentphoto;
		}			
		
		
		$desc=$data['desc'];
		
		DB::update('update testimonials set name="'.$name.'",description="'.$desc.'",image="'.$savefname.'", star= "'.$star.'" where id = ?', [$id]);
		
            $url1= 'admin/testimonials';
            return redirect($url1)->with('success', 'Testimonial has been updated');


        }
		
		
		
		
    }



    public function activetestmonial($id){

        $blog = DB::select('select * from testimonials where id = ?',[$id]);
        $blog_active = $blog[0]->is_active;
        if($blog_active==0){
            $blog_text = 1;
            DB::update('update testimonials set is_active="'.$blog_text.'" where id = ?', [$id]);
            return back()->with('success', 'Testimonials has been active successfully!');

        }else if ($blog_active==1){
            $blog_text = 0;
            DB::update('update testimonials set is_active="'.$blog_text.'" where id = ?', [$id]);
            return back()->with('success', 'Testimonials has been active successfully!');

        }




    }

}
