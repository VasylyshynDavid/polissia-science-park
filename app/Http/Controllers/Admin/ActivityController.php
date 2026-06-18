<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ActivityController extends Controller
{
    private const MAX_ACTIVE = 10;

    public function index(): View
    {
        return view('admin.activities.index', [
            'activities' => Activity::ordered()->paginate(20),
            'activeCount' => Activity::active()->count(),
            'maxActive' => self::MAX_ACTIVE,
        ]);
    }

    public function create(): View
    {
        return view('admin.activities.form', ['activity' => new Activity(), 'maxActive' => self::MAX_ACTIVE]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request, true);
        $data['is_active'] = $request->boolean('is_active');
        $this->ensureActiveLimit($data['is_active']);
        $data['image_path'] = $this->storeFile($request, 'icon', 'activities');

        Activity::create($data);

        return redirect()->route('admin.activities.index')->with('success', 'Напрям діяльності додано.');
    }

    public function edit(Activity $activity): View
    {
        return view('admin.activities.form', compact('activity') + ['maxActive' => self::MAX_ACTIVE]);
    }

    public function update(Request $request, Activity $activity): RedirectResponse
    {
        $data = $this->validated($request, false);
        $data['is_active'] = $request->boolean('is_active');
        $this->ensureActiveLimit($data['is_active'], $activity->id);

        if ($request->hasFile('icon')) {
            $data['image_path'] = $this->storeFile($request, 'icon', 'activities');
        }

        $activity->update($data);

        return redirect()->route('admin.activities.index')->with('success', 'Напрям діяльності оновлено.');
    }

    public function destroy(Activity $activity): RedirectResponse
    {
        $activity->delete();

        return back()->with('success', 'Напрям діяльності видалено.');
    }

    private function validated(Request $request, bool $create): array
    {
        return $request->validate([
            'title_ua' => ['required', 'string', 'max:60'],
            'title_en' => ['required', 'string', 'max:60'],
            'description_ua' => ['required', 'string', 'max:180'],
            'description_en' => ['required', 'string', 'max:180'],
            'sort_order' => ['nullable', 'integer', 'min:0', 'max:255'],
            'icon' => [$create ? 'required' : 'nullable', 'file', 'mimes:svg,png,jpg,jpeg,webp', 'max:2048'],
        ]);
    }

    private function ensureActiveLimit(bool $willBeActive, ?int $ignoreId = null): void
    {
        if (!$willBeActive) {
            return;
        }

        $count = Activity::active()->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))->count();
        if ($count >= self::MAX_ACTIVE) {
            back()->withErrors(['is_active' => 'Максимум активних напрямів — 10. Деактивуйте або видаліть один запис.'])->throwResponse();
        }
    }

    private function storeFile(Request $request, string $field, string $directory): string
    {
        return 'storage/' . $request->file($field)->store($directory, 'public');
    }
}
