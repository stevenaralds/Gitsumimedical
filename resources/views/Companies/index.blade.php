@extends('Layouts.master')

@section('contenido')

    <section  class="main container p-5">
        <div id="main" class="row">
            <div class="col-12">
                <div class="col-xs-12">
                    <h1 class="page-header">Companies</h1>
                </div>
                <a href="{{ route('company.create') }}" class="btn btn-primary pull-right">New Company</a>
                <div class="table-responsive">
          
                        <div id="alert" class="alert alert-info ">
        
                        </div>
                          @include('Companies.partials.info')
                      <table class="table table-bordered table-hover">
                        <thead>
                          <tr>        
                            <th>Logo</th>
                            <th >Name</th>
                            <th >Email</th>
                            <th >Website</th>  
                            <th></th>
                                 
                          </tr>
                        </thead>
                        <tbody>
                            
                                  {{-- <tr v-for="item in lists">
                                      <td> @{{ item.name }} </td>
                                      <td> @{{ item.email }} </td>
                                      <td width="20px">
                                          <a href="{{ route('company.show', @{{item.id}}) }}" title="Ver" class="btn btn-primary glyphicon glyphicon-eye-open"></a>
                                          <a href="{{ route('company.edit',  @{{item.id}}) }}" title="Editar" class="btn btn-warning glyphicon glyphicon-edit"></a>
                    
                                      </td>
                                  </tr> --}}
                          @foreach($objCompany as $item)
        
                            <tr>
                               
                                <td width="30px">
                                    @if ($item->logo)
                                    <img src="{{ $item->logo }}" class="img-fluid">
                                    @endif
                                </td>
                                <td width="200px">{{ $item->name }}</td>
                                <td width="200px">{{ $item->email }}</td>
                                <td width="200px">{{ $item->website }}</td>
        
                              <td width="20px">
                                  <a href="{{ route('company.show', $item->id) }}" title="Ver" class="btn btn-primary far fa-eye"></a>
                                         
                              </td>
                              <td width="20px">                                   
                                    <a href="{{ route('company.edit', $item->id) }}" title="Editar" class="btn btn-warning far fa-edit"></a>          
                                </td>
        
        
                              <td width="10px">
                                {!! Form::open(['route' => ['company.destroy', $item->id], 'method' => 'DELETE', 'id' => 'form-borrar']) !!}
                                    <button type="button" title="Eliminar" class="btn  btn-danger btn-delete">
                                        <span class="far fa-trash-alt"></span>
                                        
                                    </button>
                                {!! Form::close() !!}
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                  </div>
            </div>
           
        </div>

        {{-- <div id="main">
                <ul>
                    <li v-for="item in lists">
                        @{{ item.name }}
                     </li>
                </ul>
            </div> --}}
    </section>
    {{-- <script type="text/javascript">
        var urlCompanies = 'company';
        new Vue({
            el: '#main',
            created: function(){
                this.getCompanies();
            },
            data:{
                lists: []
            },
            methods:{
                getCompanies: function(){
                    axios.get(urlCompanies).then(response => {
                        this.lists=response.data
                        console.log(response)
                    });
                    
                }
            }
        });
    </script>   --}}
   
    @endsection
    @section('scripts')
    <script>
            $(document).ready(function () {
    
                $('#alert').hide();
    
                $('.btn-delete').click(function (e) {
                    e.preventDefault();
                    if(confirm('¿Está seguro que desea borrar la empresa?')){
                        var row     = $(this).parents('tr');
                        var form    = $(this).parents('form');
                        var url     = form.attr('action');
                        $('#alert').show();
    
                        // por el metodo pos se envia la url, el formulario y la funcion con los parametros
                        $.post(url, form.serialize(), function(result){
                            row.fadeOut();
                            // alert(result.mensaje);// cuadro de mensaje msgbox
                            $('#alert').html(result.mensaje);// se muestra en el form
    
    
                        }).fail(function () {
                            //alert('El usuario no fue eliminado');
                            $('#alert').html(" la empresa no fue eliminada algo salió mal");
                            row.show();
                        });
                    }
                });
            });
    
    
        </script> 
    @endsection


    


  


