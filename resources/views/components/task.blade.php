<div class="task {{$data['is_done'] ? 'task_done' : 'task_pending'}}">
    <div class="title">
        <input type="checkbox" onchange="taskUpdate(this)" data-id="{{$data['id']}}"

           @if ($data && $data['is_done'])
        checked
           @endif
        >
        <div class="task_title">
            {{$data['title'] ?? ''}}
        </div>
    </div>
    <div class="priority">
        <!--<div class="sphere"></div>-->
        <h6>{{$data['category']->title ?? ''}}</h6>
    </div>
    <div class="actions">
        <a href="{{route('task.edit',['id'=>$data['id']])}}">
            <i class="fa fa-duotone fa-pen-to-square"></i>
        </a>
        <a href="{{route('task.delete',['id'=>$data['id']])}}">
            <i class="fa fa-solid fa-trash-can"></i>
        </a>
    </div>
</div>
