<div class="input_area">
    <label for="{{$name}}">
        {{$label ?? ''}}
    </label>
    <select name="{{$name}}" {{empty($required) ? '': 'required'}} id="{{$name}}" >
        <option selected disabled value="">Selecione uma Categoria</option>
        {{$slot}}
    </select>
</div>
