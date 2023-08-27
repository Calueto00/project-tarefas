<x-layout page="register Task">
    <x-slot:btn>

    <a href="{{route('login')}}" class="btn btn-primary">
        Voltar
    </a>
    </x-slot:btn>

    <section id="task_section">
        <h1>Registrar-se</h1>
        @if ($errors->any())
        <ul class="alert alert-error">
            @foreach ($errors->all() as $error)
                    <li style="color: red">{{$error}}</li>
            @endforeach
        </ul>
    @endif
        <form action="{{route('user.register_action')}}" method="POST">
            @csrf
            <x-form.input_text name="name" label="Nome de Usuario"
            placeholder="seu Nome" />

            <x-form.input_text name="email" label="Email" type="email" placeholder="seu Nome" />

            <x-form.input_text name="password" label="password" type="password" placeholder="seu Senha" />

            <x-form.input_text name="password_confirmation" label="Confirme sua senha" type="password" placeholder="confirme sua senha" />

            <x-form.form_button resetext="Limpar" submittext="Registrar-se" />


        </form>
    </section>
</x-layout>
