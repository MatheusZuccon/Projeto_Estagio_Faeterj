FROM php:8.2-cli

# Copia apenas o conteúdo da pasta para o diretório web
COPY PROJETO_ESTAGIO_FAETERJ/ /var/www/html/

WORKDIR /var/www/html

EXPOSE 10000

CMD php -S 0.0.0.0:$PORT
