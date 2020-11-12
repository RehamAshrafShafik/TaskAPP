<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\ServicesDataTable;
use \Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
// Models
use App\Models\Service;

class APIServiceController extends Controller
{
    //Method get
    public function index()
    {
        $services=Service::all();

        return response()->json(['data'=>$services,'status'=>'true']);
    }

    /*
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //Method Post
    public function store(Request $request)
    {
        // validate
        $validator = Validator::make($request->all(), [

            'title' => ['required'],
            'user_id' => ['required'],
            'category_id' => ['required'],
            'subcategory_id' => ['required'],
            'price' => ['required'],
            'negotiationl' => ['required'],
            'description' => ['required'],
            'place' => ['required'],
            'negotiationl' => ['required'],
            'description' => ['required'],
            'place' => ['required'],
            'phone' => ['required'],
            'email' => ['required'],
            'status' => ['required'],

        ]);

        // validator fails
        if ($validator->fails())
        {

            return response()->json(['status'=>"false"]);

        }

        // create
        Service::create([

            'title' => $request->title,
            'user_id' => $request->user_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'price' => $request->price,
            'negotiationl' => $request->negotiationl,
            'description' => $request->description,
            'place' => $request->place,
            'phone' => $request->phone,
            'email' => $request->email,
            'status' => $request->status,

        ]);

        return response()->json(['status'=>"true"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //Method Get by ID
    public function show($id)
    {
        $service = Service::find($id);

        if ($service==null)
        {
            return response()->json(['status'=>"false"]);

        }
        return response()->json(['data'=>$service,'status'=>'true']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
       //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //PATCH Method
    public function update(Request $request, $id)
    {
        // update
        // validate
        $validator = Validator::make($request->all(), [

            'title' => ['required'],
            'user_id' => ['required'],
            'category_id' => ['required'],
            'subcategory_id' => ['required'],
            'price' => ['required'],
            'negotiationl' => ['required'],
            'description' => ['required'],
            'place' => ['required'],
            'negotiationl' => ['required'],
            'description' => ['required'],
            'place' => ['required'],
            'phone' => ['required'],
            'email' => ['required'],
            'status' => ['required'],

        ]);

         $service= Service::find($id);

         //if id or validation failed , process failed.
         if ($service==null || $validator->fails())
         {
             return response()->json(['status'=>"false"]);

         }
         //if not failed update is done .
         $service->update([

            'title' => $request->title,
            'user_id' => $request->user_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'price' => $request->price,
            'negotiationl' => $request->negotiationl,
            'description' => $request->description,
            'place' => $request->place,
            'phone' => $request->phone,
            'email' => $request->email,
            'status' => $request->status,

        ]);

        return response()->json(['status'=>"true"]);



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //Delete Method
    public function destroy($id)
    {
        $service=Service::find($id);

        //if id not found, fail the operation.
        if ($service==null)
        {
            return response()->json(['status'=>"false"]);
        }
        //if found then operation is succeeded
        $service->delete();
        return response()->json(['status'=>"true"]);

    }

}
