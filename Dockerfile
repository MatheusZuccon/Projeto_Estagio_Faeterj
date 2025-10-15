# Imagem base com PHP 8 e servidor embutido
FROM php:8.2-cli

# Copia todos os arquivos do projeto para dentro do contêiner
COPY . /var/www/html

# Define o diretório de trabalho
WORKDIR /var/www/html

# Expõe a porta padrão
EXPOSE 10000

# Comando para iniciar o servidor PHP embutido
CMD ["php", "-S", "0.0.0.0:10000", "-t", "."]
