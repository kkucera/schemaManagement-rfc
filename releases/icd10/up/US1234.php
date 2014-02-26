<?php
/**
 * User: Jeremy
 * Date: 2/25/14
 * Time: 11:15 PM
 */

namespace releases\icd10\up;


use Db\Adapter\App\AppAwareInterface;
use Db\Script\ScriptAbstract;

class US1234 extends ScriptAbstract implements AppAwareInterface {
    public function getSqlStatements()
    {
        return array('update some_table set column = "3" where otherColumn = "1"');
    }

} 