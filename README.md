# Album Photos

I've built this project to study Silex micro-framework. Basically it consists on create album photos.

## Install 

a) Configure environment file

```bash
$ cp .env.default .env
```

b) Up the Docker containers
```bash
$ docker-compose up -d
```

c) Install dependencies
```bash
$ docker-compose exec app composer install
```

d) Create database
```bash
$ docker exec -it album_app bash 
root@9f801fa2e7ac:/var/www/html# ./vendor/bin/doctrine orm:schema-tool:create
```

e) Access on ```http://localhost```