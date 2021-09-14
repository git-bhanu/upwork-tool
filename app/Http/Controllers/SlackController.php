<?php

namespace App\Http\Controllers;

use App\Services\SlackIntegration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Vluzrmos\SlackApi\SlackApi;

class SlackController extends Controller
{
    public function index()
    {
    }

    public function handle(Request $request)
    {
        $payload = json_decode($request['payload']);

        if ($payload->type === "shortcut") {
            if ($payload->callback_id === "open_new_task_view") {
                $this->openNewTaskView($payload);
            }
        }

        if ($payload->type === "view_submission") {

            $task_title = null;
            $task_user = null;
            $task_project = null;

            $values = $payload->view->state->values;

            foreach ($values as $value) {
                if (isset($value->task_title)) {
                    $task_title = $value->task_title->value;
                }

                if (isset($value->assigned_user)) {
                    $task_user = $value->assigned_user->selected_users[0];
                }
                if (isset($value->project_name)) {
                    $task_project = $value->project_name->selected_option->value;
                }
            }

            Log::info(json_encode($task_title));
            Log::info(json_encode($task_user));
            Log::info(json_encode($task_project));
        }

    }

    public function openNewTaskView($payload)
    {
        SlackIntegration::openNewTaskView($payload);
    }
}
