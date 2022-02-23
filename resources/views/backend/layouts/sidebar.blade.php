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
            <li class="nav-item" data-item="comments">
                <a class="nav-item-hold" href="datatables.html">
                    <i class="nav-icon i-File-Horizontal-Text"></i>
                    <span class="nav-text">Commentaires</span>
                </a>
                <div class="triangle"></div>
            </li>
            <li class="nav-item" data-item="sessions">
                <a class="nav-item-hold" href="#">
                    <i class="nav-icon i-Administrator"></i>
                    <span class="nav-text">Sessions</span>
                </a>
                <div class="triangle"></div>
            </li>
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
                    <span class="nav-text">Doc</span>
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
        {{-- <div class="submenu-area" data-parent="dashboard">
            <header>
                <h6>Dashboards</h6>
                <p>Lorem ipsum dolor sit.</p>
            </header>
            <ul class="childNav">
                <li class="nav-item">
                    <a href="dashboard1.html">
                        <i class="nav-icon i-Clock-3"></i>
                        <span class="item-name">Version 1</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="dashboard2.html">
                        <i class="nav-icon i-Clock-4"></i>
                        <span class="item-name">Version 2</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="dashboard3.html">
                        <i class="nav-icon i-Over-Time"></i>
                        <span class="item-name">Version 3</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="dashboard4.html">
                        <i class="nav-icon i-Clock"></i>
                        <span class="item-name">Version 4</span>
                    </a>
                </li>
            </ul>
        </div> --}}
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
                {{-- <li class="nav-item">
                    <a href="form.input.group.html">
                        <i class="nav-icon i-Receipt-4"></i>
                        <span class="item-name">Input Groups</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="form.validation.html">
                        <i class="nav-icon i-Close-Window"></i>
                        <span class="item-name">Form Validation</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="smart.wizard.html">
                        <i class="nav-icon i-Width-Window"></i>
                        <span class="item-name">Smart Wizard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="tag.input.html">
                        <i class="nav-icon i-Tag-2"></i>
                        <span class="item-name">Tag Input</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="editor.html">
                        <i class="nav-icon i-Pen-2"></i>
                        <span class="item-name">Rich Editor</span>
                    </a>
                </li> --}}
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
                {{-- <li class="nav-item">
                    <a href="{{route('publication.create')}}">
                        <i class="nav-icon i-Split-Vertical"></i>
                        <span class="item-name">Ajouter une publication</span>
                    </a>
                </li> --}}
                {{-- <li class="nav-item">
                    <a href="form.input.group.html">
                        <i class="nav-icon i-Receipt-4"></i>
                        <span class="item-name">Input Groups</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="form.validation.html">
                        <i class="nav-icon i-Close-Window"></i>
                        <span class="item-name">Form Validation</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="smart.wizard.html">
                        <i class="nav-icon i-Width-Window"></i>
                        <span class="item-name">Smart Wizard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="tag.input.html">
                        <i class="nav-icon i-Tag-2"></i>
                        <span class="item-name">Tag Input</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="editor.html">
                        <i class="nav-icon i-Pen-2"></i>
                        <span class="item-name">Rich Editor</span>
                    </a>
                </li> --}}
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
                {{-- <li class="nav-item">
                    <a href="{{route('equipe.create')}}">
                        <i class="nav-icon i-Email"></i>
                        <span class="item-name">Ajouter un employer</span>
                    </a>
                </li> --}}
                {{-- <li class="nav-item">
                    <a href="chat.html">
                        <i class="nav-icon i-Speach-Bubble-3"></i>
                        <span class="item-name">Chat</span>
                    </a>
                </li> --}}
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
                {{-- <li class="nav-item">
                    <a href="ladda.button.html">
                        <i class="nav-icon i-Loading-2"></i>
                        <span class="item-name">Ladda Buttons</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="toastr.html">
                        <i class="nav-icon i-Bell"></i>
                        <span class="item-name">Toastr</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="sweet.alerts.html">
                        <i class="nav-icon i-Approved-Window"></i>
                        <span class="item-name">Sweet Alerts</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="tour.html">
                        <i class="nav-icon i-Plane"></i>
                        <span class="item-name">User Tour</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="upload.html">
                        <i class="nav-icon i-Data-Upload"></i>
                        <span class="item-name">Upload</span>
                    </a>
                </li> --}}
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
                {{-- <li class="nav-item">
                    <a href="badges.html">
                        <i class="nav-icon i-Medal-2"></i>
                        <span class="item-name">Badges</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="buttons.html">
                        <i class="nav-icon i-Cursor-Click"></i>
                        <span class="item-name">Buttons</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="cards.html">
                        <i class="nav-icon i-Line-Chart-2"></i>
                        <span class="item-name">Cards</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="card.metrics.html">
                        <i class="nav-icon i-ID-Card"></i>
                        <span class="item-name">Card Metrics</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="carousel.html">
                        <i class="nav-icon i-Video-Photographer"></i>
                        <span class="item-name">Carousels</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="lists.html">
                        <i class="nav-icon i-Belt-3"></i>
                        <span class="item-name">Lists</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pagination.html">
                        <i class="nav-icon i-Arrow-Next"></i>
                        <span class="item-name">Paginations</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="popover.html">
                        <i class="nav-icon i-Speach-Bubble-2"></i>
                        <span class="item-name">Popover</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="progressbar.html">
                        <i class="nav-icon i-Loading"></i>
                        <span class="item-name">Progressbar</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="tables.html">
                        <i class="nav-icon i-File-Horizontal-Text"></i>
                        <span class="item-name">Tables</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="tabs.html">
                        <i class="nav-icon i-New-Tab"></i>
                        <span class="item-name">Tabs</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="tooltip.html">
                        <i class="nav-icon i-Speach-Bubble-8"></i>
                        <span class="item-name">Tooltip</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="modals.html">
                        <i class="nav-icon i-Duplicate-Window"></i>
                        <span class="item-name">Modals</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="nouislider.html">
                        <i class="nav-icon i-Width-Window"></i>
                        <span class="item-name">Sliders</span>
                    </a>
                </li> --}}
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