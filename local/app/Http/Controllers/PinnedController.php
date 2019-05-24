<?php

namespace Responsive\Http\Controllers;



use File;
use Image;
use Responsive\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Auth;

use Responsive\Http\Requests;
use Illuminate\Http\Request;
use Responsive\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

class PinnedController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function sangvish_index()
    {

        $pinned = DB::table('pinned')->get();
        $data = array('services' => $pinned);
        return view('pinned')->with($data);

    }


    public function sangvish_destroy($did) {


        DB::delete('delete from pinned where id = ?',[$did]);

        return redirect('pinnedseller');

    }







}