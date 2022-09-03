FROM devopsfnl/image:php-8.1-laravel-newman-xdebug3

ARG PORT
ENV PORT=${PORT}

COPY . /var/www/html

# Run FE specific build steps, if applicable
RUN npm install
RUN composer run chmoder
RUN npm run build

# Setup
RUN composer install -n --prefer-dist

RUN sed -i 's/80/${PORT}/g' /etc/apache2/sites-available/000-default.conf /etc/apache2/ports.conf

RUN chmod +x /var/www/html/db-migration.sh

ENTRYPOINT ["/var/www/html/db-migration.sh"]
