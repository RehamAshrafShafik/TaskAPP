<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    //
    public function OpenView(\Illuminate\Support\Facades\Request $request)
    {
        $cus=DB::table('customers')->get();
        return view('welcome', compact('cus'));
    }
    function action(Request $request)
    {
        if($request->ajax())
        {
            if($request->action == 'edit')
            {
                $data = array(
                    'Name'	=>	$request->Name,
                    'Mobile'		=>	$request->Mobile,
                    'Mobile2'		=>	$request->Mobile2,
                    'DomainOne'=>$request->DomainOne,
                    'DomainTwo'=>$request->DomainTwo,

                );
                DB::table('customers')
                    ->where('Mobile', $request->Mobile)
                    ->update($data);
            }
            if($request->action == 'delete')
            {
                DB::table('customers')
                    ->where('Mobile', $request->Mobile)
                    ->delete();
            }
            return response()->json($request);
        }
    }
}
