# Console route: database refresh
Regenerates the database (TinyDB) fetching the latest production schema and inserting demo data.

# Console route: database status
Displays status of the schema's current versions to the user; and any changes scripts yet to be run.

# Console route: database demo up|down [<release>] [--dry-run]
Executes the UP or DOWN action for the specified release.

The optional <release> specification allows you to specify a single release. When left unspecified, it simply executes all of the releases in the main release folder's .manifest.

The --dry-run command will make sure the script doesn't actually take any action. It will simply say what it would do if run.

Utilizes the .demo.manifest to determine which scripts to run. The demo scripts will never be run against production -- so following a database refresh we should be running demo for all the releases to make sure all the necessary records are inserted.

This one entry point updates all the schemas that are affected for a release.

# Console route: database up|down [<release>] [--dry-run]
Executes the UP or DOWN action for the specified release.

The optional <release> specification allows you to specify a single release. When left unspecified, it simply executes all of the releases in the main release folder's .manifest.

The --dry-run command will make sure the script doesn't actually take any action. It will simply say what it would do if run.

This one entry point updates all the schemas that are affected for a release.