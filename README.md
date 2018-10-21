# WordPress - Campaign URL Builder
[![](https://img.shields.io/badge/release-1.5.0-green.svg)](https://github.com/reatlat/wp-campaign-url-builder/releases/tag/v1.5.0)
[![](https://img.shields.io/badge/npm-6.4.2-red.svg?logo=npm)](https://nodejs.org/en/)
[![](https://img.shields.io/badge/Gulp-%5E3.9.1-DA4648.svg?logo=gulp)](https://gulpjs.com/)
[![](https://img.shields.io/badge/Sass-ready-ff69b4.svg?logo=sass)](https://sass-lang.com/)
[![](https://img.shields.io/badge/Docker-ready-blue.svg?logo=docker)](https://hub.docker.com/_/wordpress/)
[![](https://img.shields.io/badge/PHP_5.6-ready-777BB4.svg?logo=php)](https://php.net/)
[![](https://img.shields.io/badge/PHP_7.2-ready-777BB4.svg?logo=php)](https://php.net/)
[![](https://img.shields.io/badge/PHP_7.3-ready-777BB4.svg?logo=php)](https://php.net/)
[![](https://img.shields.io/badge/WordPress-5.0.0-blue.svg?logo=wordpress)](https://wordpress.org/)

Generates links for Analytics tools and short link.
Enter your Campaign Name, Source, Medium (UTM link) etc.
to generate a full link and a short link (trough the Google
URL Shortener API) all in once.

## Run plugin builder
- `gulp dev` for local develop
- `gulp build` for build release, you can find it on `./release` directory

## Prerequistes

### NodeJS & GulpJS
You must install [NodeJS](https://nodejs.org/en/download/current/) which comes with npm. 

After you should update npm:
```
npm install npm -g
```
You must install [GulpJS](http://gulpjs.com/)
```
npm install gulp-cli -g
npm install gulp -D
```
Install packages
```
npm install
```

### Docker

#### Setup
First, get docker, and install:
* [Mac instructions](https://docs.docker.com/docker-for-mac/), [Package](https://download.docker.com/mac/stable/Docker.dmg)
* Linux: [Ubuntu](https://docs.docker.com/engine/installation/linux/ubuntu/)

Once installed, you can check everything is up and running:
```
docker --version
docker-compose --version
docker-machine --version (Mac-only)
```
##### Linux only
On Linux, to manage docker as non-root user, add your user to ```docker``` group:
```
sudo usermod -aG docker $USER
```
and load on startup:
```
sudo systemctl enable docker
```
And if you are using NetworkManager, add a DNS for Docker and restart:
```
echo 'json { "dns": ["8.8.8.8", "8.8.4.4"] }' | sudo tee /etc/docker/daemon.json
sudo service docker restart
```

#### Run
```
docker-compose up
```

#### Install DEMO Data (Seed)
```
docker-compose exec wordpress bash /docker-scripts/wp-demo-install.sh
```

## Helpful information
[Plugin Handbook](https://developer.wordpress.org/plugins/wordpress-org/how-to-use-subversion/)

# LICENSE
[![GNU GPL v3.0](./includes/gplv3-127x51.png)](./LICENSE)
