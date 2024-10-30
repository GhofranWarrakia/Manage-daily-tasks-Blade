@extends('layouts.app')

@section('content')
    <div class="container" style="direction: rtl; background-color: #87CEEB; padding: 20px; border-radius: 5px;">
        <h1 class="text-right mb-4">قائمة المهام اليومية</h1>
        <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3" style="background-color: #007bff; border-color: #007bff;">إضافة مهمة جديدة</a>

        @foreach($tasks as $task)
            <div class="card mb-3" style="text-align: right; background-color: white; border: 1px solid #ccc;">
                <div class="card-body">
                    <h3 class="card-title">{{ $task->title }}</h3>
                    <p class="card-text">{{ $task->description }}</p>
                    <p class="card-text"><strong>تاريخ الاستحقاق:</strong> {{ $task->due_date }}</p>
                    <p class="card-text"><strong>الحالة:</strong> {{ $task->status }}</p>

                    <form action="{{ route('tasks.updateStatus', $task->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-info" style="background-color: #17a2b8; border-color: #17a2b8;">
                            {{ $task->status == 'Pending' ? ' معلقة' : ' مكتملة' }}
                        </button>
                    </form>

                    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning" style="background-color: #ffc107; border-color: #ffc107;">تعديل</a>

                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" style="background-color: #dc3545; border-color: #dc3545;">حذف</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection
