<div class="d-flex justify-content-between flex-wrap mb-3">
    <div class="custom-control custom-checkbox mr-1">
        <input type="checkbox" name="is_vegan" value="true" class="custom-control-input" id="is_vegan" {{ $is_vegan == 1 ? 'checked=""': '' }}>
        <label class="custom-control-label" for="is_vegan">Vega</label>
    </div>
    <div class="custom-control custom-checkbox mr-1">
        <input type="checkbox" name="contains_gluten" value="true" class="custom-control-input" id="contains_gluten" {{ $contains_gluten == 1 ? 'checked=""': '' }}>
        <label class="custom-control-label" for="contains_gluten">Glutén</label>
    </div>
    <div class="custom-control custom-checkbox mr-1">
        <input type="checkbox" name="contains_lactose" value="true" class="custom-control-input" id="contains_lactose" {{ $contains_lactose == 1 ?  'checked=""': '' }}>
        <label class="custom-control-label" for="contains_lactose">Laktóz</label>
    </div>
    <div class="custom-control custom-checkbox">
        <input type="checkbox" name="contains_eggs" value="true" class="custom-control-input" id="contains_eggs" {{ $contains_eggs == 1 ?  'checked=""': '' }}>
        <label class="custom-control-label" for="contains_eggs">Tojás</label>
    </div>
</div>
