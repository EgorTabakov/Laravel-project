<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryCreate;
use App\Models\Category;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends Controller
{

    public function index()
    {

        $categories = Category::all();
        return view('admin.categories.index', [
            'categories' => $categories
        ]);
    }


    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.categories.create', [
            'categories' => $categories
        ]);
    }


    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(CategoryCreate $request)
    {

        $fields = $request->validated();
        $categories = Category::create($fields);

        if ($categories) {
            return redirect()->route('categories.index');
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */

    public function show($id)
    {
        //
    }


    /**
     * @param Category $category
     * @return Application|Factory|View
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Category $category
     * @return RedirectResponse
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'title' => ['required']
        ]);
        $fields = $request->only('category_id', 'title', 'description');
        $category = $category->fill($fields)->save();

        if ($category) {
            return redirect()->route('categories.index');
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return Response
     * @throws Exception
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index');
    }

}
