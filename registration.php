<?php
/**
 * NOTICE OF LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.textile.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/BSD-3-Clause
 *
 * @category   PhlpDtrt
 * @package    CacheBackendRedis
 * @author     Philipp Dittert <philipp.dittert@gmail.com>
 * @copyright  Copyright (c) 2018 Philipp Dittert <philipp.dittert@gmail.com>
 * @link       https://github.com/phlpdtrt/cache-backend-redis
 */
\Magento\Framework\Component\ComponentRegistrar::register(
    \Magento\Framework\Component\ComponentRegistrar::MODULE,
    'PhlpDtrt_CacheBackendRedis',
    __DIR__
);
