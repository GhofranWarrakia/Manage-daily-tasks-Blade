<h1>المهام المعلقة</h1>
<p>لديك المهام التالية التي لم تكتمل بعد:</p>

<ul>
    @foreach($tasks as $task)
        <li>
            <strong>{{ $task->title }}</strong><br>
            {{ $task->description }}<br>
            تاريخ الاستحقاق: {{ $task->due_date }}
        </li>
    @endforeach
</ul>
