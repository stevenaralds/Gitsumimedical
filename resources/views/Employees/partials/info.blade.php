

@if(Session::has('info'))



        <div id="alert" class="alert alert-info ">
            <button type="button" class="close"  data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-info"></i> Alert!</h4>
            {{ Session::get('info') }}
        </div>

@endif



