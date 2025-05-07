<nav class="navbar navbar-expand-lg fixed-top" style="background-color: #404040;">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('dashboard') }}" style=" color: #fff;">MyKesibukan</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}" style=" color: #fff;">Dashboard</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('pengelolaan') }}" style=" color: #fff;">Pengelolaan</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('profile') }}" style=" color: #fff;">Profile</a></li>
        </ul>
      </div>
    </div>
  </nav>
