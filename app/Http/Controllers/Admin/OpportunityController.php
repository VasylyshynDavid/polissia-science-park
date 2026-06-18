<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Opportunity;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OpportunityController extends Controller
{
    private const MAX_ACTIVE = 10;

    public function index(): View
    {
        return view('admin.opportunities.index', [
            'opportunities' => Opportunity::ordered()->paginate(20),
            'activeCount' => Opportunity::active()->count(),
            'maxActive' => self::MAX_ACTIVE,
        ]);
    }

    public function create(): View
    {
        return view('admin.opportunities.form', ['opportunity' => new Opportunity(), 'maxActive' => self::MAX_ACTIVE]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request, true);
        $data['is_active'] = $request->boolean('is_active');
        $this->ensureActiveLimit($data['is_active']);
        $data['image_path'] = $this->storeFile($request, 'icon', 'opportunities');

        Opportunity::create($data);

        return redirect()->route('admin.opportunities.index')->with('success', 'Можливість додано.');
    }

    public function edit(Opportunity $opportunity): View
    {
        return view('admin.opportunities.form', compact('opportunity') + ['maxActive' => self::MAX_ACTIVE]);
    }

    public function update(Request $request, Opportunity $opportunity): RedirectResponse
    {
        $data = $this->validated($request, false);
        $data['is_active'] = $request->boolean('is_active');
        $this->ensureActiveLimit($data['is_active'], $opportunity->id);

        if ($request->hasFile('icon')) {
            $data['image_path'] = $this->storeFile($request, 'icon', 'opportunities');
        }

        $opportunity->update($data);

        return redirect()->route('admin.opportunities.index')->with('success', 'Можливість оновлено.');
    }

    public function destroy(Opportunity $opportunity): RedirectResponse
    {
        $opportunity->delete();

        return back()->with('success', 'Можливість видалено.');
    }

    private function validated(Request $request, bool $create): array
    {
        return $request->validate([
            'description_ua' => ['required', 'string', 'max:120'],
            'description_en' => ['required', 'string', 'max:120'],
            'sort_order' => ['nullable', 'integer', 'min:0', 'max:255'],
            'icon' => [$create ? 'required' : 'nullable', 'file', 'mimes:svg,png,jpg,jpeg,webp', 'max:2048'],
        ]);
    }

    private function ensureActiveLimit(bool $willBeActive, ?int $ignoreId = null): void
    {
        if (!$willBeActive) {
            return;
        }

        $count = Opportunity::active()->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))->count();
        if ($count >= self::MAX_ACTIVE) {
            back()->withErrors(['is_active' => 'Максимум активних можливостей — 10. Деактивуйте або видаліть один запис.'])->throwResponse();
        }
    }

    private function storeFile(Request $request, string $field, string $directory): string
    {
        return 'storage/' . $request->file($field)->store($directory, 'public');
    }
}
