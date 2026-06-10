@if(isset($opportunities) && count($opportunities))
    <div class="opportunities-grid">
        @foreach($opportunities as $opportunity)
            <div class="opportunity-card">
                <div style="display:flex;gap:12px;align-items:flex-start">
                    <img src="{{ asset($opportunity->image_path) }}" alt="opportunity" />
                    <div>
                        <div class="ua-text">{{ $opportunity->description_ua }}</div>
                        <div class="en-text">{{ $opportunity->description_en }}</div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@else
    <p>No opportunities available.</p>
@endif
