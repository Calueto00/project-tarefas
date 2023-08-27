<x-layout page="ToDo App: Login">
    <x-slot:btn>

    <a href="{{route('register')}}" class="btn btn-primary">
        Registra-se
    </a>
    </x-slot:btn>

    <section id="task_section">
        <h1>Autenticação</h1>
            @if ($errors->any())
                <ul class="alert alert-error">
                    @foreach ($errors->all() as $error)
                            <li style="color: red">{{$error}}</li>
                    @endforeach
                </ul>
            @endif
        <form action="{{route('user.login_action')}}" method="POST">
            @csrf

            <x-form.input_text
            name="email"
            label="Email"
            type="email"
            placeholder="seu Nome" />

            <x-form.input_text
            name="password"
            label="password"
            type="password"
            placeholder="seu Senha" />

            <x-form.form_button resetext="Limpar" submittext="Login" />


        </form>
    </section>
</x-layout>
