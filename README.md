# Docksal powered Drupal 8 With Composer Installation

This is a sample Drupal 8 with Composer installation pre-configured for use with Docksal.

Features:

- Drupal 8 Composer Project
- `fin init` [example](.docksal/commands/init)
- Using the [default](.docksal/docksal.env#L9) Docksal LAMP stack with [image version pinning](.docksal/docksal.env#L13-L15)
- PHP and MySQL settings overrides [examples](.docksal/etc)

## Setup instructions

### Step #1: Docksal environment setup

**This is a one time setup - skip this if you already have a working Docksal environment.**

Follow [Docksal environment setup instructions](https://docs.docksal.io/en/master/getting-started/env-setup)

### Step #2: Project setup

1. Clone this repo into your Projects directory

    ```
    git clone https://github.com/docksal/example-drupal8-composer.git drupal8
    cd drupal8
    ```

2. Initialize the site

    This will initialize local settings and install the site via drush

    ```
    fin init
    ```

3. Point your browser to

    ```
    http://drupal8.docksal
    ```

When the automated install is complete the command line output will display the admin username and password.


## More automation with 'fin init'

Site provisioning can be automated using `fin init`, which calls the shell script in [.docksal/commands/init](.docksal/commands/init).
This script is meant to be modified per project. The one in this repo will give you a good starting example.

Some common tasks that can be handled by the init script (an other [custom commands](https://docs.docksal.io/en/master/fin/custom-commands/)):

- initialize local settings files for Docker Compose, Drupal, Behat, etc.
- import DB or perform a site install
- compile Sass
- run DB updates, revert features, clear caches, etc.
- enable/disable modules, update variables values


## Security notice

This repo is intended for quick start demos and includes a hardcoded value for `hash_salt` in `settings.php`.
If you are basing your project code base on this repo, make sure you regenerate and update the `hash_salt` value.
A new value can be generated with `drush ev '$hash = Drupal\Component\Utility\Crypt::randomBytesBase64(55); print $hash . "\n";'`



## Uputstvo

- Napravi folder sa nazivom projekta - prve 2 tacke mogu da se preskoce ukoliko se klonira aktivan projekat
- Otvori folder u terminalu
    ```
    git clone <https> .
    ``` 
     or 
    ```
    git clone <ssh> .
    ``` 

   `tačka ide na kraju kako se ne bi kopirao ceo repozitorijum nego samo sadrzaj istog` 
- Obrisati .git folder - `ovo ne vazi samo za pravljenje novog projekta, odnosno ovo ne radimo ako je projekat aktivan`
- U terminalu 
    ```
    git init
    ``` 
    ```
    git add .
    ```
    ```
    git commit -m "first commit"
    ```
    ```
    git remote add origin <https>
    ```
    or 
    ```
    git remote add origin <ssh>
    ```
   `poželjno je da se koristi ssh jer sa https-om git prilikom svakog pusha i poola traži `
- git push -u origin master
- “fin up”
- “fin composer install”
- “fin db import .docksal/settings/ds.sql”
- U file settings.php dodati na kraju :

$config_directories['sync'] = '../config/sync';
$databases['default']['default'] = array (
  'database' => 'default',
  'username' => 'user',
  'password' => 'user',
  'prefix' => '',
  'host' => 'db',
  'port' => '3306',
  'namespace' => 'Drupal\\Core\\Database\\Driver\\mysql',
  'driver' => 'mysql',
);
