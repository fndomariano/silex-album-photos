# Silex Album Photos

1) Configure ```.env``` file

2) Up the Docker containers
```bash
docker-compose up -d
```

3) Install dependencies
```bash
docker-compose exec app composer install
```

4) Create database
```bash
./vendor/bin/doctrine orm:schema-tool:create
```
