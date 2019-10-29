# Installing on Development server

Make sure you have 1GB of RAM on the server otherwise MySql container won't run!

1) Install Docker and Docker Compose (see sections at the bottom).

2) Copy files: Dockerfile, docker-compose.yml, .env to your environment
by running the following commands:

```
curl --remote-name --location "https://raw.githubusercontent.com/vitalyspirin/crud-laravel-demo/master/docker/Dockerfile"

curl --remote-name --location "https://raw.githubusercontent.com/vitalyspirin/crud-laravel-demo/master/docker/docker-compose.yml"

curl --remote-name --location "https://raw.githubusercontent.com/vitalyspirin/crud-laravel-demo/master/docker/.env"
```

3) Start development environment by running the following command:
```
docker-compose up
```

After that container maps ports 80 and 443. Open browser and type url of your server.


# Installing on Production server

1) Install Docker (see section at the bottom about how to install Docker).


2) Copy file Dockerfile to your environment by executing command below:

```
curl --remote-name --location "https://raw.githubusercontent.com/vitalyspirin/crud-laravel-demo/master/docker/Dockerfile"
```

3) Setup the database server and know database host, user name, user password and database name
(make sure that user has appropriate DDL and DML permissions).

4) Build and run your Docker image by executing the following commands (putting your values
instead of \_DB_HOST_, \_DB_USERNAME, \_DB_PASSWORD_, \_DB_DATABASE_):

```
docker build --build-arg DIRECTORY_NAME=crud-laravel-demo --build-arg GIT_CLONE_URL=https://github.com/vitalyspirin/crud-laravel-demo.git -t trainium .

docker run -d --rm -p80:80 -p443:443 \
-e DB_HOST='_DB_HOST_' \
-e DB_USERNAME='_DB_USERNAME_' \
-e DB_PASSWORD='_DB_PASSWORD_' \
-e DB_DATABASE='_DB_DATABASE_' \
trainium
```

5) If database is not populated then you can do it by running migrations through logging into Docker container:

- Find container ID by running command `docker ps`.
- Login into container by running command (putting above found ID instead of _ID_)
`docker -it exec _ID_ sh -l`
- Inside Docker container populate database by running command `php artisan migrate:refresh --seed`


After that container maps ports 80 and 443. Open browser and type url of your server.
If you want to use HTTPS then make sure that you installed SSL certificate.


# Installing Docker

If you are installing Docker on Amazon Linux then you can do it by running
the following commands:

```
sudo yum install docker

sudo usermod -aG docker $USER

sudo service docker restart
```

# Installing Docker Compose

If you are installing Docker Compose on Amazon Linux then you can do it
by running the following commands:

```
sudo curl -L https://github.com/docker/compose/releases/download/1.21.0/docker-compose-`uname -s`-`uname -m` | sudo tee /usr/local/bin/docker-compose > /dev/null

sudo chmod +x /usr/local/bin/docker-compose

sudo ln -s /usr/local/bin/docker-compose /usr/bin/docker-compose

docker-compose --version
```

# Useful commands:

Delete all Docker images, containers etc:
```
docker stop $(docker ps -a -q); docker rm $(docker ps -a -q); docker volume prune --force; docker rmi --force $(docker images -q); docker network prune --force
```
