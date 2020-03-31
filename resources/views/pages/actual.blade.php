@if(isset($actual[0]->is_active))
    @if($actual[0]->is_active == 1)
    <div class="actual p-2">
        <div class="container actual-container p-4">
            <h1 class="text-center text-off-white heading mb-3">{{ $actual[0]->title }}</h1>
            <h5 class="text-center text-off-white">{{ $actual[0]->text }}</h5>
        </div>
    </div>
    @endif
@endif
