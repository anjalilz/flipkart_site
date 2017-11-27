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

        {{ Form::open(['route'=>'admin.update','class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'enctype' => "multipart/form-data"]) }}
        {{ Form::hidden('id', $books->id) }}
        {{ Form::hidden('featured', $books->featured) }}
        <div class="box-body">
            <div class="form-group <?php if ($errors->first('title')) echo ' has-error'; ?>">
                <div class="col-sm-2 align-right">
                    {{ Form::label('title', 'Title',array('class'=>'control-label')) }}
                </div>
                <div class="col-sm-10">
                    {{ Form::text('title', $books->title, array('class' => 'form-control','max-length' => '100', 'required')) }}
                    <span class="help-block">{{ $errors->first('title') }}</span>
                </div>
            </div>

            <div class="form-group <?php if ($errors->first('description')) echo ' has-error'; ?>">
                <div class="col-sm-2 align-right">
                    {{ Form::label('description', 'Description',array('class'=>'control-label')) }}
                </div>
                <div class="col-sm-10">
                    {{ Form::textarea('description', $books->description, array('class' => 'form-control ckeditor','max-length' => '100', 'required')) }}
                    <span class="help-block">{{ $errors->first('description') }}</span>
                </div>
            </div>

            <div class="form-group <?php if ($errors->first('price')) echo ' has-error'; ?>">
                <div class="col-sm-2 align-right">
                    {{ Form::label('price', 'Price',array('class'=>'control-label')) }}
                </div>
                <div class="col-sm-10">
                    {{ Form::number('price', $books->price, array('class' => 'form-control','max-length' => '100', 'required')) }}
                    <span class="help-block">{{ $errors->first('price') }}</span>
                </div>
            </div>

            <div class="form-group <?php if ($errors->first('image')) echo ' has-error'; ?>">
                <div class="row">
                    <div class="col-sm-2 align-right">
                        {{ Form::label('image','Image', ['class' => 'col-lg-2 control-label']) }}
                    </div>
                    <div class="col-sm-10">
                        <div class="col-sm-10">
                            @if(isset($books->image))
                            <input type="file" name="image" class="control-label-input"/>
                            @else
                            <input type="file" name="image" class="control-label-input" required/>
                            @endif
                            <span class="help-block">{{ $errors->first('image') }}</span>
                        </div>

                        @if(isset($books->image))
                        <div class="col-sm-10 voc">
                            <img src="{{ URL::to('/uploads').'/'.$books->image }}" class="img-responsive"/>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="form-group <?php if ($errors->first('instock')) echo ' has-error'; ?>">
                <div class="col-sm-2 align-right">
                    {{ Form::label('instock', 'Instock',array('class'=>'control-label')) }}
                </div>
                <div class="col-sm-10">
                    {{ Form::number('instock', $books->instock, array('class' => 'form-control','required')) }}
                    <span class="help-block">{{ $errors->first('instock') }}</span>
                </div>
            </div>
<!--            <div class="form-group <?php // if ($errors->first('featured')) echo ' has-error';   ?>">
                <div class="col-sm-2 align-right">
                    {{ Form::label('featured', 'Featured',array('class'=>'control-label')) }}
                </div>
                <div class="col-sm-10">
                    {{ Form::radio('featured',$books->featured, true,array('class' => 'field', 'required' => 'required')) }} True<br>
                    {{ Form::radio('featured',$books->featured, false, array('class' => 'field', 'required' => 'required')) }} False
                    <span class="help-block">{{ $errors->first('featured') }}</span>
                </div>
            </div>-->
        </div>
        <div class="pull-left">
            {{ link_to_route('admin.dashboard', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger']) }}
        </div><!--pull-left-->
        <div class="pull-right">
            {{ Form::submit('Update', ['class' => 'btn btn-success']) }}
        </div>
        {{ Form::close() }}

    </div><!-- /.box-body -->
</div><!--box box-success-->
@endsection