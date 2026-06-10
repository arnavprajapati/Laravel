    <!-- @if ($errors->any())
        @foreach($errors->all() as $err)
            <li style="color: red">{{$err}}</li>
        @endforeach
    @endif -->

    <form action="/submit" method="POST">
        @csrf
        <input type="text" name="name" placeholder="enter name" value="{{old('name')}}">
        @if($errors->has('age'))
            <span style="color: red;">
                {{$errors->first('age')}}
            </span>
        @endif
        <input type="number" name="age" placeholder="enter age"  value="{{old('age')}}">
        <input type="email" name="email" placeholder="enter email" value="{{old('email')}}">
        <button>Submit</button>
    </form>