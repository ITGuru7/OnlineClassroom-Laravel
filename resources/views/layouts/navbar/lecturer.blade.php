<nav class="navbar navbar-expand-lg navbar-light w-100 bg-primary">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link px-4" href="{{ url('lecturer/profile') }}"><i class="fa fa-user"></i> Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link px-4" href="{{ route('lecturer.courses.index') }}"><i class="fa fa-file"></i> Courses</a>
      </li>
      <li class="nav-item">
        <a class="nav-link px-4" href="{{ route('lecturer.students.index') }}"><i class="fa fa-user"></i> Students</a>
      </li>
      {{-- <li class="nav-item">
        <a class="nav-link px-4" href="javascript:void(0)"><i class="fa fa-question-circle"></i> Quizzes/Final Exams</a>
      </li> --}}
      {{-- <li class="nav-item">
        <a class="nav-link px-4" href="javascript:void(0)"><i class="fa fa-image"></i> Media</a>
      </li> --}}
      {{-- <li class="nav-item">
        <a class="nav-link px-4" href="javascript:void(0)"><i class="fa fa-commit"></i> Commissions</a>
      </li>
      <li class="nav-item">
        <a class="nav-link px-4" href="javascript:void(0)"><i class="fa fa-check"></i> Grade Essays</a>
      </li>
      <li class="nav-item">
        <a class="nav-link px-4" href="javascript:void(0)"><i class="fa fa-arrow-alt-circle-right"></i> </a>
      </li> --}}
    </ul>
  </div>
</nav>
