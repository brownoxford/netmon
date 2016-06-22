# Installation

The following installation instructions assume Mac OSX. If you are installing
on Linux or Windows, YMMV.

## Install Datadog Agent

Install the Datadog agent on your laptop using the following command. Be sure to
use the correct API key here. More detailed installation instructions are
available at [Datadog](https://www.datadoghq.com/).

```bash
DD_API_KEY=<api_key_here> \
  bash -c "$(curl -L https://raw.githubusercontent.com/DataDog/dd-agent/master/packaging/osx/install.sh)"
/usr/local/bin/datadog-agent start
```

## Download and install Composer

See the instructions on the [composer website](https://getcomposer.org/download/)
for more installation options.

```bash
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('SHA384', 'composer-setup.php') === 'bf16ac69bd8b807bc6e4499b28968ee87456e29a3894767b60c2d4dafa3d10d045ffef2aeb2e78827fa5f024fbe93ca2') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
```

## Install Netmon

Clone this repository and run composer

```bash
git clone https://github.com/brownoxford/netmon.git
cd netmon.git
composer install
```

## Schedule cron

The monitor script runs the `ping` system command, so ensure that `ping` is in
the path.

```bash
* * * * * PATH=$PATH:/sbin php /path/to/git/clone/monitor.php
```
