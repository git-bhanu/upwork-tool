<?php

namespace App\Http\Livewire\Review;

use App\Http\Controllers\ReviewController;
use App\Models\Job;
use App\Models\ReviewList;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateReviewForm extends Component
{
    public $job;
    public $reasons;
    public $selectedReason;
    public $otherReason;
    public $reviewers = [];
    public $selectedReviewers = [];
    public $comment = '';

    public function mount(Job $job) {
        $this->job = $job;
        $this->reasons = ReviewList::where('type', 'under-review')->whereShow(true)->get();
        $this->reviewers = User::role('sales-manager')->get();
    }

    public function render()
    {
        return view('livewire.review.create-review-form');
    }

    public function updatedComment()
    {
        if (strlen($this->comment) > 500) {
            $this->comment = substr($this->comment, 0, 500);
        }
    }

    public function create_review()
    {
        if ( $this->selectedReason == 0) {
            if ( $this->otherReason != '' || $this->otherReason ) {

                $create = ReviewList::firstOrCreate(
                    [
                        'title' => $this->otherReason,
                        'type' => 'under-review',
                        'user_id' => Auth::user()->id
                    ]
                );

                $review = ReviewController::createReview($this->job, $create, $this->comment, $this->selectedReviewers);
                $this->emit('rerenderComponent');

            } else {
                session()->flash('error', 'Other cannot be empty.');
            }
        } else {
            $reason = ReviewList::find($this->selectedReason);
            $review = ReviewController::createReview($this->job, $reason, $this->comment, $this->selectedReviewers);
            $this->emit('rerenderComponent');
        }

    }
}
