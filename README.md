# Schema Management Proposal
Hey all, this is fruition of a late night thought experiment. It's a pseudo project containing some mock classes and configurations that address a new way to manage our schemas.

Please examine all the files taking care to read comments in both the files and the README.md's for commentary on the purposes/benefits of files within the directory. (There are multiple README.md's!).

## What this proposal attempts to address:
### Tiny DB
The tiny DB process really needs to be maintained with feature releases -- especially so if the feature adds new schemas, or fundamentally alters a core table where demo data is inserted. Additionally, as new features are developed more elaborate demo data could/should be provided.

By including it as part of the schema management process (which already seems a natural place for it) we can make sure it's in the developers minds when they are contributing new change scripts.

This current project doesn't have any pseudo/mock code relating to the database refresh action (creating tiny db). The gist of the operation however, will be to contact the authoritative server to download a schema dump. From which the "database demo up" can be run against to install the necessary records for the app.

### Database Versions
Resolves some pain points:
  * Change scripts in one schema have dependencies in change scripts for other schemas
  * Change scripts with multiple schema dependencies
  * (future) Change scripts that affect clustered schemas.

  Part of the DI mechanism, is that scripts that implement an <Adapter>AwareInterface for an adapter with multiple configurations (multiple clusters) will be executed multiple times. For each defined configuration the adapter will be reconfigured, provided to the script and the script will execute. For scripts that contain <Adapter>AwareInterfaces for both clustered and non-clustered schemas, it will be the developer responsibility that the script is implemented so the execution is idempotent for those non-clustered schema; such that execution a 2nd, 3rd, and Nth time don't cause data corruption.

### Provisioning
Ultimately this (more complex) schema management process would serve to simplify the provisioning effort. It would serve to be another dependency (via composer) that is bundled with a release (team, production, other). Once checked out, that database can be initialized to a known and appropriate state that will work with the feature branch.

This is different from the current state where database initialization is a hodge-podge of bash script commands that manually run release scripts and ETLs; which must be maintained with each release (and hasn't been).

