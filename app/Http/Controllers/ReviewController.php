<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Review;
use App\Models\ReviewList;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public static function createReview(Job $job, ReviewList $reason, $comment, $reviewers)
    {
        $review =  Review::create([
            'status' => false,
            'created_by' => Auth::user()->id,
            'job_id' => $job->id,
            'open_reason_id' => $reason->id,
            'comment' => $comment
        ]);

        $review->reviewers()->attach($reviewers);
        $job->status = config('job_status.status.2');
        $job->save();
        return $review;
    }

    public static function closeReview(ReviewList $reason, Review $review, $comment)
    {
        $review->reviewed_by = Auth::user()->id;
        $review->close_reason_id = $reason->id;
        $review->status = true;
        $review->close_comment = $comment;
        $review->save();

        $job = $review->job()->first();
        $job->status = $reason->type;
        $job->save();
    }

    public function index()
    {
        if (Auth::user()->hasRole('sales-manager')) {
            $reviews = Auth::user()->reviews()->orderBy('status', 'ASC')->latest()->paginate(10);
        }
        if (Auth::user()->hasRole('sales-associate')) {
            $reviews =  Review::where('created_by', Auth::user()->id)->orderBy('status', 'ASC')->latest()->paginate(10);
        }

            return view('review.index', compact(['reviews']) );
    }
}
