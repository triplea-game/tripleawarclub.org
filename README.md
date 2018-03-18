# This site is no longer active and permanently redirects to [forums.triplea-game.org](https://forums.triplea-game.org).


# tripleawarclub.org

This repository contains the nginx configuration file for \[www.\]tripleawarclub.org.


## Update Nginx configuration

The following process is used to update the Nginx configuration:

1. Submit a PR to this repo with the proposed change to _./tripleawarclub.org_.
1. Review and merge the PR.
1. Login to `tripleawarclub.org`.
1. Change to the directory where you have cloned the `triplea-game/tripleawarclub.org` repo and checkout the appropriate tag/branch.
1. Review the changes to be applied to ensure the production configuration has not been modified outside of this process.
    * `$ git diff /etc/nginx/sites-available/tripleawarclub.org ./tripleawarclub.org`
1. Copy the new configuration.
    * `$ sudo cp ./tripleawarclub.org /etc/nginx/sites-available/tripleawarclub.org`
1. Reload the Nginx configuration.
    * `$ sudo systemctl reload nginx`
1. Smoke test the new configuration as needed.
