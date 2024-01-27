<header class="border-bottom border-primary border-2 row justify-content-center ">
    <nav class="d-flex justify-content-between navbar navbar-expand-lg bg-body-tertiary col-9 bg-success-subtle">
        <?php if (isset($component)) { $__componentOriginal8135fb9a2c0cecc5ac67e3f91b701bea = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8135fb9a2c0cecc5ac67e3f91b701bea = $attributes; } ?>
<?php $component = App\View\Components\Ul::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('ul'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Ul::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
            <?php if (isset($component)) { $__componentOriginaleec9e615a7e83da3a84c962a94b0c5e3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaleec9e615a7e83da3a84c962a94b0c5e3 = $attributes; } ?>
<?php $component = App\View\Components\Lia::resolve(['path' => __('home'),'value' => __('Главная')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('lia'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Lia::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaleec9e615a7e83da3a84c962a94b0c5e3)): ?>
<?php $attributes = $__attributesOriginaleec9e615a7e83da3a84c962a94b0c5e3; ?>
<?php unset($__attributesOriginaleec9e615a7e83da3a84c962a94b0c5e3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaleec9e615a7e83da3a84c962a94b0c5e3)): ?>
<?php $component = $__componentOriginaleec9e615a7e83da3a84c962a94b0c5e3; ?>
<?php unset($__componentOriginaleec9e615a7e83da3a84c962a94b0c5e3); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginaleec9e615a7e83da3a84c962a94b0c5e3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaleec9e615a7e83da3a84c962a94b0c5e3 = $attributes; } ?>
<?php $component = App\View\Components\Lia::resolve(['path' => __('about'),'value' => __('О нас')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('lia'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Lia::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['x-a' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaleec9e615a7e83da3a84c962a94b0c5e3)): ?>
<?php $attributes = $__attributesOriginaleec9e615a7e83da3a84c962a94b0c5e3; ?>
<?php unset($__attributesOriginaleec9e615a7e83da3a84c962a94b0c5e3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaleec9e615a7e83da3a84c962a94b0c5e3)): ?>
<?php $component = $__componentOriginaleec9e615a7e83da3a84c962a94b0c5e3; ?>
<?php unset($__componentOriginaleec9e615a7e83da3a84c962a94b0c5e3); ?>
<?php endif; ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8135fb9a2c0cecc5ac67e3f91b701bea)): ?>
<?php $attributes = $__attributesOriginal8135fb9a2c0cecc5ac67e3f91b701bea; ?>
<?php unset($__attributesOriginal8135fb9a2c0cecc5ac67e3f91b701bea); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8135fb9a2c0cecc5ac67e3f91b701bea)): ?>
<?php $component = $__componentOriginal8135fb9a2c0cecc5ac67e3f91b701bea; ?>
<?php unset($__componentOriginal8135fb9a2c0cecc5ac67e3f91b701bea); ?>
<?php endif; ?>
        <?php if(session('user')): ?>
            <?php if (isset($component)) { $__componentOriginal8135fb9a2c0cecc5ac67e3f91b701bea = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8135fb9a2c0cecc5ac67e3f91b701bea = $attributes; } ?>
<?php $component = App\View\Components\Ul::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('ul'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Ul::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                <?php if (isset($component)) { $__componentOriginaleec9e615a7e83da3a84c962a94b0c5e3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaleec9e615a7e83da3a84c962a94b0c5e3 = $attributes; } ?>
<?php $component = App\View\Components\Lia::resolve(['path' => __('order'),'value' => __('мои заказы')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('lia'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Lia::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaleec9e615a7e83da3a84c962a94b0c5e3)): ?>
<?php $attributes = $__attributesOriginaleec9e615a7e83da3a84c962a94b0c5e3; ?>
<?php unset($__attributesOriginaleec9e615a7e83da3a84c962a94b0c5e3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaleec9e615a7e83da3a84c962a94b0c5e3)): ?>
<?php $component = $__componentOriginaleec9e615a7e83da3a84c962a94b0c5e3; ?>
<?php unset($__componentOriginaleec9e615a7e83da3a84c962a94b0c5e3); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginaleec9e615a7e83da3a84c962a94b0c5e3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaleec9e615a7e83da3a84c962a94b0c5e3 = $attributes; } ?>
<?php $component = App\View\Components\Lia::resolve(['path' => __('search_orders'),'value' => __('поиск заказов')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('lia'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Lia::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['x-a' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaleec9e615a7e83da3a84c962a94b0c5e3)): ?>
<?php $attributes = $__attributesOriginaleec9e615a7e83da3a84c962a94b0c5e3; ?>
<?php unset($__attributesOriginaleec9e615a7e83da3a84c962a94b0c5e3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaleec9e615a7e83da3a84c962a94b0c5e3)): ?>
<?php $component = $__componentOriginaleec9e615a7e83da3a84c962a94b0c5e3; ?>
<?php unset($__componentOriginaleec9e615a7e83da3a84c962a94b0c5e3); ?>
<?php endif; ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8135fb9a2c0cecc5ac67e3f91b701bea)): ?>
<?php $attributes = $__attributesOriginal8135fb9a2c0cecc5ac67e3f91b701bea; ?>
<?php unset($__attributesOriginal8135fb9a2c0cecc5ac67e3f91b701bea); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8135fb9a2c0cecc5ac67e3f91b701bea)): ?>
<?php $component = $__componentOriginal8135fb9a2c0cecc5ac67e3f91b701bea; ?>
<?php unset($__componentOriginal8135fb9a2c0cecc5ac67e3f91b701bea); ?>
<?php endif; ?>
        <?php else: ?>
            <?php if (isset($component)) { $__componentOriginal8135fb9a2c0cecc5ac67e3f91b701bea = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8135fb9a2c0cecc5ac67e3f91b701bea = $attributes; } ?>
<?php $component = App\View\Components\Ul::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('ul'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Ul::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                <?php if (isset($component)) { $__componentOriginaleec9e615a7e83da3a84c962a94b0c5e3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaleec9e615a7e83da3a84c962a94b0c5e3 = $attributes; } ?>
<?php $component = App\View\Components\Lia::resolve(['path' => __('login'),'value' => __('Войти')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('lia'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Lia::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaleec9e615a7e83da3a84c962a94b0c5e3)): ?>
<?php $attributes = $__attributesOriginaleec9e615a7e83da3a84c962a94b0c5e3; ?>
<?php unset($__attributesOriginaleec9e615a7e83da3a84c962a94b0c5e3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaleec9e615a7e83da3a84c962a94b0c5e3)): ?>
<?php $component = $__componentOriginaleec9e615a7e83da3a84c962a94b0c5e3; ?>
<?php unset($__componentOriginaleec9e615a7e83da3a84c962a94b0c5e3); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginaleec9e615a7e83da3a84c962a94b0c5e3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaleec9e615a7e83da3a84c962a94b0c5e3 = $attributes; } ?>
<?php $component = App\View\Components\Lia::resolve(['path' => __('registration'),'value' => __('Регистрация')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('lia'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Lia::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaleec9e615a7e83da3a84c962a94b0c5e3)): ?>
<?php $attributes = $__attributesOriginaleec9e615a7e83da3a84c962a94b0c5e3; ?>
<?php unset($__attributesOriginaleec9e615a7e83da3a84c962a94b0c5e3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaleec9e615a7e83da3a84c962a94b0c5e3)): ?>
<?php $component = $__componentOriginaleec9e615a7e83da3a84c962a94b0c5e3; ?>
<?php unset($__componentOriginaleec9e615a7e83da3a84c962a94b0c5e3); ?>
<?php endif; ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8135fb9a2c0cecc5ac67e3f91b701bea)): ?>
<?php $attributes = $__attributesOriginal8135fb9a2c0cecc5ac67e3f91b701bea; ?>
<?php unset($__attributesOriginal8135fb9a2c0cecc5ac67e3f91b701bea); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8135fb9a2c0cecc5ac67e3f91b701bea)): ?>
<?php $component = $__componentOriginal8135fb9a2c0cecc5ac67e3f91b701bea; ?>
<?php unset($__componentOriginal8135fb9a2c0cecc5ac67e3f91b701bea); ?>
<?php endif; ?>
        <?php endif; ?>

    </nav>
</header>
<?php /**PATH C:\xampp\htdocs\vsemer-app\resources\views/includes/header.blade.php ENDPATH**/ ?>