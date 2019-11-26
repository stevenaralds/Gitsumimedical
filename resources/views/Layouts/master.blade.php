
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    {{-- Font awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
   
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js" >
    <link rel="stylesheet" href="https://unpkg.com/axios/dist/axios.min.js"  > --}}

    <title>SumiMedical - Home</title>
</head>
<body>

    <div class="bg-dark">@include('Layouts.partials.header') </div>
  
  
    
    <section class="main container p-5">
        @yield('contenido')  
    </section>   
    @include('Layouts.partials.footer')
    @include('Layouts.partials.scripts')
    @yield('scripts') 
    
</body>
</html>