<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class NewsCategoryController extends Controller
{
    public function index(): View
    {
        return view('admin.categories.index', [
            'categories' => NewsCategory::ordered()->paginate(20),
        ]);
    }

    public function create(): View
    {
        return view('admin.categories.form', ['category' => new NewsCategory()]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);
        $data['slug'] = $data['slug'] ?: $this->uniqueSlug($data['name_ua']);

        NewsCategory::create($data);

        return redirect()->route('admin.categories.index')->with('success', 'Категорію додано.');
    }

    public function edit(NewsCategory $category): View
    {
        return view('admin.categories.form', compact('category'));
    }

    public function update(Request $request, NewsCategory $category): RedirectResponse
    {
        $data = $this->validated($request, $category->id);
        $data['slug'] = $data['slug'] ?: $this->uniqueSlug($data['name_ua'], $category->id);

        $category->update($data);

        return redirect()->route('admin.categories.index')->with('success', 'Категорію оновлено.');
    }

    public function destroy(NewsCategory $category): RedirectResponse
    {
        if ($category->news()->exists()) {
            return back()->withErrors(['category' => 'Категорію не можна видалити, бо до неї прив’язані новини.']);
        }

        $category->delete();

        return back()->with('success', 'Категорію видалено.');
    }

    private function validated(Request $request, ?int $ignoreId = null): array
    {
        return $request->validate([
            'name_ua' => ['required', 'string', 'max:120'],
            'name_en' => ['required', 'string', 'max:120'],
            'slug' => ['nullable', 'string', 'max:140', Rule::unique('news_categories', 'slug')->ignore($ignoreId)],
            'sort_order' => ['nullable', 'integer', 'min:0', 'max:255'],
        ]);
    }

    private function uniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $base = News::generateSlug($title);
        $slug = $base;
        $i = 2;

        while (NewsCategory::where('slug', $slug)->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))->exists()) {
            $slug = $base . '-' . $i;
            $i++;
        }

        return $slug;
    }
}
