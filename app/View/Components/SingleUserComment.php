<?php

namespace App\View\Components;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\View\Component;

class SingleUserComment extends Component
{
    public $comment;
    public $user;
    public $first_chracter;
    public $name;
    /**
     * @var mixed
     */
    public $comment_time;

    /**
     *  Create a new component instance.
     *
     * @return void
     */
    public function __construct($comment)
    {
        $this->comment = $comment;
        $this->user = User::find($comment->user_id);
        $this->name = $this->user->name;
        $this->first_chracter = $this->name[0];
        $this->comment_time = Carbon::createFromFormat('Y-m-d H:i:s', $this->comment->created_at)->diffForHumans('now');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.single-user-comment');
    }
}
