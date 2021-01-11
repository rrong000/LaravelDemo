<ul class="navbar-nav ml-auto" style="float: right; border-style: double;padding:10px;list-style:none;">
    <!-- Authentication Links -->
    @guest
        @if (Route::has('login'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
        @endif

        @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
        @endif
    @else
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
    @endguest
</ul>

<h1 class="font-thin text 4x1">文章列表</h1>

    <a href="{{route('posts.create')}}"  style="text-decoration:none;">新增文章</a>


@if(session()->has ('notice'))
<div style="background-color:pink;border-radius: 25px;">
    {{session()->get('notice')}}
</div>
@endif

@foreach ($posts as $post)
    <div style="border-bottom: 1px solid gray;">
        <h2>
            <a href="{{route('posts.show',$post)}}"  style="text-decoration:none;">
            {{$post->title}}
            </a>
        </h2>
        <p>
            {{$post->created_at}} 由{{$post->user->name}} 分享
        </p>
        <div style="display: flex;">
            <a  href="{{route('posts.edit',['post'=>$post->id])}}"  style="text-decoration:none;">編輯</a>

            <form action="{{ route('posts.destroy',$post) }}" method="POST">
                @csrf
                @method('delete')
                <button type="submit" style="background-color: red;margin:3px;font">刪除</button>
            </form>
        </div>
    </div>
@endforeach
