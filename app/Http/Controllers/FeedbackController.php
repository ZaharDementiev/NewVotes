<?php

namespace App\Http\Controllers;

use App\Feedback;
use App\Payment;
use App\Transaction;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth');
    }

    public function store(Request $request, $id)
    {
        $feedback = new Feedback();
        $feedback->user_id = auth()->user()->id;
        $feedback->text = $request->input('text');

        $feedback->points = $request->input('rating');
        $feedback->positive = $request->input('think');
        $feedback->to_id = $id;

        $user = User::find($id);
        if ($feedback->positive) {
            $user->rating += 10;
        } else {
            $user->rating -= 10;
        }
        $user->save();
        $feedback->save();

        return redirect()->back();
    }

    public function loadFeedbacks(Request $request, User $user)
    {
        $feedbacks = $user->feedbacks()
            ->whereNotIn('id', $request->input('ids'))
            ->orderBy('id', 'DESC')
            ->limit(10)
            ->get();
        return response()->json($feedbacks, 200);
    }
}

