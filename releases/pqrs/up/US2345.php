<?php
/**
 * User: Jeremy
 * Date: 2/25/14
 * Time: 11:24 PM
 */

namespace releases\pqrs\up;


use Db\Adapter\AdapterAbstract;
use Db\Adapter\App\AppAwareCompatibleInterface;
use Db\Adapter\Master\MasterAwareCompatibleInterface;
use Db\Script\ScriptInterface;

class US2345 implements ScriptInterface, MasterAwareCompatibleInterface, AppAwareCompatibleInterface {
    /** @var  AdapterAbstract */
    protected $app;
    /** @var  AdapterAbstract */
    protected $master;

    public function setAppAdapter(AdapterAbstract $adapter)
    {
        $this->app = $adapter;
    }

    public function getAppAdapter()
    {
        return $this->app;
    }

    public function setMasterAdapter(AdapterAbstract $adapter)
    {
        $this->master = $adapter;
    }

    public function getMasterAdapter()
    {
        return $this->master;
    }

    public function execute()
    {
        $dbname = $this->master->execute('select DATABSE()');
        $this->app->execute("create view foo like select * from $dbname.codes");
    }
}