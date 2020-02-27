<div class="d-flex justify-content-between flex-wrap mb-3">
    <div class="custom-control custom-checkbox mr-1">
    <input type="checkbox" name="is_vegan" value="true" class="custom-control-input" id="is_vegan{{ $id }}" {{  $is_vegan == 1 ? 'checked=""': ''   }}>
        <label class="custom-control-label" for="is_vegan{{ $id }}">Vega</label>
    </div>
    <div class="custom-control custom-checkbox mr-1">
        <input type="checkbox" name="contains_gluten" value="true" class="custom-control-input" id="contains_gluten{{ $id }}" {{ $contains_gluten == 1 ? 'checked=""': '' }}>
        <label class="custom-control-label" for="contains_gluten{{ $id }}">Glutén</label>
    </div>
    <div class="custom-control custom-checkbox mr-1">
        <input type="checkbox" name="contains_lactose" value="true" class="custom-control-input" id="contains_lactose{{ $id }}" {{ $contains_lactose == 1 ?  'checked=""': '' }}>
        <label class="custom-control-label" for="contains_lactose{{ $id }}">Laktóz</label>
    </div>
    <div class="custom-control custom-checkbox">
        <input type="checkbox" name="contains_eggs" value="true" class="custom-control-input" id="contains_eggs{{ $id }}" {{ $contains_eggs == 1 ?  'checked=""': '' }}>
        <label class="custom-control-label" for="contains_eggs{{ $id }}">Tojás</label>
    </div>
</div>
