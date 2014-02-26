<?php
/**
 * User: Jeremy
 * Date: 2/26/14
 * Time: 12:18 AM
 */

namespace releases\historical\down;


use Db\Adapter\AdapterAbstract;
use Db\Adapter\App\AppAwareCompatibleInterface;
use Db\Adapter\Master\MasterAwareCompatibleInterface;
use Db\Script\ScriptInterface;

class US001 implements ScriptInterface, MasterAwareCompatibleInterface, AppAwareCompatibleInterface {
    /** @var  AdapterAbstract */
    protected $app;
    /** @var  AdapterAbstract */
    protected $master;

    public function setAppAdapter(AdapterAbstract $adapter)
    {
        $this->app= $adapter;
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
        $this->master->execute('delete from roles where role = "admin"');
        $this->app->execute('delete from user where username = "admin"');
    }
}