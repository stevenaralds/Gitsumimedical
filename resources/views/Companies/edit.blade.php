@extends('Layouts.master')

@section('contenido')
<section class="content">
        <div class="row">
            
            {!! Form::model($objCompany, ['route' => ['company.update', $objCompany->id], 'method' => 'PUT','files'=>true]) !!}
                <!-- left column -->
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit Company</h3>
                        </div>
                        <!-- /.box-header -->
    
                        @include('Companies.partials.info')
                        @include('Companies.partials.error')
    
                        <!-- form start -->
    
                        <div class="box-body">
                            @include('Companies.partials.form')
    
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
    
                </div>
                <!-- /.col (right) -->
    
            {!! Form::close() !!}
        </div>
    </section>
@endsection