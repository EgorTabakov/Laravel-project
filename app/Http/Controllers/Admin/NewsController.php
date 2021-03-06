<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\NewsCreate;
use App\Models\Category;
use App\Models\News;
use App\Services\FileUploadService;
use Illuminate\Http\Request;


class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.news.index', [
            'newsList' => News::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.news.create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param NewsCreate $request
     * @param FileUploadService $fileUploadService
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function store(NewsCreate $request, FileUploadService $fileUploadService)
    {

        $fields = $request->validated();
        $fields['slug'] = \Str::slug($fields['title']);
        $fields['image'] = $fileUploadService->upload($request);

        $news = News::create($fields);

        if ($news) {
            return redirect()->route('news.index');

        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.news.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param News $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $categories = Category::all();
        return view('admin.news.edit', [
            'news' => $news,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param News $news
     * @param FileUploadService $upload
     * @return void
     */
    public function update(Request $request, News $news, FileUploadService $fileUploadService)
    {
        $request->validate([
            'title' => ['required']
        ]);
        $fields = $request->only('category_id', 'title', 'image', 'description');
        $fields['slug'] = \Str::slug($fields['title']);
        $fields['image'] = $fileUploadService->upload($request);

        $news = $news->fill($fields)->save();

        if ($news) {
            return redirect()->route('news.index')
                ->with('success', '???????????? ??????????????????');
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param News $news
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('news.index');
    }
}
