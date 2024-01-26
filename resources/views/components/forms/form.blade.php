<div class="row justify-content-center">
    <form {{$attributes->class([
        ' m-3 p-3 col-lg-4 col-md-6 col-sm-12 border border-primary rounded-2'
    ])->merge([
        'method'=>'get'
    ])}}>
        <h2>{{$title}}</h2>
        @csrf  {{$slot}}
    </form>
</div>

