@extends('profile')

@section('inner')

    <div class="wrap-profile-content">
        @php
            $count = auth()->user()->vip ?
             \App\User::VIP_FEEDBACKS_COUNT :
             \App\User::NON_VIP_FEEDBACKS_COUNT
        @endphp
        @if(auth()->user()
            ->reviews()
            ->where('created_at', '>', \Carbon\Carbon::now()->startOfDay())
            ->count() < $count && auth()->user()->gender == \App\User::GENDER_MALE)
            <div class="btn-green tapes-else make-feedback" onclick="openFeedbackForm({{$user->id}})"><a href="#">Оставить отзыв</a></div>
        @endif
        <div class="title title_margin title_small title_margin-big">Отзывы</div>
        <feedbacks :list="{{$feedbacks}}" :user_id="{{$user->id}}"></feedbacks>
    </div>
@endsection
@section('scripts')

@endsection

