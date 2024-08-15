<!-- post -->
<div class="post post-list-sm circle">
    <div class="thumb circle">
        <a href="{{ route('blog.view', $blog->slug) }}">
            <div class="inner">
                <span class="inner-text bd-font">{{ $key }}</span>
            </div>
        </a>
    </div>
    <div class="details clearfix">
        <h2 class="my-0 bd-font fw-bolder" style="font-size: 18px"><a href="{{ route('blog.view', $blog->slug) }}"
                style="color: #203656">{{ $blog->title }}
                @if ($blog->created_at->diffInDays(now()) <= 7)
                    <span class="badge-new">New</span>
                @endif
            </a></h6>
            <ul class="meta list-inline mt-1 mb-0">
                <li class="list-inline-item">{{ $blog->gettingDate() }}</li>
            </ul>
    </div>
</div>
