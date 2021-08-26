<?php

namespace App\Http\Controllers;

use App\Models\ReviewList;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Auth;

class ReviewListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $review_list = ReviewList::latest()->paginate(20);
        return view('ReviewList.index', compact(['review_list']) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ReviewList.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'title' => 'required|string|max:50',
            'type' => 'required|string|max:20',
        ]);

        if (!Auth::user()->hasAnyRole(['super-admin', 'sale-manager'])) {
            abort(401);
        }

        $request->request->add([ 'user_id' => Auth::user()->id ]);

        ReviewList::create($request->all());

        return redirect()->route('reviewList.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReviewList  $reviewList
     * @return \Illuminate\Http\Response
     */
    public function show(ReviewList $reviewList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReviewList  $reviewList
     * @return \Illuminate\Http\Response
     */
    public function edit(ReviewList $reviewList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReviewList  $reviewList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReviewList $reviewList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReviewList  $reviewList
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReviewList $reviewList)
    {
        //
    }
}
