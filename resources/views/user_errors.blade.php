<x-layouts.app>
@if (!empty($error))
<div class="card">
    <div class="card-body text-center"><h1 class=" text-danger"> User Error Detected </h1>
    <br>
    <h2>Error Details: {{$message}}  | Error Code : {{$errorcode}}</h2>
    <h3>Please contact an Administrator  </h3>  
</div>
</div>

<
    
@else

    <div class="card-body text-center"><h1 class=" text-danger"> Possible Malicous Error Detected </h1>
    <br>
    <h2>How Did You Get here!! Naughty!! Naughty!!!</h2>
    <h3>Error Logged and Administrator nofied  </h3>  
    
@endif
</x-layouts.app>