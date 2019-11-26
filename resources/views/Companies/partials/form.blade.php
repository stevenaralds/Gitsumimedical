

<div class="form-group">
    {{ Form::label('logo', 'Logo') }}
    {{ Form::file('logo') }}
</div>
<div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
    </div>
<div class="form-group">
    {{ Form::label('email', 'Email') }}
    {{ Form::text('email', null, ['class' => 'form-control', 'id' => 'email']) }}
</div>
<div class="form-group">
    {{ Form::label('website', 'Website') }}
    {{ Form::text('website', null, ['class' => 'form-control', 'id' => 'website']) }}
</div>

<div class="form-group">
    <div class="box-footer">
        <div class="col-xs-6">
               <a class="btn btn-primary" href="{{ route('company.index') }}" role="button">Regresar</a>
               {{ Form::submit('Guardar', ['class' => 'btn btn-primary']) }}
        </div>
        <!-- /.col -->
        
    </div>
</div>
