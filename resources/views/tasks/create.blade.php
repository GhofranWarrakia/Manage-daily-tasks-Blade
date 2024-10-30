@extends('layouts.app')

@section('content')
    <div class="container" style="direction: rtl; background-color: #87CEEB; padding: 20px; border-radius: 5px;">
        <h1 class="text-right mb-4">إضافة مهمة جديدة</h1>
        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf

            <div class="form-group row mb-3">
                <label for="title" class="col-sm-3 col-form-label text-right">عنوان المهمة</label>
                <div class="col-sm-9">
                    <input type="text" name="title" id="title" class="form-control" required>
                </div>
            </div>

            <div class="form-group row mb-3">
                <label for="description" class="col-sm-3 col-form-label text-right">وصف المهمة</label>
                <div class="col-sm-9">
                    <textarea name="description" id="description" class="form-control"></textarea>
                </div>
            </div>

            <div class="form-group row mb-3">
                <label for="due_date" class="col-sm-3 col-form-label text-right">تاريخ الاستحقاق</label>
                <div class="col-sm-9">
                    <input type="date" name="due_date" id="due_date" class="form-control" required>
                </div>
            </div>

            <div class="form-group row mb-3">
                <label for="status" class="col-sm-3 col-form-label text-right">الحالة</label>
                <div class="col-sm-9">
                    <select name="status" id="status" class="form-control" required>
                        <option value="Pending">معلقة</option>
                        <option value="Completed">مكتملة</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-3"></div>
                <div class="col-sm-9 text-left"> 
                    <button type="submit" class="btn btn-primary">حفظ</button>
                </div>
            </div>
        </form>
    </div>
@endsection
