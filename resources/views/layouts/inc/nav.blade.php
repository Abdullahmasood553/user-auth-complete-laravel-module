<!-- Navbar -->
<nav class="navbar navbar-expand-sm navbar-dark bg-dark p-0">
    <div class="container">
        <a href="" class="navbar-brand">{{ Str::ucfirst(Auth::user()->fname) }}</a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav">
                <li class="nav-item px-2">
                    <a href="" class="nav-link active">Dashboard</a>
                </li>
            </ul>


            <ul class="navbar-nav mr-auto">
                @foreach($notifications as $key)
                <li class="nav-item dropdown mr-2" id="{{ $key->id }}">
                    <a href="#" class="nav-link" data-toggle="dropdown">
                        <i class="fa fa-bell text-white">
                            @if($key->unread)
                            <span class="badge badge-danger pending">{{ $key->unread }}</span>
                            @endif
                        </i>
                    </a>
                </li>   
                @endforeach 
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="{{route('logout')}}" class="nav-link"><i class="fas fa-user-times"></i> Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav> 