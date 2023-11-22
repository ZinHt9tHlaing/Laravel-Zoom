<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">Creative Coder</a>
        <div class="d-flex mx-4">

            <ul class="navbar-nav mx-4">
                <li class="nav-item">
                    <a href="/" class="nav-link active  text-primary">Home</a>
                </li>
            </ul>

            <ul class="navbar-nav mx-4">
                <li class="nav-item">
                    <a href="/#blogs" class="nav-link  text-primary">Blogs</a>
                </li>
            </ul>

            @if (auth()->check())
                <form action="/logout" method="POST">
                    @csrf
                    <div class="mx-4">
                        <button class="btn btn-danger">Logout</button>
                    </div>
                </form>
            @else
                <ul class="navbar-nav mx-4">
                    <li class="nav-item">
                        <a href="/login" class="btn btn-primary rounded-pill text-white">Log In</a>
                    </li>
                </ul>
                <ul class="navbar-nav mx-4">
                    <li class="nav-item">
                        <a href="/register" class="btn btn-secondary text-white">Register</a>
                    </li>
                </ul>
            @endif
            < </div>
        </div>
</nav>
