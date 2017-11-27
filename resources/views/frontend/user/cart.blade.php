@extends('frontend.layouts.app')

@section('content')
@if(isset($book))
<div class="box box-success">
    <div class="box-header with-border">
        <h2 class="box-title"><a href="#"><u>Cart</u></a></h2>
    </div><!-- /.box-header -->
    <div class="box-body">

        <div class="table-responsive">
            <table id="marketing-table" class="table table-condensed table-hover">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Title</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $rate = 0; ?>
                    @foreach($book as $val)
                    <?php $rate += $val->price; ?>
                    <tr>
                        <td>{{ $val->id }}</td>
                        <td>{{ $val->title }}</td>
                        <td>{{ $val->price }}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="2"><b>Total</b></td>
                        <td colspan="4"><b>Rs. {{ $rate }}</b></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <a href="{{ route('frontend.user.orderPlace',$rate) }}" class="label label-info" style="font-size: 18px;">Order</a>
</div>
@endif
@endsection