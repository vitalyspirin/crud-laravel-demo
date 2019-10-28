# Installing on Development server

1) Install Docker and Docker Compose.

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

1) Install Docker.

If you are installing Docker on Amazon Linux then you can do it by running
the following commands:

```
sudo yum install docker

sudo usermod -aG docker $USER

sudo service docker restart
```

2) Copy file Dockerfile to your environment by executing command below:

```
curl --remote-name --location "https://raw.githubusercontent.com/vitalyspirin/crud-laravel-demo/master/docker/Dockerfile"
```

3) Setup the database server and know database host, user name, user password and database name
(make sure that user has appropriate DDL and DML permissions).

4) Build and run your Docker image by executing the following commands (putting your values
instead of _DB_HOST_, DB_USERNAME, _DB_PASSWORD_, _DB_DATABASE_):

```
docker build --build-arg DIRECTORY_NAME=crud-laravel-demo --build-arg GIT_CLONE_URL=https://github.com/vitalyspirin/crud-laravel-demo.git -t trainium .

docker run -d --rm -p80:80 -p443:443 -e DB_HOST='_DB_HOST_' -e DB_USERNAME='_DB_USERNAME_' -e DB_PASSWORD='_DB_PASSWORD_' -e DB_DATABASE='_DB_DATABASE_' trainium
```

5) Run migrations by logging into Docker container.

- Find container ID by running command `docker ps`.
- Login into container by running command (putting above found ID instead of _ID_)
`docker -it exec _ID_ sh -l`
- Inside Docker container populate database by running command `php artisan migrate:refresh --seed`

6) Set up .env:
- Run command `cp .env.example .env`
- Run command `php artisan key:generate`

After that container maps ports 80 and 443. Open browser and type url of your server.
If you want to use HTTP then make sure that you installed SSL certificate.


# Useful commands:

Delete all Docker images, containers etc:
```
docker stop $(docker ps -a -q); docker rm $(docker ps -a -q); docker volume prune --force; docker rmi --force $(docker images -q); docker network prune --force
```
