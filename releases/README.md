# Releases
Like our (newly) current change script process we maintain a list of release folders that contain the scripts that are executed for the release. The difference being that now the scripts located here affect potentially all of the schemas under management.

Any change script should contain Up and Down operations in script files of the same name within the up and down folder respectively.

## .manifest
The main manifest file contains the releases that have been pushed to production.

A release should NOT be added to this manifest until the feature branch is merged into a release branch and is intended to be released (next).

While a feature is in limbo, it should not be noted in the .manifest file.

Notice I've said the same thing in three different ways, it's serious business.

## <release>\.manifest
The manifest files located in each release contain the scripts that need to be executed for the release.

## <release>\.demo.manifest
The demo manifest files contain scripts that insert (and remove) demo data into the database. Upping/Downing demo data is a separate process but uses the same mechanism as release change scripts.

Not all releases will have demo scripts, but they certainly can. Demo scripts will never be run against production.


## icd10\up\US1234.php, icd10\down\US1234.php
A sample change script that represents the simplest use case. An <Adapter>AwareInterface has been specified (which will provide the script with the necessary adapter upon execution) and getSqlStatements has been overridden to return Sql to execute.

## pqrs\up\US2345.php, icd10\down\US2345.php
These two change scripts represent the more advanced use case of a script needing access to multiple schemas. The "UP" script implements ScriptInterface and defines it's own implementation from scratch; making use of two adapters with Compatible DI interfaces.

The "DOWN" script on the other hand simply extends the ScriptAbstract since downing the script doesn't actually require access to both adapters.

## historical\up\US001.php, historical\down\US001.php
A (heavily contrived) change script that inserts/removes necessary demo data into the app so users can login. The main purpose of the historical release folder is to store the base demo data change scripts.

Because the "demo" database action is never issued against Production we can be sure that when we refresh the DB into a Tiny DB state it will indicate that none of the demo scripts have been run for any release. So the demo command against our fresh DB execute all the scripts from all the releases that are included in the release manifest (historical being one of them).

Historical is not the only folder where demo files are located--in fact it is encouraged that developers should provide some demo data change scripts for features added in each release. This makes it super easy to pass your feature branch to some other party, have them up their provision and just be able to test some user or clinic without having to discover and execute the pre-requisites to trigger the feature.


