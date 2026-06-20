@php
    $isEn = ($currentLocale ?? 'uk') === 'en';
@endphp

@if(isset($opportunities) && count($opportunities))
    <div class="opportunities-grid">
        @foreach($opportunities as $opportunity)
            <div class="opportunity-card opportunity-home">
                <div class="opportunity-icon-wrap">
                    <img src="{{ asset($opportunity->image_path) }}"
                         alt="{{ $isEn ? $opportunity->description_en : $opportunity->description_ua }}"
                         class="opportunity-icon-img">
                </div>

                <div class="ua-text">{{ $isEn ? $opportunity->description_en : $opportunity->description_ua }}</div>
            </div>
        @endforeach
    </div>
@else
    <p style="text-align:center;color:#F3EBDD">{{ $isEn ? 'No opportunities available.' : 'Можливості відсутні.' }}</p>
@endif
