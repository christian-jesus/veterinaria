<!-- Heading -->
<h6 class="navbar-heading text-muted">
  @if (auth()->user()->role == 'admin')
  Management
  @else
  Menu
  @endif
</h6>

<ul class="navbar-nav">

  @if (auth()->user()->role == 'admin')
    <li class="nav-item active">
        <a class="nav-link active" href="/home">
            <i class="fas fa-laptop text-danger"></i> Start
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/Specialties') }}">
            <i class="	fas fa-user-secret text-blue"></i> Specialties
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/medicos">
            <i class="fas fa-user-md text-info"></i> Doctors
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/pacientes">
            <i class="	fas fa-heartbeat warning"></i> Patients
        </a>
    </li>
    @elseif(auth()->user()->role == 'doctor')
    <li class="nav-item">
        <a class="nav-link" href="/horario">
            <i class="	ni ni-calendar-grid-58 text-primary"></i> Manage attention
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="">
            <i class="	fas fa-band-aid"></i> Consultation to attend
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="">
            <i class="	fas fa-heartbeat warning"></i> Patients
        </a>
    </li>
    @else 
    <li class="nav-item">
        <a class="nav-link" href="/reservarcitas/create">
            <i class="	fas fa-file-medical text-primary"></i> Book consultation
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/miscitas">
            <i class="	fas fa-file-medical-alt"></i> My Inquiries
        </a>

    @endif

    <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('formLogout').submit();">
            <i class="fas fa-sign-in-alt"></i> Sign off 👋
        </a>
        <form action="{{ route('logout') }}" method="POST" style="display: none;" id="formLogout">
            @csrf
        </form>
    </li>
</ul>

@if (auth()->user()->role == 'admin')
    <!-- Divider -->
    <hr class="my-3" />
    <!-- Heading -->
    <h6 class="navbar-heading text-muted">Reports</h6>
    <!-- Navigation -->
    <ul class="navbar-nav mb-md-3">
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fas fa-file-medical-alt text-default"></i> Quotes
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="	fas fa-id-card-alt text-warning"></i> Medical performance
            </a>
        </li>

    </ul>
@endif
