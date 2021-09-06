<li class="nav-item">
    <a href="{{ route('firstScaffolds.index') }}"
       class="nav-link {{ Request::is('firstScaffolds*') ? 'active' : '' }}">
        <p>First  Scaffolds</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('secondScaffolds.index') }}"
       class="nav-link {{ Request::is('secondScaffolds*') ? 'active' : '' }}">
        <p>Second  Scaffolds</p>
    </a>
</li>


