<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{ route('accueil') }}">
            <span class="align-middle">MCF CARREER</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Pages
            </li>

            <li class="sidebar-item active">
                <a class="sidebar-link" href="{{ route('dashboard') }}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a href="#boursier" data-bs-toggle="collapse" class="sidebar-link collapsed" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users align-middle"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                    <span class="align-middle">Boursiers</span>
                </a>
                <ul id="boursier" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar" style="">
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ route('ecoles.index') }}"><i class="fa-solid fa-align-justify"></i> Liste des boursiers</a></li>

                </ul>
            </li>

            <li class="sidebar-item">
                <a href="#ecole" data-bs-toggle="collapse" class="sidebar-link collapsed" aria-expanded="false">
                    <i class="fa-solid fa-building-user"></i>
                    <span class="align-middle">Ecoles</span>
                </a>
                <ul id="ecole" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar" style="">
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ route('ecoles.create') }}"><i class="fa-solid fa-plus"></i> Nouvelle école</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ route('ecoles.index') }}"><i class="fa-solid fa-align-justify"></i> Liste des écoles</a></li>

                </ul>
            </li>

            <li class="sidebar-item">
                <a href="#secteur" data-bs-toggle="collapse" class="sidebar-link collapsed" aria-expanded="false">
                    <i class="fa-solid fa-lines-leaning"></i>
                    <span class="align-middle">Secteurs</span>
                </a>
                <ul id="secteur" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar" style="">
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ route('secteurs.create') }}"><i class="fa-solid fa-plus"></i> Nouveau secteur</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ route('secteurs.index') }}"><i class="fa-solid fa-align-justify"></i> Liste des secteurs</a></li>

                </ul>
            </li>

            <li class="sidebar-item ">
                <a class="sidebar-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i><span class="align-middle">Deconnexion</span>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                    {{ csrf_field() }}
                </form>
            </li>


        </ul>


    </div>
</nav>
