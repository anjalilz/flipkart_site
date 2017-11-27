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

        {{ Form::open(['route'=>'admin.save','class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'enctype' => "multipart/form-data"]) }}
        <div class="box-body">
            <div class="form-group <?php if ($errors->first('title')) echo ' has-error'; ?>">
                <div class="col-sm-2 align-right">
                    {{ Form::label('title', 'Title',array('class'=>'control-label')) }}
                </div>
                <div class="col-sm-10">
                    {{ Form::text('title', null, array('class' => 'form-control','max-length' => '100', 'required')) }}
                    <span class="help-block">{{ $errors->first('title') }}</span>
                </div>
            </div>

            <div class="form-group <?php if ($errors->first('description')) echo ' has-error'; ?>">
                <div class="col-sm-2 align-right">
                    {{ Form::label('description', 'Description',array('class'=>'control-label')) }}
                </div>
                <div class="col-sm-10">
                    {{ Form::textarea('description', null, array('class' => 'form-control ckeditor','max-length' => '100', 'required')) }}
                    <span class="help-block">{{ $errors->first('description') }}</span>
                </div>
            </div>

            <div class="form-group <?php if ($errors->first('price')) echo ' has-error'; ?>">
                <div class="col-sm-2 align-right">
                    {{ Form::label('price', 'Price',array('class'=>'control-label')) }}
                </div>
                <div class="col-sm-10">
                    {{ Form::number('price', null, array('class' => 'form-control','max-length' => '100', 'required')) }}
                    <span class="help-block">{{ $errors->first('price') }}</span>
                </div>
            </div>

            <div class="form-group <?php if ($errors->first('image')) echo ' has-error'; ?>">
                <div class="col-sm-2 align-right">
                    {{ Form::label('image', 'Image',array('class'=>'control-label')) }}
                </div>
                <div class="col-sm-10">
                    {{ Form::file('image', null, array('class' => 'form-control', 'required')) }}
                    <span class="help-block">{{ $errors->first('image') }}</span>
                </div>
            </div>

            <div class="form-group <?php if ($errors->first('instock')) echo ' has-error'; ?>">
                <div class="col-sm-2 align-right">
                    {{ Form::label('instock', 'Instock',array('class'=>'control-label')) }}
                </div>
                <div class="col-sm-10">
                    {{ Form::number('instock', null, array('class' => 'form-control','required')) }}
                    <span class="help-block">{{ $errors->first('instock') }}</span>
                </div>
            </div>

            <div class="form-group <?php if ($errors->first('featured')) echo ' has-error'; ?>">
                <div class="col-sm-2 align-right">
                    {{ Form::label('featured', 'Featured',array('class'=>'control-label')) }}
                </div>
                <div class="col-sm-10">
                    {{ Form::radio('featured',1, true ,null, array('class' => 'field', 'required')) }} True<br>
                    {{ Form::radio('featured',0, false,null, array('class' => 'field', 'required')) }} False
                    <span class="help-block">{{ $errors->first('featured') }}</span>
                </div>
            </div>
        </div>
        <div class="pull-left">
            {{ link_to_route('admin.dashboard', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger']) }}
        </div><!--pull-left-->
        <div class="pull-right">
            {{ Form::submit('Add Books', ['class' => 'btn btn-success']) }}
        </div>

        {{ Form::close() }}

    </div><!-- /.box-body -->
</div><!--box box-success-->
@endsection