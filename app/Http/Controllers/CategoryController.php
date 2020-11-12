<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\CategoriesDataTable;
use Illuminate\Support\Facades\Validator;

// Models
use App\Models\Category;
use App\Models\Portal;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CategoriesDataTable $CategoriesDataTable)
    {
        return $CategoriesDataTable->render('pages.categories.index'); // view & dataTable render
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $portals=Portal::all();
       return view('pages.categories.create',compact('portals')); // view
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
            'portal_id'=>['required']

        ]);

        // validator fails
        if ($validator->fails()) {
        return redirect()->back() // view
        ->withErrors($validator)
        ->withInput(); // flash message
        }

        // create
        Category::create([
            'title' => $request->title,
            'description' => $request->description,
            'portal_id'=>$request->portal_id
        ]);

        return redirect()->back() // view
            ->with('success', 'Category created successfully.'); // flash message
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::findorfail($id);

        return view('pages.categories.show', compact('category'));  // view
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $route = route('categories.destroy',$id); //route
        $category = Category::findorfail($id);
        $portals=Portal::all();
        return view('pages.categories.edit', compact('id','route','category','portals'));  // view
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
            'description' => ['required', 'string', 'max:255'],
            'portal_id'=>['required']

        ]);

        // validator fails
        if ($validator->fails()) {
        return redirect()->back() // view
        ->withErrors($validator)
        ->withInput(); // flash message
        }

        // update
        Category::findorfail($id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'portal_id'=>$request->portal_id
        ]);

        return redirect()->back() // view
            ->with('success', 'Category created successfully.'); // flash message
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::findorfail($id)->delete();

        return redirect()->route('categories.index') // view
            ->with('success', 'Category created successfully.'); // flash message
    }
}
