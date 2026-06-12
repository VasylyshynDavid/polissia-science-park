@if(isset($opportunities) && count($opportunities))
    <div class="opportunities-grid">
        @foreach($opportunities as $idx => $opportunity)
            <div class="opportunity-card opportunity-home" style="padding:16px;display:flex;flex-direction:column;align-items:center;text-align:center;justify-content:space-between;min-height:140px">
                <div style="width:56px;height:56px;border-radius:50%;background-color: rgba(199,168,74,0.12);display:flex;align-items:center;justify-content:center;margin-bottom:8px">
                    @if($idx == 0)
                        <!-- rocket -->
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2 22s4-1 6-3 6-6 6-6 2 4 5 6c0 0-5 2-11 3S2 22 2 22z" stroke="var(--gold)" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    @elseif($idx == 1)
                        <!-- coin -->
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="12" cy="12" r="8" stroke="var(--gold)" stroke-width="1.6"/><path d="M12 8v8" stroke="var(--gold)" stroke-width="1.6" stroke-linecap="round"/></svg>
                    @elseif($idx == 2)
                        <!-- document/shield -->
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12 2l6 4v6c0 6-6 10-6 10s-6-4-6-10V6l6-4z" stroke="var(--gold)" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    @elseif($idx == 3)
                        <!-- building/cowork -->
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="3" y="3" width="18" height="18" rx="2" stroke="var(--gold)" stroke-width="1.6"/><path d="M7 7h3v3H7zM14 7h3v3h-3zM7 14h3v3H7z" stroke="var(--gold)" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    @elseif($idx == 4)
                        <!-- handshake -->
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2 12l5 5 7-7 8 8" stroke="var(--gold)" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    @else
                        <!-- graduation cap -->
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12 2L2 7l10 5 10-5-10-5z" stroke="var(--gold)" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/><path d="M2 17l10 5 10-5" stroke="var(--gold)" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    @endif
                </div>

                <div class="ua-text" style="font-family:Inter, sans-serif;font-size:14px;color:var(--cream);">{{ $opportunity->description_ua }}</div>
            </div>
        @endforeach
    </div>
@else
    <p>No opportunities available.</p>
@endif
