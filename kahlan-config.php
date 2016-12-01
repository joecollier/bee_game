<?php
use Kahlan\Filter\Filter as Filter;
use Kahlan\Jit\Interceptor;
use Kahlan\Reporter\Coverage;
use Kahlan\Reporter\Coverage\Driver\Xdebug;
use Kahlan\Jit\Patcher\Layer;

Filter::register('mycustom.namespaces', function($chain) {
    $this->_autoloader->addPsr4('Game\\', __DIR__ . '/src');
});

Filter::apply($this, 'namespaces', 'mycustom.namespaces');
Filter::register('api.patchers', function($chain) {
    if (!$interceptor = Interceptor::instance()) {
        return;
    }
    $patchers = $interceptor->patchers();

    return $chain->next();
});
Filter::apply($this, 'patchers', 'api.patchers');

// /**
//  * Initializing a custom coverage reporter
//  */
Filter::register('app.coverage', function($chain) {
    $reporters = $this->reporters();

    return $reporters;
});

Filter::apply($this, 'coverage', 'app.coverage');