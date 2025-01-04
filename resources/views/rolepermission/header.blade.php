<nav class="navbar navbar-expand-lg bg-body-tertiary mb-3">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <h5> Welcome {{ auth()->user()->name }}</h5>
                </li>

                @if(Auth::user()->hasPermissionTo('Roles.view'))

                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/designations">Roles</a>
                </li>
                @endif


                {{-- <li class="nav-item">
                    <a class="nav-link" href="/permissions">Permissions</a>
                </li> --}}
                @if(Auth::user()->hasPermissionTo('Users.view'))
                <li class="nav-item">
                    <a class="nav-link" href="/users">Users</a>
                </li>
                @endif

                @if(Auth::user()->hasPermissionTo('Assets.view'))
                <li class="nav-item">
                    <a class="nav-link" href="/assets">Assets</a>
                </li>
                @endif

                <li class="nav-item">
                    <a class="nav-link" href="/profile">Profile</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/logout">Logout</a>
                </li>

            </ul>
        </div>
    </div>
</nav>
