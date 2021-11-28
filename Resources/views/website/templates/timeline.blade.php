<div class="new-comment" style="display: none;" wire:ignore.self>
    <form wire:submit.prevent="addComment">
        <input wire:model.defer='content' type="text" required placeholder="write comment">
        <button type="submit"><i class="icofont-paper-plane"></i></button>
    </form>
    <div class="comments-area">
        <ul>
            @foreach ($comments as $comment)
            <li>
                <figure><img alt="" src="{{ asset('storage') }}/{{$comment->user->image}}">
                </figure>
                <div class="commenter">
                    <h5><a title="" href="{{ route('user.profile', ['name' => $comment->user]) }}">{{$comment->user->name}}</a></h5>
                    <span>{{$comment->created_at->diffForHumans()}}</span>
                    <p>{{$comment->content}}</p>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
    @include('components.loading')
</div>
