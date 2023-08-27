<div class="input_area">
    <label for="{{$name}}">
        {{$label ?? ''}}
    </label>
    <input
    type="checkbox"
    id="{{$name}}"
    value="1"
    name="{{$name}}"
    {{$checked ? 'checked' : ''}}
    {{empty($required) ? '': 'required'}}>
</div>
