<?php

namespace Yeeraf\Thaibaht;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Yeeraf\Thaibaht\Skeleton\SkeletonClass
 */
class ThaibahtFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'thaibaht';
    }
}
