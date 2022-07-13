<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
            <span class="align-middle">MCF CARREER</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Pages
            </li>

            <li class="sidebar-item active">
                <a class="sidebar-link" href="">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item ">
                <a class="sidebar-link" href="">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Boursiers</span>
                </a>
            </li>
            <li class="sidebar-item ">
                <a class="sidebar-link" href="">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Ecoles</span>
                </a>
            </li>
            <li class="sidebar-item ">
                <a class="sidebar-link" href="">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Secteurs</span>
                </a>

                <a class="sidebar-link" href="{{ route('secteurs.create') }}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Nouveau secteur</span>
                </a>

                <a class="sidebar-link" href="{{ route('secteurs.index') }}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Liste des secteurs</span>
                </a>
            </li>



        </ul>


    </div>
</nav>
