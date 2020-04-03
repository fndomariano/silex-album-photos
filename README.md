# Silex Album Photos

Configure env file
docker-compose up -d
docker-compose exec app composer install
./vendor/bin/doctrine orm:schema-tool:create
