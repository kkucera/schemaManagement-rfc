<?php
/**
 * User: Jeremy
 * Date: 2/25/14
 * Time: 11:01 PM
 */

namespace Db\Adapter;


interface AdapterAwareInterface {
    public function setAdapter(AdapterAbstract $adapter);
    public function getAdapter();
} 