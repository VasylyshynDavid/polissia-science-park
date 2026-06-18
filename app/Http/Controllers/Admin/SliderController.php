<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class SliderController extends Controller
{
    private const MAX_ACTIVE = 10;

    public function index(): View
    {
        return view('admin.sliders.index', [
            'sliders' => Slider::ordered()->paginate(20),
            'activeCount' => Slider::active()->count(),
            'maxActive' => self::MAX_ACTIVE,
        ]);
    }

    public function create(): View
    {
        return view('admin.sliders.form', ['slider' => new Slider(), 'maxActive' => self::MAX_ACTIVE]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request, true);
        $data['is_active'] = $request->boolean('is_active');
        $this->ensureActiveLimit($data['is_active']);
        $data['image_path'] = $this->storeFile($request, 'image', 'sliders');

        Slider::create($data);

        return redirect()->route('admin.sliders.index')->with('success', 'Слайд додано.');
    }

    public function edit(Slider $slider): View
    {
        return view('admin.sliders.form', compact('slider') + ['maxActive' => self::MAX_ACTIVE]);
    }

    public function update(Request $request, Slider $slider): RedirectResponse
    {
        $data = $this->validated($request, false);
        $data['is_active'] = $request->boolean('is_active');
        $this->ensureActiveLimit($data['is_active'], $slider->id);

        if ($request->hasFile('image')) {
            $data['image_path'] = $this->storeFile($request, 'image', 'sliders');
        }

        $slider->update($data);

        return redirect()->route('admin.sliders.index')->with('success', 'Слайд оновлено.');
    }

    public function destroy(Slider $slider): RedirectResponse
    {
        $slider->delete();

        return back()->with('success', 'Слайд видалено.');
    }

    private function validated(Request $request, bool $create): array
    {
        return $request->validate([
            'title_ua' => ['required', 'string', 'max:120'],
            'title_en' => ['required', 'string', 'max:120'],
            'description_ua' => ['required', 'string', 'max:255'],
            'description_en' => ['required', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer', 'min:0', 'max:255'],
            'image' => [$create ? 'required' : 'nullable', 'file', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
        ]);
    }

    private function ensureActiveLimit(bool $willBeActive, ?int $ignoreId = null): void
    {
        if (!$willBeActive) {
            return;
        }

        $count = Slider::active()->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))->count();
        if ($count >= self::MAX_ACTIVE) {
            back()->withErrors(['is_active' => 'Максимум активних слайдів — 10. Деактивуйте або видаліть один запис.'])->throwResponse();
        }
    }

    private function storeFile(Request $request, string $field, string $directory): string
    {
        return 'storage/' . $request->file($field)->store($directory, 'public');
    }
}
