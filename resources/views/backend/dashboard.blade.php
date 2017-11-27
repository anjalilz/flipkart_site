@extends('backend.layouts.app')

@section('page-header')
<h1>
    {{ app_name() }}
    <small>{{ trans('strings.backend.dashboard.title') }}</small>
</h1>
@endsection

@section('content')
<div class="box box-success">
    <div class="box-header with-border">
        <h3 class="box-title">{{ trans('strings.backend.dashboard.welcome') }} {{ $logged_in_user->name }}!</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div><!-- /.box tools -->
    </div><!-- /.box-header -->
    <div class="box-body">
        <!--{!! trans('strings.backend.welcome') !!}-->

        <div class="pull-right">
            <a href="{{ route('admin.addBooks') }}" class="btn btn-primary">Add New Book</a>
        </div><br>

        <div class="box-body">
            <div class="table-responsive">
                <table id="marketing-table" class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>{{ trans('labels.general.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($books) && !empty ($books))
                        @foreach($books->all() as $book)
                        <tr>
                            <td>{{ $book->id }}</td>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->description }}</td>
                            <td>{{ $book->price }}</td>
                            <td>
                                <a href="{{ route('admin.edit',$book->id) }}" class="label label-success"><i class="fa fa-pencil"></i></a>
                                <a href="{{ route('admin.delete',$book->id) }}" class="label label-danger"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                        @endif

                    </tbody>
                </table>
            </div>
        </div>



    </div><!-- /.box-body -->
</div><!--box box-success-->







<!--    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('history.backend.recent_history') }}</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div> /.box tools 
        </div> /.box-header 
        <div class="box-body">
            {!! history()->render() !!}
        </div> /.box-body 
    </div>box box-success-->
@endsection