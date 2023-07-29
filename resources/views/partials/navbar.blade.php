<nav
    class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow"
>
    <button
        id="sidebarToggleTop"
        class="btn btn-link d-md-none rounded-circle mr-3"
    >
        <i class="fa fa-bars"></i>
    </button>
    <form
        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search"
    >
        <div class="input-group">
            <input
                type="text"
                class="form-control bg-light border-0 small"
                placeholder="Search for..."
                aria-label="Search"
                aria-describedby="basic-addon2"
            />
            <div class="input-group-append">
                <button class="btn btn-success" type="button">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown no-arrow d-sm-none">
            <div
                class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown"
            >
                <form class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                        <input
                            type="text"
                            class="form-control bg-light border-0 small"
                            placeholder="Search for..."
                            aria-label="Search"
                            aria-describedby="basic-addon2"
                        />
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>
        <div class="topbar-divider d-none d-sm-block"></div>
        <li class="nav-item dropdown no-arrow">
            @auth
            <a
                class="nav-link dropdown-toggle"
                href="#"
                id="userDropdown"
                role="button"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
            >
                <span
                    class="mr-2 d-none d-lg-inline text-gray-600 small"
                    >{{Auth::user()->name}}</span
                >
                <img
                    class="img-profile rounded-circle"
                    src="{{ asset('img/undraw_profile.svg') }}"
                />
            </a>
            @else
            <a
                class="nav-link dropdown-toggle"
                href="#"
                id="userDropdown"
                role="button"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
            >
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"
                    >Use</span
                >
                <img
                    class="img-profile rounded-circle"
                    src="img/undraw_profile.svg"
                />
            </a>

            @endauth
            <div
                class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown"
            >
                <a class="dropdown-item" href="{{ url('edit-profile') }}">
                    <i class="fas fa-edit fa-sm fa-fw mr-2 text-gray-400"></i>
                    Edit Profile
                </a>
                <form
                    action="{{ url('/logout') }}"
                    class="dropdown-item"
                    method="post"
                    style="cursor: pointer"
                >
                    @csrf
                    <button class="border-0 bg-transparent p-0">
                        <i
                            class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"
                        ></i>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </li>
    </ul>
    <div
        class="modal fade"
        id="logoutModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Ready to Leave?
                    </h5>
                    <button
                        class="close"
                        type="button"
                        data-dismiss="modal"
                        aria-label="Close"
                    >
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    Select "Logout" below if you are ready to end your current
                    session.
                </div>
                <div class="modal-footer">
                    <button
                        class="btn btn-secondary"
                        type="button"
                        data-dismiss="modal"
                    >
                        Cancel
                    </button>
                    <a class="btn btn-primary" href="/login">Logout</a>
                </div>
            </div>
        </div>
    </div>
</nav>
