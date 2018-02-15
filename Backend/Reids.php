<?php
/**
 * NOTICE OF LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.textile.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/BSD-3-Clause
 *
 */

namespace PhlpDtrt\CacheBackendRedis\Backend;

/**
 * @category   PhlpDtrt
 * @package    CacheBackendRedis
 * @author     Philipp Dittert <philipp.dittert@gmail.com>
 * @copyright  Copyright (c) 2018 Philipp Dittert <philipp.dittert@gmail.com>
 * @link       https://github.com/phlpdtrt/cache-backend-redis
 */

class Redis extends \Cm_Cache_Backend_Redis implements Zend_Cache_Backend_ExtendedInterface
{
    /**
     * @var array
     */
    protected $runtimeCache = array();

    /**
     * Load value with given id from cache
     *
     * @param  string  $id                     Cache id
     * @param  boolean $doNotTestCacheValidity If set to true, the cache validity won't be tested
     *
     * @return bool|string
     */
    public function load($id, $doNotTestCacheValidity = false)
    {
        if (isset($this->runtimeCache[$id])) {
            return $this->runtimeCache[$id];
        }

        $result = parent::load($id, $doNotTestCacheValidity);

        $this->runtimeCache[$id] = $result;

        return $result;
    }

    /**
     * Save some string datas into a cache record
     *
     * Note : $data is always "string" (serialization is done by the
     * core not by the backend)
     *
     * @param  string   $data             Datas to cache
     * @param  string   $id               Cache id
     * @param  array    $tags             Array of strings, the cache record will be tagged by each string entry
     * @param  bool|int $specificLifetime If != false, set a specific lifetime for this cache record (null => infinite lifetime)
     *
     * @return boolean True if no problem
     */
    public function save($data, $id, $tags = array(), $specificLifetime = false)
    {
        unset($this->runtimeCache[$id]);

        return parent::save($data, $id, $tags, $specificLifetime);
    }
}
