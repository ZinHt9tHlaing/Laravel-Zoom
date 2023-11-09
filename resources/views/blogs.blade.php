<x-layout>
    <div class="container">
        <div class="my-3 w-25 m-auto">
            <form action="/" class="input-group d-flex shadow">
                <input type="search" class="form-control me-1 border-2 border-info" width="50px" name="search" value="{{ request('search') }}"
                    placeholder="Search Here...">
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>

        @forelse ($blogs as $blog)
            <h1><a href="/blogs/{{ $blog->slug }}">{{ $blog->title }}</a></h1>
            <p>{{ substr($blog->body, 0, 100) }}...</p>
            <p>Category - <a href="/categories/{{ $blog->category->slug }}">{{ $blog->category->name }}</a></p>
            <p>Author - <a href="/users/{{ $blog->author->username }}">{{ $blog->author->name }}</a></p>
        @empty
            <p class="text-danger fs-2 text-center my-5">No blogs found!</p>
        @endforelse


    </div>

</x-layout>
