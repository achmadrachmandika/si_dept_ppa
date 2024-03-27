<h1>HALAMAN USER BIASA</h1>
<a href="{{ route('logout') }}" class="nav-link"
    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    <i class="nav-icon fas fa-sign-out-alt"></i>
    <p>Logout</p>
</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>