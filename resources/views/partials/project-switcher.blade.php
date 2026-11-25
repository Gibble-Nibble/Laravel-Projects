<div class="nav-item dropdown">
    <button class="nav-link dropdown-toggle border-0 bg-transparent" type="button" id="projectSwitcher" data-bs-toggle="dropdown" aria-expanded="false">
        Switch project
    </button>
    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="projectSwitcher">
        <li><a class="dropdown-item" href="{{ route('tfa5.home') }}">TFA5 - POS App</a></li>
        <li><a class="dropdown-item" href="{{ route('tfa6.home') }}">TFA6 - Eloquent POS App</a></li>
        <li><a class="dropdown-item" href="{{ route('tfa7.home') }}">TFA7 - Editable POS App</a></li>
        <li><a class="dropdown-item" href="{{ route('tfa8.home') }}">TFA8 - Authenticated POS App</a></li>
        <li><a class="dropdown-item" href="{{ route('tsa3.home') }}">TSA3 - Tasks for Today</a></li>
        <li><a class="dropdown-item" href="{{ route('tsa4.home') }}">TSA4 - Task Management</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="{{ route('projects.index') }}">All projects</a></li>
    </ul>
</div>
