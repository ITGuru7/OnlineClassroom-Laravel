<nav class="navbar navbar-expand-lg navbar-light w-100 bg-primary">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link px-4" href="{{ url('student/profile') }}"><i class="fa fa-user"></i> Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link px-4" href="{{ route('student.courses.index') }}"><i class="fa fa-file"></i> Courses</a>
      </li>
    </ul>
  </div>
</nav>
