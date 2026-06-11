@if(isset($opportunities) && count($opportunities))
    <div class="opportunities-grid">
        @foreach($opportunities as $opportunity)
            <div class="opportunity-card opportunity-home">
                <div style="display:flex;flex-direction:column;gap:12px;align-items:flex-start">
                    <div style="width:48px;height:48px;border-radius:50%;background:rgba(199,168,74,0.12);display:flex;align-items:center;justify-content:center;color:var(--gold);font-weight:700">★</div>
                    <div class="ua-text">{{ $opportunity->description_ua }}</div>
                </div>
            </div>
        @endforeach
    </div>
@else
    <p>No opportunities available.</p>
@endif
