<div class="container">
    <div class="dropdown mt-5">
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Categories List
        </button>
        <ul class="dropdown-menu">
            @foreach ($categories as $category)
                <li>
                    <a class="dropdown-item" href="/categories/{{ $category->slug }}">{{ $category->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>

</div>
