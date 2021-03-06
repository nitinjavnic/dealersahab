<?php

namespace Responsive\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
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

    public function sangvish_view()

    {

        $viewservices= DB::table('subservices')->orderBy('subname','asc')->get();

        $shopview=DB::table('shop')
            ->leftJoin('users', 'users.email', '=', 'shop.seller_email')
            ->leftJoin('rating', 'rating.rshop_id', '=', 'shop.id')
            ->where('shop.is_active', 'approved')->orderBy('shop.id','desc')
            ->groupBy('shop.id')
            ->get();

        $data = array('viewservices' => $viewservices,'shopview' => $shopview);

        return view('search')->with($data);
    }


    public function sangvish_homeindex($id)
    {

        $subview=strtolower($id);

        $results = preg_replace('/-+/', ' ', $subview);
        $allservice = DB::table('services')->select('name','id')->get();

        $allsubservice = DB::table('services')
            ->join('subservices', 'services.id', '=', 'subservices.service')
            ->get();

        $allsuper = DB::table('subservices')
            ->join('subsuperservice', 'subservices.subid', '=', 'subsuperservice.subservice')
            ->get();

        $services = DB::table('subservices')->where('subname', $results)->get();

        $brandname = DB::table('products')->select('comapanyname','shop_id')->get();
        $shopData = DB::table('shop')->select('state','city','pin_code')->get();

        $subsearches = DB::table('shop')
            ->leftJoin('seller_services', 'seller_services.shop_id', '=', 'shop.id')
            ->leftJoin('rating', 'rating.rshop_id', '=', 'shop.id')
            ->leftJoin('users', 'users.email', '=', 'shop.seller_email')
            ->leftJoin('products', 'products.shop_id', '=', 'shop.id')
            ->where('shop.is_active', '=', '1')
            ->groupBy('shop.id')
            ->paginate(3);


        $google_id = 10;
        $google = DB::table('pages')
            ->where('page_id', '=', $google_id)
            ->get();

        $viewservices= DB::table('subservices')->orderBy('subname','asc')->get();

        $shopview=DB::table('shop')
            ->leftJoin('rating', 'rating.rshop_id', '=', 'shop.id')
            ->orderBy('shop.id','desc')->get();

        $sub_value = $id;

        $data = array('google'=>$google,'subsearches' => $subsearches, 'shopData'=>$shopData,'brandname'=>$brandname, 'allsuper'=>$allsuper, 'viewservices' => $viewservices, 'shopview' => $shopview, 'sub_value' => $sub_value, 'services' => $services,'allsubservice'=>$allsubservice,'allservice'=>$allservice);

        return view('search')->with($data);

    }

    public function sangvish_index(Request $request)
    {
        $allsubservice = DB::table('subservices')->select('subname')->get();
        $allservice = DB::table('services')->select('name','id')->get();
        $allsuper = DB::table('subsuperservice')->select('subsupername','id')->get();
        $brandname = DB::table('products')->select('comapanyname','shop_id')->get();
        $shopData = DB::table('shop')->select('state','city','pin_code')->get();
        $datas = $request->all();
        $search_text=$datas['search_text'];
        $search_location=$datas['search_location'];


        if($search_text){
            $count= DB::table('subservices')->where('subname', $search_text)->count();

            if(!empty($count))
            {
                $services = DB::table('subservices')->where('subname', $search_text)->get();

                $subsearches = DB::table('shop')
                    ->leftJoin('seller_services', 'seller_services.shop_id', '=', 'shop.id')
                    ->leftJoin('rating', 'rating.rshop_id', '=', 'shop.id')
                    ->leftJoin('users', 'users.email', '=', 'shop.seller_email')
                    ->leftJoin('products', 'products.shop_id', '=', 'shop.id')
                    ->orderBy('shop.id','desc')
                    ->groupBy('shop.id')

                    ->get();


            }
            if(empty($count))
            {
                $services = "";
                $subsearches = "";
            }

            $viewservices= DB::table('subservices')->orderBy('subname','asc')->get();

            $shopview=DB::table('shop')
                ->leftJoin('rating', 'rating.rshop_id', '=', 'shop.id')
                ->where('shop.status', '=', 'approved')
                ->orderBy('shop.id','desc')->get();


            $sub_value="";

            $data = array('shopData'=>$shopData,'brandname'=>$brandname,'allsubservice'=>$allsubservice,'allservice'=>$allservice,'allsuper'=>$allsuper,'services' => $services,'viewservices' => $viewservices, 'shopview' => $shopview, 'subsearches' => $subsearches, 'count' => $count,
                'search_text' => $search_text, 'sub_value' => $sub_value);
            return view('search_filter')->with($data);

        }else if ($search_location){

            $location_count= DB::table('shop')->where('city', $search_location)->count();
            if(!empty($location_count))
            {
                $shop = DB::table('shop')->where('city', $search_location)->get();
                $location_services = DB::table('subservices')->where('subname', $shop[0]->sub_category)->get();

                $locationdata = DB::table('shop')
                    ->leftJoin('seller_services', 'seller_services.shop_id', '=', 'shop.id')
                    ->leftJoin('rating', 'rating.rshop_id', '=', 'shop.id')
                    ->leftJoin('users', 'users.email', '=', 'shop.seller_email')
                    ->leftJoin('products', 'products.shop_id', '=', 'shop.id')
                    ->where('shop.city', '=', $search_location)
                    ->orderBy('shop.id','desc')
                    ->groupBy('shop.id')
                    ->get();
            }

            if(empty($location_count))
            {
                $location_services = "";
                $locationdata = "";
            }

            $view_location= DB::table('subservices')->orderBy('subname','asc')->get();

            $shop_location=DB::table('shop')
                ->leftJoin('rating', 'rating.rshop_id', '=', 'shop.id')
                ->orderBy('shop.id','desc')->get();

            $data = array('shopData'=>$shopData,'brandname'=>$brandname,'allsubservice'=>$allsubservice,'allservice'=>$allservice,'allsuper'=>$allsuper,'services' => $location_services,'viewservices' => $view_location, 'shopview' => $shop_location, 'subsearches' => $locationdata, 'count' => $location_count,
                'search_text' => $search_location);
            return view('search_filter')->with($data);

        }


    }

    public function sangvish_search(Request $request)
    {

        $shopview=DB::table('shop')
            ->leftJoin('users', 'users.email', '=', 'shop.seller_email')
            ->leftJoin('rating', 'rating.rshop_id', '=', 'shop.id')
            ->where('shop.status', 'approved')->orderBy('shop.id','desc')->get();

        $viewservices= DB::table('subservices')->orderBy('subname','asc')->get();

        $datas = $request->all();





        $approved='approved';


        if(!empty($datas["langOpt"]))
        {

            $langOpt=$datas["langOpt"];
            $newlang="";
            $vvnew="";
            $views="";
            foreach($langOpt as $langs)
            {
                $viewname= DB::table('subservices')->where("subid", "=" , $langs)->get();
                $views .=$viewname[0]->subname.",";
                $newlang .=$langs.",";
                $vvnew .="'".$langs."',";
            }
            $viewnames =rtrim($views,",");
            $selservice =rtrim($newlang,",");
            $welservice =rtrim($vvnew,",");


            $newsearches = DB::table('shop')
                ->leftJoin('seller_services', 'seller_services.shop_id', '=', 'shop.id')
                ->leftJoin('rating', 'rating.rshop_id', '=', 'shop.id')
                ->leftJoin('users', 'users.email', '=', 'shop.seller_email')
                ->where('shop.status', '=', $approved)


                ->whereRaw('FIND_IN_SET(seller_services.subservice_id,"'.$selservice.'")')

                ->groupBy('seller_services.shop_id')

                ->get();





            $count = DB::table('shop')
                ->leftJoin('seller_services', 'seller_services.shop_id', '=', 'shop.id')
                ->leftJoin('rating', 'rating.rshop_id', '=', 'shop.id')
                ->leftJoin('users', 'users.email', '=', 'shop.seller_email')
                ->where('shop.status', '=', $approved)


                ->whereRaw('FIND_IN_SET(seller_services.subservice_id,"'.$selservice.'")')


                ->groupBy('seller_services.shop_id')

                ->count();




            $data = array('viewservices' => $viewservices, 'shopview' => $shopview, 'newsearches' => $newsearches, 'selservice' => $selservice, 'viewnames' => $viewnames,
                'count' => $count);
        }






        if(!empty($datas['city']))
        {
            $newsearches = DB::table('shop')
                ->leftJoin('seller_services', 'seller_services.shop_id', '=', 'shop.id')
                ->leftJoin('rating', 'rating.rshop_id', '=', 'shop.id')
                ->leftJoin('users', 'users.email', '=', 'shop.seller_email')
                ->where('shop.status', '=', $approved)
                ->where('shop.city','LIKE','%'.$datas['city'].'%')
                ->groupBy('seller_services.shop_id')

                ->get();


            $count = DB::table('shop')
                ->leftJoin('seller_services', 'seller_services.shop_id', '=', 'shop.id')
                ->leftJoin('rating', 'rating.rshop_id', '=', 'shop.id')
                ->leftJoin('users', 'users.email', '=', 'shop.seller_email')
                ->where('shop.status', '=', $approved)
                ->where('shop.city','LIKE','%'.$datas['city'].'%')
                ->groupBy('seller_services.shop_id')

                ->count();


            $viewnames =$datas['city'];

            $data = array('viewservices' => $viewservices, 'shopview' => $shopview, 'newsearches' => $newsearches, 'viewnames' => $viewnames, 'count' => $count);
        }









        if(!empty($datas['star_rate']))
        {

            $newsearches = DB::table('shop')
                ->leftJoin('seller_services', 'seller_services.shop_id', '=', 'shop.id')
                ->leftJoin('rating', 'rating.rshop_id', '=', 'shop.id')
                ->leftJoin('users', 'users.email', '=', 'shop.seller_email')
                ->where('shop.status', '=', $approved)
                ->where('shop.city','LIKE','%'.$datas['city'].'%')
                ->where('rating.rating','=', $datas['star_rate'])
                ->groupBy('seller_services.shop_id')

                ->get();


            $count = DB::table('shop')
                ->leftJoin('seller_services', 'seller_services.shop_id', '=', 'shop.id')
                ->leftJoin('rating', 'rating.rshop_id', '=', 'shop.id')
                ->leftJoin('users', 'users.email', '=', 'shop.seller_email')
                ->where('shop.status', '=', $approved)
                ->where('shop.city','LIKE','%'.$datas['city'].'%')
                ->where('rating.rating','=', $datas['star_rate'])
                ->groupBy('seller_services.shop_id')

                ->count();


            $viewnames =$datas['city'];

            $data = array('viewservices' => $viewservices, 'shopview' => $shopview, 'newsearches' => $newsearches, 'viewnames' => $viewnames, 'count' => $count);
        }



        if((!empty($datas['city'])) && (!empty($datas["langOpt"])) && (!empty($datas['star_rate'])))
        {

            $langOpt=$datas["langOpt"];
            $newlang="";
            $vvnew="";
            foreach($langOpt as $langs)
            {
                $newlang .=$langs.",";
                $vvnew .="'".$langs."',";
            }
            $selservice =rtrim($newlang,",");
            $welservice =rtrim($vvnew,",");


            $newsearches = DB::table('shop')
                ->leftJoin('seller_services', 'seller_services.shop_id', '=', 'shop.id')
                ->leftJoin('rating', 'rating.rshop_id', '=', 'shop.id')
                ->leftJoin('users', 'users.email', '=', 'shop.seller_email')
                ->where('shop.status', '=', $approved)
                ->where('shop.city','LIKE','%'.$datas['city'].'%')
                ->where('rating.rating','=', $datas['star_rate'])

                ->whereRaw('FIND_IN_SET(seller_services.subservice_id,"'.$selservice.'")')

                ->groupBy('seller_services.shop_id')

                ->get();


            $count = DB::table('shop')
                ->leftJoin('seller_services', 'seller_services.shop_id', '=', 'shop.id')
                ->leftJoin('rating', 'rating.rshop_id', '=', 'shop.id')
                ->leftJoin('users', 'users.email', '=', 'shop.seller_email')
                ->where('shop.status', '=', $approved)
                ->where('shop.city','LIKE','%'.$datas['city'].'%')

                ->whereRaw('FIND_IN_SET(seller_services.subservice_id,"'.$selservice.'")')

                ->groupBy('seller_services.shop_id')

                ->count();

            $viewnames =$datas['city'];


            $data = array('viewservices' => $viewservices, 'shopview' => $shopview, 'newsearches' => $newsearches, 'selservice' => $selservice, 'viewnames' => $viewnames,
                'count' => $count);
        }


        if((empty($datas['city'])) && (empty($datas["langOpt"])) && (empty($datas['star_rate'])))
        {

            $viewnames="";
            $data = array('viewservices' => $viewservices, 'shopview' => $shopview,  'viewnames' => $viewnames);
        }
        return view('shopsearch')->with($data);
    }









}