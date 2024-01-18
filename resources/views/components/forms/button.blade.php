<div class="row justify-content-center">
   <button {{$attributes->class([
    'btn btn-primary btn-sm col-6'
   ])->merge([
    'type'=>'submit'
   ])}}>
   {{$slot}}
   </button>
</div>