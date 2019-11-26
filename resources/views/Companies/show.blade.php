@extends('Layouts.master')

@section('contenido')
<section class="container">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary">
               <div class="box-header with-border">
                    <h1 >Cliente</h1>
              </div>
              <!-- /.box-header -->

             
                <div class="box-body">
                    
                    @if ($objCompany->logo)
                    <img src="{{ $objCompany->logo }}" class="img-fluid">
                    @endif
                    <p><strong>Name:</strong> {{ $objCompany->name }}</p>
                    <p><strong>Email:</strong> {{ $objCompany->email }}</p>
                    <p><strong>WebSite:</strong> {{ $objCompany->website }}</p>
                    
                </div>

                <div class="box-footer">

                    <a class="btn btn-primary" href="{{ route('company.index') }}" role="button">Regresar</a>
                </div>
            </div>
            <!-- /.box -->

        </div>

    </section>
@endsection

