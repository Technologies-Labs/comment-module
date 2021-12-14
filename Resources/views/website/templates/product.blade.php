<div class="comment-area product mt-5">
    <h4 class="comment-title">Feedback</h4>

    <ul class="comments">
        @foreach ($comments as $comment)
        <li>
            <div class="comment-box">
                <div class="commenter-photo">
                    <img alt="" src="{{ asset('storage') }}/{{$comment->user->image}}">
                </div>
                <div class="commenter-meta">
                    <div class="comment-titles">
                        <h6><a title=""
                                href="{{ route('user.profile', ['name' => $comment->user]) }}">{{$comment->user->name}}</a>
                        </h6>
                        <span>{{$comment->created_at->diffForHumans()}}</span>
                    </div>
                    <p>
                        {{$comment->content}}

                    </p>
                </div>
            </div>
        </li>
        @endforeach

    </ul>

    <div class="add-comment">
        <form wire:submit.prevent="addComment" method="post" class="c-form">
            <textarea wire:model.defer='content' rows="4" placeholder="اكتب تعليقاً..."></textarea>
            <button class="main-btn" type="submit">تعليق</button>
        </form>
    </div>
    @include('components.loading')
</div>

