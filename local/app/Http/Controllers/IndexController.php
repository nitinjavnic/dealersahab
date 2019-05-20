<?php

namespace Responsive\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Responsive\Url;

class IndexController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function sangvish_index()
    {

        $services = DB::table('services')->limit(7)->get();


        $one = DB::table('services')->orderBy('name', 'asc')->limit(1)->offset(0)->get();
        $one_count = DB::table('subservices')
            ->where('service', '=', $one[0]->id)
            ->count();
        $first = DB::select('select * from subservices where service = ?',[$one[0]->id]);






        $two = DB::table('services')->orderBy('name', 'asc')->limit(1)->offset(1)->get();
        $two_count = DB::table('subservices')
            ->where('service', '=', $two[0]->id)
            ->count();
        $second = DB::select('select * from subservices where service = ?',[$two[0]->id]);




        $three = DB::table('services')->orderBy('name', 'asc')->limit(1)->offset(2)->get();
        $three_count = DB::table('subservices')
            ->where('service', '=', $three[0]->id)
            ->count();
        $third = DB::select('select * from subservices where service = ?',[$three[0]->id]);




        $four = DB::table('services')->orderBy('name', 'asc')->limit(1)->offset(3)->get();
        $four_count = DB::table('subservices')
            ->where('service', '=', $four[0]->id)
            ->count();
        $fourth = DB::select('select * from subservices where service = ?',[$four[0]->id]);

        $testimonials = DB::table('testimonials')->orderBy('id', 'desc')->get();

        $blog = DB::table('blog')->orderBy('id', 'desc') ->limit(3)->get();



        $data = array('services' => $services, 'one' => $one, 'first'=>$first, 'two' => $two,'second' =>$second, 'three'=> $three,'third'=>$third, 'four' => $four,
            'fourth' => $fourth, 'testimonials' => $testimonials, 'blog' => $blog, 'one_count' => $one_count, 'two_count' => $two_count, 'three_count' => $three_count, 'four_count' => $four_count);
        return view('index')->with($data);
    }






    public function sangvish_autoComplete(Request $request) {
        $query = $request->get('term','');

        $viewsubservice=DB::table('subservices')->where('subname','LIKE','%'.$query.'%')->orderBy('subname', 'asc')->get();

        $data=array();
        foreach ($viewsubservice as $viewsub) {
            $data[]=array('value'=>$viewsub->subname,'id'=>$viewsub->subid);
        }
        if(count($data))
            return $data;
        else
            return ['value'=>'No Result Found','id'=>''];
    }






}
