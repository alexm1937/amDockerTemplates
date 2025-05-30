php based server project, built using docker

docker-compose:
  -relies on db so that loads first with creds *switch to env file
  -builds context aka dockerfile from /php/dockerfile. php8.4-fpm.
  -mounts volume to nginx friendly directory
  -expose 9000 port - exposes port to other containers on the docker network; but not to host machine

db:
  -grabs mysql image
  -gives it env variables
  -mounts a docker volume into the container 
  -attatches the docker volume to :/var/lib/mysql - this is the mysql default directory on a server


nginx:
  -grabs nginx image
  -gives it a port
  -points it to the volume from earlier and its conf file
  -depends on our php service so that loads first.

nginx proxies .php requests to the php service using fastcgi (php:9000)
php-fpm stays running in the background to serve requests on demand

files in ./php update live in the container (no rebuild required)