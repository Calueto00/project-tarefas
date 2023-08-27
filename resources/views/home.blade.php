<x-layout>
    <x-slot:btn>

    <a href="{{route('task.create')}}" class="btn btn-primary">
        Criar Tarefa
    </a>
    <a href="{{route('logout')}}" class="btn btn-primary">
        Sair
    </a>
    </x-slot:btn>
    <section class="graph">
        <div class="graph_header">
            <h2>Progresso do dia</h2>
            <div class="graph_header_line"></div>
            <div class="graph_header_date">
                <a href="{{route('home',['date'=>$prev_button])}}">
                    <i class="fa fa-duotone fa-angle-left fa-sm"> </i>
                </a>
                        <small> {{$date_as_string}} </small>
               <a href="{{route('home',['date'=>$next_button])}}">
                    <i class="fa fa-duotone fa-angle-right fa-sm"> </i>
                </a>
            </div>
        </div>
        <div class="graph_header_subtitle">Tarefas: <b>3/6</b></div>
        <div class="graph_placeholder">

        </div>
        <div class="task_left_footer">
            <i class="fa fa-light fa-circle-question" style="color: #f0f1f3;"></i>
            Restam 3 tarefas para serem realizadas
        </div>

    </section>
    <section class="list">
        <div class="list_header">
            <select name="" id="" class="list-header-select" onchange="changeStatusFiltered(this)">
                <option value="all_task">Todas as tarefas</option>
                <option value="task_pending">Tarefas Pendentes</option>
                <option value="task_done">Tarefas Realizadas</option>

            </select>
        </div>
        <div class="task_list">
          @foreach ($tasks as $task)
          <x-task :data=$task/>
          @endforeach

        </div>
    </section>
    <script>
        function changeStatusFiltered(e){
            if(e.value == 'task_pending'){
                showAllTask();
                document.querySelectorAll('.task_done').forEach(function(element){
                    element.style.display = 'none';
                })
            }else if(e.value == 'task_done'){
                showAllTask();
                document.querySelectorAll('.task_pending').forEach(function(element){
                    element.style.display = 'none';
                })
            }else{
                showAllTask();
            }
        }

        function showAllTask(){
            document.querySelectorAll('.task').forEach(function(element){
                    element.style.display = 'flex';
                })
        }
    </script>

    <script>
     async function taskUpdate(element){
            let status = element.checked;
            let taskId = element.dataset.id;
            let url = '{{route('task.update')}}'
            let rawResult = await fetch(url,{
                method: 'POST',
                headers: {
                    'content-type': 'application/json',
                    'accept' : 'application/json'
                },
                body: JSON.stringify({status,taskId,_token: '{{csrf_token()}}'})
            });
           result = await rawResult.json();
           if(result.success){
                alert('Task Actualizada com Sucesso');
           }else{
            element.checked = ! status;
           }

        }
    </script>

</x-layout>
