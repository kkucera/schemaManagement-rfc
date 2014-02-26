<?php
/**
 * User: Jeremy
 * Date: 2/25/14
 * Time: 11:27 PM
 */

namespace releases\pqrs\down;


use Db\Adapter\App\AppAwareInterface;
use Db\Script\ScriptAbstract;

class US2345 extends ScriptAbstract implements AppAwareInterface {
    public function getSqlStatements()
    {
        return array('drop view foo');
    }

} 