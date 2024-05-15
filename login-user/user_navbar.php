<!-- navbar.php -->
<nav class="navbar navbar-expand-lg navbar-light bg-primary">
    <a class="navbar-brand" href="#">Tuto Learn</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="user_home.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="user_course.php">Courses</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="user_about.php">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="user_contact.php">Contact</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="user_profile.php">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="enrolled_pages.php?uid=$uid">Enrolled Course</a>
            </li>
        </ul>

        <form class="form-inline my-2 my-lg-0 mr-auto">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search">
                <div class="input-group-btn">
                    <button class="btn btn-default" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </form>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="user_logout.php">Logout</a>
            </li>
        </ul>
    </div>
</nav>
