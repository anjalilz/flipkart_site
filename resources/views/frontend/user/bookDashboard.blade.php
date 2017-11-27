@extends('frontend.layouts.app')

@section('content')


{{ Form::open(['route'=>'frontend.user.dashboard','class' => 'navbar-form', 'role' => 'search', 'method' => 'get']) }}

<div class="input-group">
    <input type="text" name="search" placeholder="Search by Book Title..." class="form-control" style="width: 400px;">
    <span class="input-group-btn">
        <button class="btn btn-default" type="submit">
            <i class="glyphicon glyphicon-search"></i>
        </button>
    </span>
</div>
<div class="show" style="float: right">
    <a href="{{ route('frontend.user.showCart') }}" class="label label-info" style="font-size: 19px;">Show Cart</a>
</div><br><br><br>
{{ Form::close() }}


<div class="col-sm-12">
    <div class="books">
        @foreach($books as $book)
        <div class="col-sm-3 ">

            <div><h4><b style="color: darkred">Book Name:</b> <i> {{$book->title}}</i></h4></div>
            <div>
                <img src="{{ URL::to('/uploads').'/'.$book->image }}" class="img-responsive" class="avatar" width="80%" alt=""/>
            </div>
            <div><h5><b style="color: darkred">Price:</b> {{$book->price}} Rs.</h5>
                <a href="{{ route('frontend.user.addtoCart',$book->id) }}" class="label label-primary" style="font-size: 15px;">Add to Cart</a>
            </div>

        </div><!--row-->
        @endforeach
    </div>
</div>
@endsection
