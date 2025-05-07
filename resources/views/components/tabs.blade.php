<div>
    <ul class="nav nav-tabs" id="customTabs" role="tablist">
        @foreach($tabs as $index => $tab)
            <li class="nav-item" role="presentation">
                <button class="nav-link @if($index === 0) active @endif" id="{{ $tab['id'] }}-tab" data-bs-toggle="tab" data-bs-target="#{{ $tab['id'] }}" type="button" role="tab" aria-controls="{{ $tab['id'] }}" aria-selected="{{ $index === 0 ? 'true' : 'false' }}">
                    {{ $tab['title'] }}
                </button>
            </li>
        @endforeach
    </ul>
    <div class="tab-content mt-3" id="customTabsContent">
        @foreach($tabs as $index => $tab)
            <div class="tab-pane fade @if($index === 0) show active @endif" id="{{ $tab['id'] }}" role="tabpanel" aria-labelledby="{{ $tab['id'] }}-tab">
                {!! $tab['content'] !!}
            </div>
        @endforeach
    </div>
</div>
