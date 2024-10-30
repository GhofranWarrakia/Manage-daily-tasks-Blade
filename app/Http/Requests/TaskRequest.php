<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',         // يجب أن يكون العنوان نصيًّا وحده الأقصى 255 حرفًا
            'description' => 'nullable|string',            // الوصف يمكن أن يكون نصيًّا أو فارغًا
            'due_date' => 'required|date|after_or_equal:today',  // يجب أن يكون تاريخًا ومساويًا أو بعد اليوم
            'status' => 'required|in:Pending,Completed'    // يجب أن تكون الحالة إما "Pending" أو "Completed"
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'يرجى إدخال عنوان المهمة.',
            'title.max' => 'يجب أن يكون العنوان أقل من 255 حرفًا.',
            'due_date.required' => 'يرجى تحديد تاريخ الاستحقاق.',
            'due_date.date' => 'يرجى إدخال تاريخ صحيح.',
            'due_date.after_or_equal' => 'يجب أن يكون تاريخ الاستحقاق اليوم أو بعده.',
            'status.required' => 'يرجى اختيار حالة المهمة.',
            'status.in' => 'يجب أن تكون حالة المهمة إما معلقة أو مكتملة.'
        ];
    }
}
