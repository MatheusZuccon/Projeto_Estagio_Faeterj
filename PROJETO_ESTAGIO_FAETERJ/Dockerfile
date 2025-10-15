FROM php:8.2-cli

WORKDIR /var/www/html

# Copia tudo da pasta atual (onde está o Dockerfile)
COPY . /var/www/html/

# Expõe a porta que o Render usa
EXPOSE 10000

# Inicia o servidor PHP
CMD ["php", "-S", "0.0.0.0:10000", "-t", "/var/www/html"]
