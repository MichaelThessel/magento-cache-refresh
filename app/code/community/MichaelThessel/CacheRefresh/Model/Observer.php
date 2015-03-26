<?php
/**
 * Checks for invalidated caches and refreshes them
 */
class MichaelThessel_CacheRefresh_Model_Observer {

    public function refresh() {
        $cacheInstance = Mage::app()->getCacheInstance();
        $caches = $cacheInstance->getInvalidatedTypes();

        if (!is_array($caches) || empty($caches)) return;

        foreach(array_keys($caches) as $cache) {
            Mage::app()->getCacheInstance()->cleanType($cache);
        }
    }
}
