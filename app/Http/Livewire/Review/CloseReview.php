<?php

namespace App\Http\Livewire\Review;

use App\Http\Controllers\ReviewController;
use App\Models\Job;
use App\Models\Review;
use App\Models\ReviewList;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CloseReview extends Component
{
    public $review;
    public $status = 'pass';
    public $reasons = 'pass';
    public $selectedReason;
    public $otherReason;
    public $comment;
    public $type;

    public function mount(Review $review) {
        $this->review = $review;
        if($this->status == 'pass') {
            $this->type = 'review-passed';
        } else {
            $this->type = 'review-failed';
        }
        $this->reasons = ReviewList::where('type', 'review-passed')->whereShow(true)->get();
    }

    public function updatedComment()
    {
        if (strlen($this->comment) > 500) {
            $this->comment = substr($this->comment, 0, 500);
        }
    }


    public function updatingStatus($value) {
        if($value == 'pass') {
            $this->type = 'review-passed';
        } else {
            $this->type = 'review-failed';
        }
        $this->reasons = ReviewList::where('type', $this->type)->whereShow(true)->get();
    }

    public function render()
    {
        return view('livewire.review.close-review');
    }

    public function submit_review()
    {
        if($this->status == 'pass') {
            $this->type = 'review-passed';
        } else {
            $this->type = 'review-failed';
        }

        if ( $this->selectedReason == 0) {
            if ( $this->otherReason != '' || $this->otherReason ) {

                $create = ReviewList::firstOrCreate(
                    [
                        'title' => $this->otherReason,
                        'type' => $this->type,
                        'user_id' => Auth::user()->id
                    ]
                );

                $review = ReviewController::closeReview($create, $this->review, $this->comment);
                $this->emit('rerenderComponent');

            } else {
                session()->flash('error', 'Other cannot be empty.');
            }
        } else {
            $reason = ReviewList::find($this->selectedReason);
            $review = ReviewController::closeReview($reason, $this->review, $this->comment);
            $this->emit('rerenderComponent');
        }
    }
}
