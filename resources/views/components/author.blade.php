<div class="container">
    <div class="dropdown mt-5">
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Authors List
        </button>
        <ul class="dropdown-menu">
            @foreach ($authors as $author)
                <li>
                    <a class="dropdown-item"
                        href="/?author={{ $author->slug }}{{ request('search') ? '&search=' . request('search') : '' }}">{{ $author->username }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>

</div>
