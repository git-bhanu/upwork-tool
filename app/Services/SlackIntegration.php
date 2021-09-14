<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SlackIntegration
{
    public static function openNewTaskView($payload)
    {
        $response = Http::withToken(env('SLACK'))
        ->post('https://slack.com/api/views.open', [
            "trigger_id" => $payload->trigger_id,
            "view" => json_encode(
                array (
                    'title' =>
                        array (
                            'type' => 'plain_text',
                            'text' => 'Tasky - New Task',
                            'emoji' => true,
                        ),
                    'submit' =>
                        array (
                            'type' => 'plain_text',
                            'text' => 'Add Task',
                            'emoji' => true,
                        ),
                    'type' => 'modal',
                    'close' =>
                        array (
                            'type' => 'plain_text',
                            'text' => 'Close',
                            'emoji' => true,
                        ),
                    'blocks' =>
                        array (
                            0 =>
                                array (
                                    'type' => 'header',
                                    'text' =>
                                        array (
                                            'type' => 'plain_text',
                                            'text' => 'Add new task to Hubstaff',
                                            'emoji' => true,
                                        ),
                                ),
                            1 =>
                                array (
                                    'type' => 'divider',
                                ),
                            2 =>
                                array (
                                    'type' => 'input',
                                    'element' =>
                                        array (
                                            'type' => 'plain_text_input',
                                            'placeholder' =>
                                                array (
                                                    'type' => 'plain_text',
                                                    'text' => 'Add title for the task',
                                                    'emoji' => true,
                                                ),
                                            'action_id' => 'task_title',
                                        ),
                                    'label' =>
                                        array (
                                            'type' => 'plain_text',
                                            'text' => 'Task Title',
                                            'emoji' => true,
                                        ),
                                ),
                            3 =>
                                array (
                                    'type' => 'input',
                                    'element' =>
                                        array (
                                            'type' => 'multi_users_select',
                                            'placeholder' =>
                                                array (
                                                    'type' => 'plain_text',
                                                    'text' => 'Select user',
                                                    'emoji' => true,
                                                ),
                                            'action_id' => 'assigned_user',
                                            'max_selected_items' => 1,
                                        ),
                                    'label' =>
                                        array (
                                            'type' => 'plain_text',
                                            'text' => 'Assign To',
                                            'emoji' => true,
                                        ),
                                ),
                            4 =>
                                array (
                                    'type' => 'input',
                                    'element' =>
                                        array (
                                            'type' => 'static_select',
                                            'placeholder' =>
                                                array (
                                                    'type' => 'plain_text',
                                                    'text' => 'Select project',
                                                    'emoji' => true,
                                                ),
                                            'options' =>
                                                array (
                                                    0 =>
                                                        array (
                                                            'text' =>
                                                                array (
                                                                    'type' => 'plain_text',
                                                                    'text' => 'CrushFtiness India',
                                                                    'emoji' => true,
                                                                ),
                                                            'value' => 'crushfitness-india',
                                                        ),
                                                    1 =>
                                                        array (
                                                            'text' =>
                                                                array (
                                                                    'type' => 'plain_text',
                                                                    'text' => 'Krenovate',
                                                                    'emoji' => true,
                                                                ),
                                                            'value' => 'krenovate',
                                                        ),
                                                    2 =>
                                                        array (
                                                            'text' =>
                                                                array (
                                                                    'type' => 'plain_text',
                                                                    'text' => 'Lacadives',
                                                                    'emoji' => true,
                                                                ),
                                                            'value' => 'lacadives',
                                                        ),
                                                    3 =>
                                                        array (
                                                            'text' =>
                                                                array (
                                                                    'type' => 'plain_text',
                                                                    'text' => 'DevSolution',
                                                                    'emoji' => true,
                                                                ),
                                                            'value' => 'devsolutions',
                                                        ),
                                                    4 =>
                                                        array (
                                                            'text' =>
                                                                array (
                                                                    'type' => 'plain_text',
                                                                    'text' => 'SaanGlobal',
                                                                    'emoji' => true,
                                                                ),
                                                            'value' => 'saanglobal',
                                                        ),
                                                    5 =>
                                                        array (
                                                            'text' =>
                                                                array (
                                                                    'type' => 'plain_text',
                                                                    'text' => 'Skopezy',
                                                                    'emoji' => true,
                                                                ),
                                                            'value' => 'skopezy',
                                                        ),
                                                    6 =>
                                                        array (
                                                            'text' =>
                                                                array (
                                                                    'type' => 'plain_text',
                                                                    'text' => 'Altpluscare',
                                                                    'emoji' => true,
                                                                ),
                                                            'value' => 'altpluscare',
                                                        ),
                                                ),
                                            'action_id' => 'project_name',
                                        ),
                                    'label' =>
                                        array (
                                            'type' => 'plain_text',
                                            'text' => 'Pick the project for this task',
                                            'emoji' => true,
                                        ),
                                ),
                        ),
                )
            ),
        ]);
    }

}


