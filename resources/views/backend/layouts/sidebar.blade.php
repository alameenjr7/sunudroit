<div class="side-content-wrap">
    <div class="sidebar-left open rtl-ps-none" data-perfect-scrollbar data-suppress-scroll-x="true">
        <ul class="navigation-left">
            <li class="nav-item ">
                <a class="nav-item-hold active" href="{{route('admin')}}">
                    <i class="nav-icon i-Bar-Chart"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
                <div class="triangle"></div>
            </li>
            <li class="nav-item " data-item="uikits">
                <a class="nav-item-hold" href="#">
                    <i class="nav-icon i-Library"></i>
                    <span class="nav-text">Banniere</span>
                </a>
                <div class="triangle"></div>
            </li>
            <li class="nav-item" data-item="extrakits">
                <a class="nav-item-hold" href="#">
                    <i class="nav-icon i-Suitcase"></i>
                    <span class="nav-text">Categories</span>
                </a>
                <div class="triangle"></div>
            </li>
            <li class="nav-item" data-item="apps">
                <a class="nav-item-hold" href="#">
                    <i class="nav-icon i-Computer-Secure"></i>
                    <span class="nav-text">Consultations</span>
                </a>
                <div class="triangle"></div>
            </li>
            <li class="nav-item" data-item="forms">
                <a class="nav-item-hold" href="#">
                    <i class="nav-icon i-File-Clipboard-File--Text"></i>
                    <span class="nav-text">Forms</span>
                </a>
                <div class="triangle"></div>
            </li>
            <li class="nav-item" data-item="infos">
                <a class="nav-item-hold" href="#">
                    <i class="nav-icon i-File-Clipboard-File--Text"></i>
                    <span class="nav-text">Forms</span>
                </a>
                <div class="triangle"></div>
            </li>
            <li class="nav-item" data-item="comments">
                <a class="nav-item-hold" href="datatables.html">
                    <i class="nav-icon i-File-Horizontal-Text"></i>
                    <span class="nav-text">Commentaires</span>
                </a>
                <div class="triangle"></div>
            </li>
            {{-- <li class="nav-item" data-item="sessions">
                <a class="nav-item-hold" href="#">
                    <i class="nav-icon i-Administrator"></i>
                    <span class="nav-text">Sessions</span>
                </a>
                <div class="triangle"></div>
            </li> --}}
            <li class="nav-item" data-item="others">
                <a class="nav-item-hold" href="#">
                    <i class="nav-icon i-Double-Tap"></i>
                    <span class="nav-text">Others</span>
                </a>
                <div class="triangle"></div>
            </li>
            <li class="nav-item" >
                <a class="nav-item-hold" href="{{route('contrats.index')}}">
                    <i class="nav-icon i-Safe-Box1"></i>
                    <span class="nav-text">Contrat</span>
                </a>
                <div class="triangle"></div>
            </li>
        </ul>
    </div>
    <div class="sidebar-left-secondary rtl-ps-none" data-perfect-scrollbar data-suppress-scroll-x="true">
        <i class="sidebar-close i-Close" (click)="toggelSidebar()"></i>
        <header>
            <div class="logo" >
                <img src="{{asset(get_setting('logo'))}}" alt="" style="height: 70px; width: 130px;">
            </div>
        </header>
        <!-- Submenu Dashboards -->
        <div class="submenu-area" data-parent="infos">
            <header>
                <h6>Infos Pratiques</h6>
                <p>Lorem ipsum dolor sit.</p>
            </header>
            <ul class="childNav">
                <li class="nav-item">
                    <a href="{{route('info_pratique.index')}}">
                        <i class="nav-icon i-File-Clipboard-Text--Image"></i>
                        <span class="item-name">Infos Pratiques</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('info_pratique.create')}}">
                        <i class="nav-icon i-Split-Vertical"></i>
                        <span class="item-name">Ajouter une Information</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="submenu-area" data-parent="forms">
            <header>
                <h6>Publications</h6>
                <p>Lorem ipsum dolor sit.</p>
            </header>
            <ul class="childNav">
                <li class="nav-item">
                    <a href="{{route('publication.index')}}">
                        <i class="nav-icon i-File-Clipboard-Text--Image"></i>
                        <span class="item-name">Liste des publications</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('publication.create')}}">
                        <i class="nav-icon i-Split-Vertical"></i>
                        <span class="item-name">Ajouter une publication</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="submenu-area" data-parent="comments">
            <header>
                <h6>Commentaires</h6>
                <p>Lorem ipsum dolor sit.</p>
            </header>
            <ul class="childNav">
                <li class="nav-item">
                    <a href="{{route('commentaires.index')}}">
                        <i class="nav-icon i-File-Clipboard-Text--Image"></i>
                        <span class="item-name">Liste des commentaires</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="submenu-area" data-parent="apps">
            <header>
                <h6>Consultations</h6>
                <p>Lorem ipsum dolor sit.</p>
            </header>
            <ul class="childNav">
                <li class="nav-item">
                    <a href="{{route('consultation.index')}}">
                        <i class="nav-icon i-Add-File"></i>
                        <span class="item-name">Liste des Consultation</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="submenu-area" data-parent="extrakits">
            <header>
                <h6>Categories</h6>
                <p>Lorem ipsum dolor sit.</p>
            </header>
            <ul class="childNav">
                <li class="nav-item">
                    <a href="{{route('categorie.index')}}">
                        <i class="nav-icon i-Crop-2"></i>
                        <span class="item-name">Liste des Categories</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('categorie.create')}}">
                        <i class="nav-icon i-Loading-3"></i>
                        <span class="item-name">Ajouter une Categories</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="submenu-area" data-parent="uikits">
            <header>
                <h6>Bannieres</h6>
                <p>Lorem ipsum dolor sit.</p>
            </header>
            <ul class="childNav">
                <li class="nav-item">
                    <a href="{{route('banniere.index')}}">
                        <i class="nav-icon i-Bell1"></i>
                        <span class="item-name">Liste des Bannieres</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('banniere.create')}}">
                        <i class="nav-icon i-Split-Horizontal-2-Window"></i>
                        <span class="item-name">Ajouter une Banniere</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="submenu-area" data-parent="sessions">
            <header>
                <h6>Session Pages</h6>
                <p>Lorem ipsum dolor sit.</p>
            </header>
            <ul class="childNav">
                <li class="nav-item">
                    <a href="../sessions/signin.html">
                        <i class="nav-icon i-Checked-User"></i>
                        <span class="item-name">Sign in</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../sessions/signup.html">
                        <i class="nav-icon i-Add-User"></i>
                        <span class="item-name">Sign up</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../sessions/forgot.html">
                        <i class="nav-icon i-Find-User"></i>
                        <span class="item-name">Forgot</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="submenu-area" data-parent="others">
            <header>
                <h6>Settings</h6>
                <p>Lorem ipsum dolor sit.</p>
            </header>
            <ul class="childNav" data-parent="">
                <li class="nav-item">
                    <a href="{{route('settings')}}">
                        <i class="nav-icon i-Error-404-Window"></i>
                        <span class="item-name">Settings</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="user.profile.html">
                        <i class="nav-icon i-Male"></i>
                        <span class="item-name">User Profile</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="blank.html">
                        <i class="nav-icon i-File-Horizontal"></i>
                        <span class="item-name">Blank Page</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>