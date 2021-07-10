@php $user = Auth::guard('web')->user(); @endphp

<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <i class="mdi mdi-dots-horizontal"></i>
                    <span class="hide-menu">
                        {{ $user->first_name }}
                        <span class="badge badge-info">{{ $user->language ? $user->language->name : '' }}</span>
                    </span>
                </li>

                @if ($user->can('dashboard.view'))
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('admin.index') }}" aria-expanded="false">
                        <i class="mdi mdi-creation"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                @endcan

                @if ($user->can('admin.view') || $user->can('admin.create') || $user->can('role.view') || $user->can('role.create'))
                <li class="sidebar-item ">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="mdi mdi-account"></i>
                        <span class="hide-menu">Users & Roles </span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level {{ (Route::is('admin.admins.index') || Route::is('admin.admins.create') || Route::is('admin.admins.edit')) ? 'in' : null }}">
                        @if ($user->can('admin.view'))
                        <li class="sidebar-item">
                            <a href="{{ route('admin.admins.index') }}" class="sidebar-link {{ (Route::is('admin.admins.index') || Route::is('admin.admins.edit')) ? 'active' : null }}">
                                <i class="mdi mdi-view-list"></i>
                                <span class="hide-menu"> User List </span>
                            </a>
                        </li>
                        @endcan

                        @if ($user->can('admin.create'))
                        <li class="sidebar-item">
                            <a href="{{ route('admin.admins.create') }}" class="sidebar-link {{ Route::is('admin.admins.create') ? 'active' : null }}">
                                <i class="mdi mdi-plus-circle"></i>
                                <span class="hide-menu"> New User </span>
                            </a>
                        </li>
                        @endcan

                        @if ($user->can('role.view'))
                        <li class="sidebar-item">
                            <a href="{{ route('admin.roles.index') }}" class="sidebar-link {{ Route::is('admin.roles.index') ? 'active' : null }}">
                                <i class="mdi mdi-view-quilt"></i>
                                <span class="hide-menu"> Roles </span>
                            </a>
                        </li>
                        @endcan

                        @if ($user->can('role.create'))
                        <li class="sidebar-item">
                            <a href="{{ route('admin.roles.create') }}" class="sidebar-link {{ Route::is('admin.roles.create') ? 'active' : null }}">
                                <i class="mdi mdi-plus-circle"></i>
                                <span class="hide-menu"> New Role </span>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcan

                @if ($user->can('category.view') || $user->can('category.create'))
                <li class="sidebar-item ">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="mdi mdi-tune"></i>
                        <span class="hide-menu">Categories </span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level {{ (Route::is('admin.categories.index') || Route::is('admin.categories.create') || Route::is('admin.categories.edit')) ? 'in' : null }}">
                        @if ($user->can('category.view'))
                        <li class="sidebar-item">
                            <a href="{{ route('admin.categories.index') }}" class="sidebar-link {{ (Route::is('admin.categories.index') || Route::is('admin.categories.edit')) ? 'active' : null }}">
                                <i class="mdi mdi-view-list"></i>
                                <span class="hide-menu"> Category List </span>
                            </a>
                        </li>
                        @endif

                        @if ($user->can('category.create'))
                        <li class="sidebar-item">
                            <a href="{{ route('admin.categories.create') }}" class="sidebar-link {{ Route::is('admin.categories.create') ? 'active' : null }}">
                                <i class="mdi mdi-plus-circle"></i>
                                <span class="hide-menu"> New Category </span>
                            </a>
                        </li>
                        @endif
                    </ul>
                </li>
                @endif

                @if ($user->can('page.view') || $user->can('page.create') || $user->can('translation.page'))
                <li class="sidebar-item ">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="mdi mdi-tag-text-outline"></i>
                        <span class="hide-menu">Article/Pages </span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level {{ (Route::is('admin.pages.index') || Route::is('admin.pages.create') || Route::is('admin.pages.edit')) ? 'in' : null }}">
                        @if ($user->can('page.view'))
                        <li class="sidebar-item">
                            <a href="{{ route('admin.pages.index') }}" class="sidebar-link {{ (Route::is('admin.pages.index') || Route::is('admin.pages.edit')) ? 'active' : null }}">
                                <i class="mdi mdi-view-list"></i>
                                <span class="hide-menu"> Article/Page List </span>
                            </a>
                        </li>
                        @endif

                        @if ($user->can('page.create'))
                        <li class="sidebar-item">
                            <a href="{{ route('admin.pages.create') }}" class="sidebar-link {{ Route::is('admin.pages.create') ? 'active' : null }}">
                                <i class="mdi mdi-plus-circle"></i>
                                <span class="hide-menu"> New Article/Page </span>
                            </a>
                        </li>
                        @endif

                        @if ($user->can('translation.page'))
                        <li class="sidebar-item">
                            <a href="{{ route('admin.pages.translation.create') }}" class="sidebar-link {{ Route::is('admin.pages.translation.create') ? 'active' : null }}">
                                <i class="mdi mdi-view-list"></i>
                                <span class="hide-menu"> Article/Page Translation </span>
                            </a>
                        </li>
                        @endif
                    </ul>
                </li>
                @endif

                @if ($user->can('word.view') || $user->can('word.create'))
                <li class="sidebar-item ">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="mdi mdi-view-list"></i>
                        <span class="hide-menu">Words </span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level {{ (Route::is('admin.words.index') || Route::is('admin.words.create') || Route::is('admin.words.edit')) ? 'in' : null }}">
                        @if ($user->can('word.view'))
                        <li class="sidebar-item">
                            <a href="{{ route('admin.words.index') }}" class="sidebar-link {{ (Route::is('admin.words.index') || Route::is('admin.words.edit')) ? 'active' : null }}">
                                <i class="mdi mdi-view-list"></i>
                                <span class="hide-menu"> Word List </span>
                            </a>
                        </li>
                        @endif

                        @if ($user->can('word.create'))
                        <li class="sidebar-item">
                            <a href="{{ route('admin.words.create') }}" class="sidebar-link {{ Route::is('admin.words.create') ? 'active' : null }}">
                                <i class="mdi mdi-plus-circle"></i>
                                <span class="hide-menu"> New Word </span>
                            </a>
                        </li>
                        @endif
                    </ul>
                </li>
                @endif

                @if ($user->can('sentence.view') || $user->can('sentence.create'))
                <li class="sidebar-item ">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="mdi mdi-widgets"></i>
                        <span class="hide-menu">Sentences </span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level {{ (Route::is('admin.sentences.index') || Route::is('admin.sentences.create') || Route::is('admin.sentences.edit')) ? 'in' : null }}">
                        @if ($user->can('sentence.view'))
                        <li class="sidebar-item">
                            <a href="{{ route('admin.sentences.index') }}" class="sidebar-link {{ (Route::is('admin.sentences.index') || Route::is('admin.sentences.edit')) ? 'active' : null }}">
                                <i class="mdi mdi-view-list"></i>
                                <span class="hide-menu"> Sentence List </span>
                            </a>
                        </li>
                        @endif

                        @if ($user->can('sentence.create'))
                        <li class="sidebar-item">
                            <a href="{{ route('admin.sentences.create') }}" class="sidebar-link {{ Route::is('admin.sentences.create') ? 'active' : null }}">
                                <i class="mdi mdi-plus-circle"></i>
                                <span class="hide-menu"> New Sentence </span>
                            </a>
                        </li>
                        @endif
                    </ul>
                </li>
                @endif

                @if ($user->can('translation.create') || $user->can('translation.edit'))
                <li class="sidebar-item ">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="mdi mdi-view-list"></i>
                        <span class="hide-menu">Translation </span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level {{ (Route::is('admin.translations.create') || Route::is('admin.words.create') || Route::is('admin.words.edit')) ? 'in' : null }}">
                        @if ($user->can('translation.create'))
                        <li class="sidebar-item">
                            <a href="{{ route('admin.translations.create') }}" class="sidebar-link {{ (Route::is('admin.translations.create') || Route::is('admin.words.edit')) ? 'active' : null }}">
                                <i class="mdi mdi-view-list"></i>
                                <span class="hide-menu"> New Translation </span>
                            </a>
                        </li>
                        @endif
                    </ul>
                </li>
                @endif

                @if ($user->can('advertisement.view') || $user->can('advertisement.create'))
                <li class="sidebar-item ">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="mdi mdi-coin"></i>
                        <span class="hide-menu">Advertisements </span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level {{ (Route::is('admin.advertisements.index') || Route::is('admin.advertisements.create') || Route::is('admin.advertisements.edit')) ? 'in' : null }}">
                        @if ($user->can('advertisement.view'))
                        <li class="sidebar-item">
                            <a href="{{ route('admin.advertisements.index') }}" class="sidebar-link {{ (Route::is('admin.advertisements.index') || Route::is('admin.advertisements.edit')) ? 'active' : null }}">
                                <i class="mdi mdi-view-list"></i>
                                <span class="hide-menu"> Advertisement List </span>
                            </a>
                        </li>
                        @endif

                        @if ($user->can('advertisement.create'))
                        <li class="sidebar-item">
                            <a href="{{ route('admin.advertisements.create') }}" class="sidebar-link {{ Route::is('admin.advertisements.create') ? 'active' : null }}">
                                <i class="mdi mdi-plus-circle"></i>
                                <span class="hide-menu"> New Advertisement </span>
                            </a>
                        </li>
                        @endif
                    </ul>
                </li>
                @endif

                @if ($user->can('blog.view') || $user->can('blog.create'))
                    <li class="sidebar-item ">
                        <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                            <i class="mdi mdi-view-list"></i>
                            <span class="hide-menu">Blogs </span>
                        </a>
                        <ul aria-expanded="false" class="collapse first-level {{ (Route::is('admin.blogs.index') || Route::is('admin.blogs.create') || Route::is('admin.blogs.edit')) ? 'in' : null }}">
                            @if ($user->can('blog.view'))
                                <li class="sidebar-item">
                                    <a href="{{ route('admin.blogs.index') }}" class="sidebar-link {{ (Route::is('admin.blogs.index') || Route::is('admin.blogs.edit')) ? 'active' : null }}">
                                        <i class="mdi mdi-view-list"></i>
                                        <span class="hide-menu"> Blog List </span>
                                    </a>
                                </li>
                            @endif

                            @if ($user->can('blog.create'))
                                <li class="sidebar-item">
                                    <a href="{{ route('admin.blogs.create') }}" class="sidebar-link {{ Route::is('admin.blogs.create') ? 'active' : null }}">
                                        <i class="mdi mdi-plus-circle"></i>
                                        <span class="hide-menu"> New Blog </span>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif


                @if ($user->can('contact.view') || $user->can('contact.create'))
                    <li class="sidebar-item ">
                        <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                            <i class="mdi mdi-view-list"></i>
                            <span class="hide-menu">Contact Message </span>
                        </a>
                        <ul aria-expanded="false" class="collapse first-level {{ (Route::is('admin.contacts.index') || Route::is('admin.contacts.create') || Route::is('admin.contacts.edit')) ? 'in' : null }}">
                            @if ($user->can('contact.view'))
                                <li class="sidebar-item">
                                    <a href="{{ route('admin.contacts.index') }}" class="sidebar-link {{ (Route::is('admin.contacts.index') || Route::is('admin.blogs.edit')) ? 'active' : null }}">
                                        <i class="mdi mdi-view-list"></i>
                                        <span class="hide-menu"> Message List </span>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif

                {{-- <li class="nav-small-cap">
                    <i class="mdi mdi-dots-horizontal"></i>
                    <span class="hide-menu">Extra</span>
                </li> --}}


                <!-- @if ($user->can('translation.create') || $user->can('translation.edit')) -->
                <li class="sidebar-item ">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="mdi mdi-settings"></i>
                        <span class="hide-menu">Settings </span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level {{ (Route::is('admin.languages.index') || Route::is('admin.languages.create') || Route::is('admin.languages.edit') || Route::is('admin.languages.connection.index')) ? 'in' : null }}">
                        <li class="sidebar-item">
                            <a href="{{ route('admin.languages.index') }}" class="sidebar-link {{ ( Route::is('admin.languages.index') || Route::is('admin.languages.create') || Route::is('admin.languages.edit')) ? 'active' : null }}">
                                <i class="mdi mdi-plus-circle"></i>
                                <span class="hide-menu"> Languages </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            @if ($user->can('language.connections'))
                                <a href="{{ route('admin.languages.connection.index') }}" class="sidebar-link {{ (Route::is('admin.languages.connection.index')) ? 'active' : '' }}">
                                    <i class="mdi mdi-sync"></i>
                                    <span class="hide-menu"> Language Connections </span>
                                </a>
                            @endif
                        </li>
                    </ul>
                </li>
                <!-- @endif -->

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('admin.logout') }}"  onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();" aria-expanded="false">
                        <i class="mdi mdi-directions"></i>
                        <span class="hide-menu">Log Out</span>
                    </a>
                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
