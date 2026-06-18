<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsCategory;
use App\Models\NewsPhoto;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class NewsController extends Controller
{
    public function index(Request $request): View
    {
        $query = News::query()->with('category');

        if ($request->filled('q')) {
            $query->search($request->string('q')->toString());
        }

        if ($request->filled('category')) {
            $query->where('news_category_id', $request->integer('category'));
        }

        return view('admin.news.index', [
            'news' => $query->orderedForListing()->paginate(20)->withQueryString(),
            'categories' => NewsCategory::ordered()->get(),
        ]);
    }

    public function create(): View
    {
        return view('admin.news.form', [
            'newsItem' => new News(['published_at' => now()]),
            'categories' => NewsCategory::ordered()->get(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);
        $data['slug'] = $data['slug'] ?: News::generateSlug($data['title_ua']);
        $data['is_pinned'] = $request->boolean('is_pinned');
        $data['is_archived'] = $request->boolean('is_archived');

        if ($request->hasFile('image')) {
            $data['image_path'] = $this->storeFile($request, 'image', 'news');
        }

        $news = News::create($data);
        $this->storeGallery($request, $news);

        return redirect()->route('admin.news.index')->with('success', 'Новину створено.');
    }

    public function edit(News $news): View
    {
        $news->load('photos');

        return view('admin.news.form', [
            'newsItem' => $news,
            'categories' => NewsCategory::ordered()->get(),
        ]);
    }

    public function update(Request $request, News $news): RedirectResponse
    {
        $data = $this->validated($request, $news->id);
        $data['slug'] = $data['slug'] ?: News::generateSlug($data['title_ua'], $news->id);
        $data['is_pinned'] = $request->boolean('is_pinned');
        $data['is_archived'] = $request->boolean('is_archived');

        if ($request->hasFile('image')) {
            $data['image_path'] = $this->storeFile($request, 'image', 'news');
        }

        $news->update($data);

        if ($request->filled('delete_photos')) {
            NewsPhoto::where('news_id', $news->id)->whereIn('id', (array) $request->input('delete_photos', []))->delete();
        }

        $this->storeGallery($request, $news);

        return redirect()->route('admin.news.edit', $news)->with('success', 'Новину оновлено.');
    }

    public function destroy(News $news): RedirectResponse
    {
        $news->delete();

        return back()->with('success', 'Новину видалено.');
    }

    private function validated(Request $request, ?int $ignoreId = null): array
    {
        return $request->validate([
            'news_category_id' => ['required', 'exists:news_categories,id'],
            'title_ua' => ['required', 'string', 'max:200'],
            'title_en' => ['required', 'string', 'max:200'],
            'slug' => ['nullable', 'string', 'max:220', Rule::unique('news', 'slug')->ignore($ignoreId)],
            'excerpt_ua' => ['required', 'string', 'max:300'],
            'excerpt_en' => ['required', 'string', 'max:300'],
            'body_ua' => ['required', 'string'],
            'body_en' => ['required', 'string'],
            'published_at' => ['nullable', 'date'],
            'sort_order' => ['nullable', 'integer', 'min:0', 'max:255'],
            'image' => ['nullable', 'file', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'gallery' => ['nullable', 'array', 'max:10'],
            'gallery.*' => ['file', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'delete_photos' => ['nullable', 'array'],
            'delete_photos.*' => ['integer', 'exists:news_photos,id'],
        ]);
    }

    private function storeGallery(Request $request, News $news): void
    {
        if (!$request->hasFile('gallery')) {
            return;
        }

        $currentCount = $news->photos()->count();
        $newFiles = $request->file('gallery', []);

        if ($currentCount + count($newFiles) > NewsPhoto::MAX_PER_NEWS) {
            back()->withErrors(['gallery' => 'Для однієї новини дозволено максимум 10 фотографій у галереї.'])->throwResponse();
        }

        foreach ($newFiles as $index => $file) {
            $path = 'storage/' . $file->store('news-gallery', 'public');
            $news->photos()->create([
                'image_path' => $path,
                'sort_order' => $currentCount + $index + 1,
            ]);
        }
    }

    private function storeFile(Request $request, string $field, string $directory): string
    {
        return 'storage/' . $request->file($field)->store($directory, 'public');
    }
}
