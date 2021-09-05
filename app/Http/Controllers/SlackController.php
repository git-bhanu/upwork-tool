<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SlackController extends Controller
{
    public function index()
    {
        return array (
            'title' =>
                array (
                    'type' => 'plain_text',
                    'text' => 'Tasky',
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
                    'text' => 'Cancel',
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
                                    'action_id' => 'plain_text_input-action',
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
                                    'action_id' => 'multi_users_select-action',
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
                            'type' => 'section',
                            'text' =>
                                array (
                                    'type' => 'mrkdwn',
                                    'text' => 'Pick the *project* for the task',
                                ),
                            'accessory' =>
                                array (
                                    'type' => 'static_select',
                                    'placeholder' =>
                                        array (
                                            'type' => 'plain_text',
                                            'text' => 'Select an item',
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
                                                    'value' => 'value-0',
                                                ),
                                            1 =>
                                                array (
                                                    'text' =>
                                                        array (
                                                            'type' => 'plain_text',
                                                            'text' => 'Krenovate',
                                                            'emoji' => true,
                                                        ),
                                                    'value' => 'value-1',
                                                ),
                                            2 =>
                                                array (
                                                    'text' =>
                                                        array (
                                                            'type' => 'plain_text',
                                                            'text' => 'Lacadives',
                                                            'emoji' => true,
                                                        ),
                                                    'value' => 'value-2',
                                                ),
                                            3 =>
                                                array (
                                                    'text' =>
                                                        array (
                                                            'type' => 'plain_text',
                                                            'text' => 'DevSolution',
                                                            'emoji' => true,
                                                        ),
                                                    'value' => 'value-2',
                                                ),
                                            4 =>
                                                array (
                                                    'text' =>
                                                        array (
                                                            'type' => 'plain_text',
                                                            'text' => 'SaanGlobal',
                                                            'emoji' => true,
                                                        ),
                                                    'value' => 'value-2',
                                                ),
                                            5 =>
                                                array (
                                                    'text' =>
                                                        array (
                                                            'type' => 'plain_text',
                                                            'text' => 'Skopezy',
                                                            'emoji' => true,
                                                        ),
                                                    'value' => 'value-2',
                                                ),
                                            6 =>
                                                array (
                                                    'text' =>
                                                        array (
                                                            'type' => 'plain_text',
                                                            'text' => 'Altpluscare',
                                                            'emoji' => true,
                                                        ),
                                                    'value' => 'value-2',
                                                ),
                                        ),
                                    'action_id' => 'static_select-action',
                                ),
                        ),
                ),
        );
    }
}
