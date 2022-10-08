<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class CategoriesController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:عرض التصنيفات', ['only' => ['index']]);
        $this->middleware('permission:اضافة تصنيف', ['only' => ['create','store']]);
        $this->middleware('permission:تعديل تصنيف', ['only' => ['edit','update']]);
        $this->middleware('permission:حذف تصنيف', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CategoryRequest $request)
    {
        Category::create( $request->validated() );
        return redirect()->route('categories.index')->with(['success' => 'تم إضافة التصنيف بنجاح']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit($id)
    {
        $category = Category::find($id);
        if(!$category){
            return redirect()->back()->with(['error' => 'لا يوجد تصنيف']);
        }
        return view('admin.categories.edit',compact('category'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CategoryRequest $request, $id)
    {
        $category = Category::find($id);
        if(!$category){
            return redirect()->route('categories.index')->with(['error' => 'لا يوجد تصنيف']);
        }

        $category->update( $request->validated() );

        return redirect()->route('categories.index')->with(['success' => 'تم تحديث التصنيف بنجاح']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $cat = Category::find($id);

        if(count($cat->posts) != 0){
            return redirect()->route('categories.index')->with(['error' => 'عفواً لا يمكن حذف التصنيف هناك مقالات']);
        };

        $cat->delete();
        return redirect()->route('categories.index')->with(['success' => 'تم حذف التصنيف بنجاح']);
    }
}
