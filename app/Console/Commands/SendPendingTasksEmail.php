<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Task;
use Illuminate\Support\Facades\Mail;
use App\Mail\PendingTasks;

class SendPendingTasksEmail extends Command
{
    protected $signature = 'tasks:send-pending-emails';
    protected $description = 'Send daily emails to users with their pending tasks';

    public function handle()
    {
        // جلب جميع المستخدمين
        $users = User::all();

        foreach ($users as $user) {
            // جلب المهام غير المكتملة لهذا المستخدم
            $pendingTasks = Task::where('user_id', $user->id)
                                ->where('status', 'Pending')
                                ->whereDate('due_date', today())
                                ->get();

            // إذا كان لدى المستخدم مهام غير مكتملة، أرسل البريد الإلكتروني
            if ($pendingTasks->isNotEmpty()) {
                Mail::to($user->email)->send(new PendingTasks($pendingTasks));
            }
        }

        $this->info('Pending tasks emails sent successfully!');
    }
}
