<div class="row justify-content-center">
    <form <?php echo e($attributes->class([
        ' m-3 p-3 col-lg-4 col-md-6 col-sm-12 border border-primary rounded-2'
    ])->merge([
        'method'=>'get'
    ])); ?>>
        <h2><?php echo e($title); ?></h2>
        <?php echo csrf_field(); ?>  <?php echo e($slot); ?>

    </form>
</div>

<?php /**PATH C:\xampp\htdocs\vsemer-app\resources\views/components/forms/form.blade.php ENDPATH**/ ?>