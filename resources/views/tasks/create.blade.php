<x-layout page="register Task">
    <x-slot:btn>

    <a href="{{route('home')}}" class="btn btn-primary">
        Voltar
    </a>
    </x-slot:btn>

    <section id="task_section">
        <h1>Criar Tarefa</h1>
        <form action="{{route('task.create_action')}}" method="POST">
            @csrf
            <x-form.input_text name="title" label="Titulo da Task"
            placeholder="Digite o titulo da task" />

            <x-form.input_text name="due_date" label="Data de Realização" type="datetime-local" />

            <x-form.select_input name="category_id" label="Seleciona uma Categoria"
            required="required">
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->title}}</option>
                @endforeach

            </x-form.select_input>

            <x-form.textarea label="Descrição da Tarefa" name="description"
            placeholder="Digite uma descrição" />

            <x-form.form_button resetext="Resetar" submittext="Criar Tarefa" />


        </form>
    </section>
</x-layout>
