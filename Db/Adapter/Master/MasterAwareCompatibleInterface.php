<?php
/**
 * User: Jeremy
 * Date: 2/25/14
 * Time: 11:05 PM
 */

namespace Db\Adapter\Master;


use Db\Adapter\AdapterAbstract;

interface MasterAwareCompatibleInterface {
    public function setMasterAdapter(AdapterAbstract $adapter);
    public function getMasterAdapter();
} 