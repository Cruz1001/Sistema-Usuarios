# Usa a imagem oficial do PHP com Apache
FROM php:8.2-apache

# Instala extensões necessárias
RUN docker-php-ext-install pdo pdo_mysql mysqli

# Copia todos os arquivos para dentro do container
COPY . /var/www/html/

# Dá permissão para o Apache acessar os arquivos
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Habilita o módulo de reescrita
RUN a2enmod rewrite

# Altera o DocumentRoot para a pasta "public"
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# Define o diretório de trabalho
WORKDIR /var/www/html

# Expõe a porta do Apache
EXPOSE 80
