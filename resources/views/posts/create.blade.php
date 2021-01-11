

<h1 class="font-thin text 4x1">文章</h1>

@if($errors->any())
    <div style="background-color:red;border-radius: 25px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('posts.store') }}" method="POST">
    @csrf

    <div class="field my-2">
        <label for="">標題</label>
        <input type="text" value="{{old('title')}}" name="title" class="border border-gray-300 p-2">
    </div>
    <br>
    <div class="field my-2">
        <label for="">內文</label>
        <textarea name="content" cols="30" rows="10" class="border border-gray-300 p-2">{{old('content')}}</textarea>
    </div>
    <br>
    <div class="actions">
        <button type="submit" class="px-3 py-1 rounded bg-gray-200 hover bg-gray-300">新增文章</button>
    </div>
</form>






