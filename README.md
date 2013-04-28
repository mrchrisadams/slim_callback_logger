Slim Callback Logger
====================

An example of a Slim php app, designed to be deployable to heroku, using composer for managing dependencies.

The aim here is to make working with PHP, from local development to deployment, feel as close to working in a Sinatra-like, 'lots of small apps speaking to each other' as is possible.

#### Why do this using Slim?

Slim seems reasonably close to Sinatra, hence my choosing it for this. I know there are other examples around - hopefully this could act as a nice enough starting point to pick up elsewhere..

#### What's this callback logging malarkey?

I'm trying to put together a simple way to log callbacks sent to a given endpoint as part of a larger project.

There's nothing really significant beyond that.

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
