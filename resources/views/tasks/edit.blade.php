<x-layout page="register Task">
    <x-slot:btn>

    <a href="{{route('home')}}" class="btn btn-primary">
        Back
    </a>
    </x-slot:btn>

    <section id="task_section">
        <h1>Editar Tarefa</h1>
        <form action="{{route('task.edit_action')}}" method="POST">

            @csrf
            <input type="hidden" name="id" value="{{$task->id}}">
        
            <x-form.input_text
            name="title"
            label="Titulo da Task"
            placeholder="Digite o titulo da task"
            value="{{$task->title}}" />

            <x-form.input_text
            name="due_date"
            label="Data de
            Realização"
            type="datetime-local" value="{{$task->due_date}}" />

            <x-form.select_input
            name="category_id"
            label="Seleciona uma Categoria"
            required="required">
                @foreach ($categories as $category)
                    <option value="{{$category->id}}"
                        @if ($category->id==$task->category_id)
                        selected
                    @endif
                        >{{$category->title}}</option>
                @endforeach

            </x-form.select_input>

            <x-form.textarea
            label="Descrição da Tarefa"
            name="description"

             value="{{$task->description}}" />

            <x-form.form_button
            resetext="Resetar"
            submittext="Actualizar Tarefa" />


        </form>
    </section>
</x-layout>
