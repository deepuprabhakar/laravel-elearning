@extends('app')

@section('meta')
    <meta name="_token" content="{!! csrf_token() !!}"/>
    <meta name="description" content="Your description">
    <meta name="keywords" content="Your keywords">
    <meta name="author" content="Your name">
    <meta name="format-detection" content="telephone=no"/>
    <title>E-learning - {{ $news['title'] }}</title>
@stop

@section('style')
    {{ Html::style('plugins/datepicker/datepicker3.css') }}
    {!! Html::style('plugins/select2/select2.min.css') !!}
@stop

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Edit - {{ str_limit($news['title'], 20) }}
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('/') }}"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
      <li><a href="{{ route('admin.news.index') }}">News</a></li>
      <li class="active">Edit News</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content" style="min-height: 700px;">
    <div class="row">
      <div class="col-md-offset-1 col-md-10">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">News Form</h3>
            <div class="box-tools pull-right">
              <a href="{{ route('admin.news.show', $news['slug']) }}" class="btn btn-primary btn-sm" title="Edit">
                <i class="fa fa-file-text-o" aria-hidden="true"></i> Preview
              </a>
            </div>
          </div><!-- /.box-header -->
          <!-- form start -->
          {!! Form::model($news, ['url' => route('admin.news.update', $news['hashid']), 'autocomplete' => 'off', 'id' => 'news-form', 'method' => 'PATCH', 'files' => true]) !!}
            @include('forms.news', ['button' => 'Update News','flag' => true])
          {!! Form::close() !!}<!-- /.Form ends -->
        </div><!-- /.box -->
      </div>
    </div> 
  </section><!-- ./section -->  
</div><!-- ./Content Wrapper -->  
@stop

@section('script')
    <!-- FastClick -->
    {!! Html::script('plugins/fastclick/fastclick.min.js') !!}
    <!-- Select 2 -->
    {!! Html::script('plugins/select2/select2.full.min.js') !!}
    <!-- Datepicker -->
    {{ Html::script('plugins/datepicker/bootstrap-datepicker.js') }}
    <!-- App -->
    {!! Html::script('dist/js/app.min.js') !!}
    {!! Html::script('dist/js/script.js') !!}
    <!--Tinymc-->
    <script src='//cdn.tinymce.com/4/tinymce.min.js'></script>
    
    <script>
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });
    </script>
    <script>
      var old = "{{ $news['batch'] }}";
    </script>
    {!! Html::script('dist/js/custom/createNews.js') !!}
@stop