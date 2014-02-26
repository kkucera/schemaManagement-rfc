<?php
/**
 * User: Jeremy
 * Date: 2/25/14
 * Time: 11:10 PM
 */

namespace Db\Adapter\App;


use Db\Adapter\AdapterAbstract;

interface AppAwareCompatibleInterface {
    public function setAppAdapter(AdapterAbstract $adapter);
    public function getAppAdapter();
} 