FROM php:8.2-cli

# Copia arquivos do projeto
COPY PROJETO_ESTAGIO_FAETERJ/ /var/www/html/

# Define diretório de trabalho
WORKDIR /var/www/html

# Expõe porta (opcional)
EXPOSE 10000

# Usa a porta que o Render define
CMD php -S 0.0.0.0:$PORT
