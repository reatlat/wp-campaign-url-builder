# WordPress - Campaign URL Builder
[![](https://img.shields.io/badge/release-1.8.2-green.svg)](https://github.com/reatlat/wp-campaign-url-builder/releases/tag/v1.8.2)

Generates links for Analytics tools and short link.
Enter your Campaign Name, Source, Medium (UTM link) etc.
to generate a full link and a short link (trough the Google
URL Shortener API) all in once.

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
