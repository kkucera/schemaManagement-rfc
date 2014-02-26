<?php
/**
 * User: Jeremy
 * Date: 2/25/14
 * Time: 10:42 PM
 */

namespace Db\Script;

use Db\Adapter\AdapterAbstract;

abstract class ScriptAbstract implements ScriptInterface{
    /** @var  array */
    protected $sqlStatements;
    /** @var  AdapterAbstract */
    protected $adapter;

    /**
     * @param \Db\Adapter\AdapterAbstract $adapter
     */
    public function setAdapter($adapter)
    {
        $this->adapter = $adapter;
    }

    /**
     * @return \Db\Adapter\AdapterAbstract
     */
    public function getAdapter()
    {
        return $this->adapter;
    }

    /**
     * @return array
     */
    public function getSqlStatements()
    {
        return $this->sqlStatements;
    }


    public function execute()
    {
        $this->preExecute();
        foreach($this->getSqlStatements() as $sql){
            $this->getAdapter()->execute($sql);
        }
        $this->postExecute();
    }

    /**
     * Action to be executed prior to the executing the SQL.
     * For tables that support transactions, this should be fine.
     * For other tables, this can be workarounds like creating a shadow table to operate on.
     */
    protected function preExecute() {
        $this->getAdapter()->beginTransaction();
    }

    /**
     * Action to be executed after to the executing the SQL.
     * For tables that support transactions, this should be fine.
     * For other tables, this can be workarounds dropping the existing table and renaming a shadow table.
     */
    protected function postExecute() {
        $this->getAdapter()->commit();
    }

}