slim_callback_logger
====================

An example of a Slim php app, designed to be deployable to heroku, using composer for managing dependencies

## Usage

#### 1. Fetching composer

Do this by fetching composer, if you don't already have it:

```shell
curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin
```

Add the symlink to make for a nicer binary:

```shell
ln -s /usr/local/bin/composer.phar /usr/local/bin/composer
```

Then use it to install the libraries:

```shell
composer install
```

#### 2. Run the app locally with foreman

This project assumes you're using PHP 5.4, and the embedded PHP server run on the command line. This is largely to run PHP apps, like how many other dynamic language frameworks are run, like Flask, Django, Node, Sinatra or Ruby on Rails are run.

Foreman is used, partly for heroku support, and partly to help keep credentials out of code.

First, install the heroku toolbelt.

Then run [foreman][], making sure to point to the local Procfile.

For local development, you can pass a link to the `Procfile` like so:

```shell
foreman start -f Procfile.local
```
#### 3. Deploying to a PaaS like heroku

You can deploy this to heroku, by setting up a free version running on their infra with this command:

```shell
heroku create -s cedar \
  --buildpack https://github.com/bergie/heroku-buildpack-php.git \
  slim-callback-logger
```

You can can then push subsequent deploys with git, in the normal fashion as you develop:

```shell
git push heroku master
```
