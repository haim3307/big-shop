<header class="row align-items-center justify-content-between" id="nav-header"
        style="padding: 10px; margin: 0;">
    <div class=" g-col-md-7">
        <ul>


            <li id="welcome" class="d-lg-block">
                @if($user = Auth::user())
                    Welcome back
                    @if($user->isAdministrator())
                        Admin -
                    @endif
                    <strong>{{ucwords($user->name)}}</strong>
                @endif

            </li>

        </ul>
    </div>
    <div class="g-col-md-2 d-flex">

        <nav class="navbar bg-faded d-sm-none">
            <button style="height: 40px;" class="navbar-toggler" type="button"
                    data-toggle="collapse" data-target="#side-menu" aria-controls="side-menu"
                    aria-expanded="false" aria-label="Toggle navigation">
                <i class="

                        fa fa-bars fa-lg"></i>
            </button>

        </nav>
        <span class="d-grid align-items-center" style="padding: 0 20px;">
                        <form action="{{url('logout')}}" method="POST">
                            {{csrf_field()}}
                            <label for="submit" class="d-block" style="min-width: 70px; margin-bottom: 0;" href="">
                                <span class="link">
                                    <i class="fa fa-sign-out" aria-hidden="true"></i>
                                    <span>Logout</span>
                                    <input type="submit" id="submit" class="d-none">
                                </span>
                            </label>
                        </form>
                    </span>

    </div>
</header>