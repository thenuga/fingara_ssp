<style>
    .navbar {
        background-color: #2a66a1; /* black background */
    }

    .navbar-nav .nav-link {
        color: #ffffff !important; /* white text */
    }

    .navbar-toggler-icon {
        background-color: #ffffff; /* white color for the toggler icon */
    }
</style>

<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">{{config('app.name')}}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                @auth()
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('logout')}}">Logout</a>
                    </li>

                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('login')}}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('registration')}}">Registration</a>
                    </li>

                @endauth
            </ul>
            <span class="navbar-text">@auth{{auth()->user()->name}}@endauth
            </span>
        </div>
    </div>
</nav>
