<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{task,work};
use Nexmo\Laravel\Facade\Nexmo;
use App\Notifications\taskNotification;
use Notification;

class taskController extends Controller
{

    public function index($id)
    {
        $worker = work::find($id);
        //$sales_people = work::
        return view('admin.managers.task',compact('worker'));
    }
    public function assignTask(Request $req)
    {

        $req->validate([
            'task'=>'required',
        ]);
            $tasks = $req->all();
            Notification::send($req->phone_no, new taskNotification($tasks));
            $task = new task;
            $task->work_id = $req->worker_id;
            $task->task = $req->task;
            $task->status = 'assigned';
            $task->work_id = $req->worker;
            $task->save();
            return 'success task assigned';
    }
}
