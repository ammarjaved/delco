<aside class="main-sidebar sidebar-dark-primary" style="background-color:#558772">

    <a href="{{ route('site_survey.index') }}" class="brand-link">
        <img src="{{ asset('assets/web-images/main-logo-sm.png') }}" alt="AdminLTE Logo" class="brand-image "
            style="opacity: .8">
        <span class="brand-text font-weight-light" style="font-size: 19px !important">Delco</span>
    </a>


    <div class="sidebar">

        <div class="user-panel mt-2 pb-2 mb-2 d-flex">

            <!-- <div class="info text-center">
                <a href="#" class=" text-center ml-4">Nav links</a>
            </div> -->
        </div>



        <nav class="mt-2">
            

            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                @if (Auth::user()->type === true)



                <li
                        class="nav-item">
                        <a href="{{ route('delco-summary') }} " class="nav-link">
                            <i class="fa fa-book"></i>
                            <p>
                                Delco Summary
                                
                            </p>
                        </a>
                        
                    </li>
                    <li
                        class="nav-item {{ Request::route()->getName() === 'site_survey.create' || Request::route()->getName() === 'site_survey.index' ? 'menu-is-opening menu-open' : '' }}">
                        <a href="#" class="nav-link">
                            <i class="fa fa-book"></i>
                            <p>
                                Site Data Collections
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('site_survey.create') }}"
                                    class="nav-link {{ Request::route()->getName() === 'site_survey.create' ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Create</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('site_survey.index') }}"
                                    class="nav-link {{ Request::route()->getName() === 'site_survey.index' ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>index</p>
                                </a>
                            </li>

                            {{-- <li class="nav-item">
                                <a href="{{ route('material-selection.show') }}"
                                    class="nav-link {{ Request::route()->getName() === 'material-selection.show' ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Show Material Selection</p>
                                </a>
                            </li> --}}
                            
                        </ul>
                    </li>

                    <li
                        class="nav-item {{ Request::route()->getName() === 'estimation-work.create' || Request::route()->getName() === 'estimation-work.index' ? 'menu-is-opening menu-open' : '' }}">
                        <a href="#" class="nav-link">
                            <i class="fas fa-copy"></i>
                            <p>
                                Estimation Work
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            {{-- <li class="nav-item">
                                <a href="{{ route('estimation-work.create') }}"
                                    class="nav-link {{ Request::route()->getName() === 'estimation-work.create' ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Create</p>
                                </a>
                            </li> --}}
                            <li class="nav-item">
                                <a href="{{ route('material-selection.format') }}"
                                   class="nav-link {{ Request::route()->getName() === 'material-selection.format' ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>index</p>
                                </a>
                            </li>
                            
                            
                        </ul>
                    </li>


                    <li
                    class="nav-item {{ Request::route()->getName() === 'pre-cabling.create' || Request::route()->getName() === 'pre-cabling.index' ? 'menu-is-opening menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="fa fa-book"></i>
                        <p>
                            Pre Cabling
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        {{-- <li class="nav-item">
                            <a href="{{ route('pre-cabling.create') }}"
                                class="nav-link {{ Request::route()->getName() === 'pre-cabling.create' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li> --}}
                        <li class="nav-item">
                            <a href="{{ route('pre-cabling.index') }}"
                                class="nav-link {{ Request::route()->getName() === 'pre-cabling.index' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>index</p>
                            </a>
                        </li>

                        
                        
                    </ul>
                </li>



                <li
                class="nav-item {{ Request::route()->getName() === 'pre-cabling.create' || Request::route()->getName() === 'pre-cabling.index' ? 'menu-is-opening menu-open' : '' }}">
                <a href="#" class="nav-link">
                    <i class="fa fa-book"></i>
                    <p>
                        Image Shutdown
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('image-shutdown.index') }}"
                           class="nav-link {{ Request::route()->getName() === 'image-shutdown.index' ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Index</p>
                        </a>
                    </li>
                </ul>
                
            </li>



            <li
                class="nav-item {{ Request::route()->getName() === 'pre-cabling.create' || Request::route()->getName() === 'pre-cabling.index' ? 'menu-is-opening menu-open' : '' }}">
                <a href="#" class="nav-link">
                    <i class="fa fa-book"></i>
                    <p>
                        SAT
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
             
          {{-- <a href="{{ route('sat.index') }}" class="nav-link">
    <i class="far fa-circle nav-icon"></i>
    <p>Index</p>
   </a> --}}


   <ul class="nav nav-treeview">
    <li class="nav-item">
        <a href="{{ route('sat.index') }}"
           class="nav-link ">
            <i class="far fa-circle nav-icon"></i>
            <p>Index</p>
        </a>
    </li>
</ul>                
 </li>


 <li
                class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fa fa-book"></i>
                    <p>
                        LKS
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
             
          {{-- <a href="{{ route('sat.index') }}" class="nav-link">
    <i class="far fa-circle nav-icon"></i>
    <p>Index</p>
   </a> --}}


   <ul class="nav nav-treeview">
    <li class="nav-item">
        <a href="{{ route('LKS.index') }}"
           class="nav-link ">
            <i class="far fa-circle nav-icon"></i>
            <p>Index</p>
        </a>
    </li>
</ul>                
 </li>



                @endif




            </ul>
        </nav>



    </div>

</aside>
<style>
    .nav-link p {
        color: #FFFFFF !important;
    }

    .nav-item p:hover,
    .nav-item i:hover,
    nav .active i,
    nav .active p {
        color: #FFFFFF !important;
    }

    nav .active {
        background-color: rgb(99 99 99 / 46%) !important;
    }
</style>
