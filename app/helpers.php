<?php

function getLabelClass()
{
    $classes = [
        'label-default',
        'label-primary',
        'label-success',
        'label-info',
        'label-warning',
        'label-danger'
    ];

    return array_random($classes);
}

/**
 * @return \App\Classes\Flash
 */
function flash()
{
    return app('flash');
}