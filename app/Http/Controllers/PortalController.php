<?php

namespace App\Http\Controllers;

use App\DataTables\PortalsDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
// Models
use App\Models\Portal;

class PortalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PortalsDataTable $PortalsDataTable)
    {
        return $PortalsDataTable->render('pages.portals.index'); // view & dataTable render
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.portals.create'); // view
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate
        $validator = Validator::make($request->all(), [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'type' => ['required'],
        ]);

        // validator fails
        if ($validator->fails()) {
            return redirect()->back() // view
            ->withErrors($validator)
                ->withInput(); // flash message
        }
        // create
        Portal::create([
            'title' => $request->title,
            'description' => $request->description,
            'type' =>$request->type,
        ]);

        return redirect()->back() // view
        ->with('success', 'Portal created successfully.'); // flash message
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $portal = Portal::findorfail($id);

        return view('pages.portals.show', compact('portal'));  // view
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $route = route('portals.destroy',$id); //route
        $portal = Portal::findorfail($id);

        return view('pages.portals.edit', compact('id','route','portal'));  // view
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        // validate
        $validator = Validator::make($request->all(), [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string',  'max:255'],
            'type' => ['required', 'string', 'min:8'],
        ]);

        // validator fails
        if ($validator->fails()) {
            return redirect()->back() // view
            ->withErrors($validator)
                ->withInput(); // flash message
        }

        // update
        Portal::findorfail($id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'type' => $request->type,

        ]);

        return redirect()->back() // view
        ->with('success', 'Portal  created successfully.'); // flash message
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Portal::findorfail($id)->delete();

        return redirect()->route('portals.index') // view
        ->with('success', 'Portal created successfully.'); // flash message
    }
}
