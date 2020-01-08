# INSTALLATION APP
# Copy content from .env.example to .env and complete with data.
$ composer install
$ mkdir -p config/jwt
$ openssl genpkey -out config/jwt/private.pem -aes256 -algorithm rsa -pkeyopt rsa_keygen_bits:4096
$ openssl pkey -in config/jwt/private.pem -out config/jwt/public.pem -pubout
# Add password in .env -> JWT_PASSPHRASE
$ bin/console server:start 0.0.0.0:8000

# Symfony4 useful commands
$ php bin/console about
$ bin/console debug:router
$ php bin/console make:user