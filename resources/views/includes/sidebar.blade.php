<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('index_page') }}" class="nav-link">
                        <i class="nav-icon fas fa-columns"></i>
                        <p>
                            Все тексты
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('user_index_page') }}" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Мои тексты
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-plus-square"></i>
                        <p>
                            Новый текст
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('create_page')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Создать текст</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
