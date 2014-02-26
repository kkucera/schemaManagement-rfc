<?php
/**
 * User: Jeremy
 * Date: 2/25/14
 * Time: 10:48 PM
 */

namespace Db\Adapter;


class AdapterAbstract {
    public function execute($sql){}
    public function beginTransaction(){}
    public function commit(){}
} 