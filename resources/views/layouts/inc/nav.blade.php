<!-- Navbar -->
<nav class="navbar navbar-expand-sm navbar-dark bg-dark p-0">
    <div class="container">
        <a href="" class="navbar-brand">ABNATION</a>
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
                <li class="nav-item dropdown mr-2 user">
                    <a href="#" class="nav-link" data-toggle="dropdown">
                        <i class="fa fa-bell text-white">&nbsp;&nbsp;
                            <span class="badge badge-danger pending">12</span>
                        </i>
                    </a>
                 
                </li>   
                <div id="messages">
                     
                </div>
                    
            </ul>



            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown mr-3">
                    <a href="" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <i class="fas fa-user"></i> Welcome
                    </a>
                    <div class="dropdown-menu">
                        <a href="" class="dropdown-item"><i class="fas fa-user-circle"></i> Profile
                        </a>
                        <a href="" class="dropdown-item"><i class="fas fa-cog"></i> Settings
                        </a>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="{{route('logout')}}" class="nav-link"><i class="fas fa-user-times"></i> Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav> 