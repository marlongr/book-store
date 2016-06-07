<div clas="row">
    <h3 class="text-muted col-sm-2">Shoppvel - Área Administrativa</h3>
    <nav>
        <ul class="nav nav-justified">
            <li class="active"><a href="{{url('/')}}">Home</a></li>
            <li><a href="{{route('admin.pedidos')}}">Pedidos</a></li>
            <li><a href="{{route('sobre')}}">Sobre</a></li>            

            @if (Auth::guest())
            <li><a href="{{ url('/login') }}">Login</a></li>
            @else
            <li class="small">
                <a href="{{route('admin.dashboard')}}">
                    {{ Auth::user()->name }}
                </a>
            </li>
            <li>
                <a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
            </li>
            @endif

        </ul>
    </nav>
</div>

<hr class="clearfix"/>
