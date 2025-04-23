# Usa a imagem oficial do PHP com Apache
FROM php:8.2-apache

# Instala extensões necessárias (opcional — adicione o que for preciso)
RUN docker-php-ext-install pdo pdo_mysql mysqli

# Copia todos os arquivos do seu projeto para o diretório padrão do Apache
COPY . /var/www/html/

# Dá permissão para o Apache ler os arquivos
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Habilita o módulo reescrita (útil se você usar .htaccess)
RUN a2enmod rewrite

# Define o diretório de trabalho
WORKDIR /var/www/html

# Expõe a porta padrão do Apache
EXPOSE 80
