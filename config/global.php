<?php
    return array(
        /**
         * Adapters are provided via DI through <Adapter>AwareInterface's.
         * There should be an adapter for each Schema.
         * The adapter concrete is mapped to the adapter_config key that contains connection parameters
         * for that adapter's schema
         */
        'adapter_config_mapping' => array(
            'Db\Adapter\Auth\Auth' => 'auth',
            'Db\Adapter\Delegator\Delegator' => 'delegator',
            'Db\Adapter\Admin\Admin' => 'admin',
            'DB\Adapter\Bfm\Bfm' => 'bfm',
            'Db\Adapter\Master\Master' => 'master',
            'Db\Adapter\App\App' => 'app',
            'Db\Adapter\DocumentPortal\DocumentPortal' => 'docportal',
        ),
        'adapter_config' => array(
            /**
             * For non-clustered database adapters the key maps directly to db adapter config.
             * (Note: this is a sample, refer to our actual db adapter configs for all correct options)
             * Repeat this section for delegator, admin, and bfm.
             */
            'auth' => array(
                'driver' => 'PDO_MYSQLI',
                'params' => array(
                    'host' => 'auth.db.rw.host',
                    'port' => 3306,
                    'username' => 'root',
                    'password' => 'password',
                    'database' => 'auth_webpt_com',
                ),
            ),
            'delegator' => array(/** ... */),
            'admin' => array(/** ... */),
            'bfm' => array(/** ... */),
            /**
             * For clustered database adapters the key maps to an array of adapter configs.
             * There should be a config entry for each cluster.
             * Repeat this section for App, DocumentPortal, etc.
             */
            'master' => array(
                /**
                 * cluster 1 config
                 */
                array(
                    /**
                     * This is an extra config entry that doesn't already exist.
                     * We'll use this to display to the user when we summarize what work
                     * we will|did do during the migration operation.
                     */
                    'description' => 'Cluster 1 Master Schema',
                    'driver' => 'PDO_MYSQLI',
                    'params' => array(
                        'host' => 'cluster1.master.db.rw.host',
                        'port' => 3306,
                        'username' => 'root',
                        'password' => 'password',
                        'database' => 'master_webpt_com',
                    ),
                ),
                /**
                 * cluster 2 config
                 */
                array(
                    'description' => 'Cluster 2 Master Schema',
                    'driver' => 'PDO_MYSQLI',
                    'params' => array(
                        'host' => 'cluster2.master.db.rw.host',
                        'port' => 3306,
                        'username' => 'root',
                        'password' => 'password',
                        'database' => 'master_webpt_com',
                    ),
                ),
            ),
            'app' => array(
                /** cluster 1 config */
                array(/** ... */),
                /** cluster 2 config */
                array(/** ... */),
            ),
            'docportal' => array(
                /** cluster 1 config */
                array(/** ... */),
                /** cluster 2 config */
                array(/** ... */),
            ),
        ),
        'service_manager' => array(
            /**
             * We'll configure the necessary factories and initializer(s) that will be responsible for
             * supplying adapter concretes to services that have <Adapter>AwareInterfaces
             */
            /** ... */
        ),
    );