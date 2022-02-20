<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Message;
use Auth;
use Pusher\Pusher;


class TaskController extends Controller
{
    public function save_task(Request $request) {
 
        $task = new Task;
        $task->title = $request['title'];
        $task->description = $request['description'];
        $title = $request->title;


        $message = new Message;
        $message->from = Auth::user()->id;
        $id = $message->from;
        $message->message = $title;
        $message->save();

        $options = array(
            'cluster' => 'ap2',
            'useTLS' => true
        );


        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );


        $data = ['from' => $id];
        $pusher->trigger('my-channel', 'my-event', $data);


        if($task->save()) {
            return response()->json(['status' => true, 'message' => 'Task Added Successfully']);
        }
    }
}
