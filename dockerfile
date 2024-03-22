FROM php
WORKDIR /var/www/html
RUN apt-get update -y && apt-get install -y libmariadb-dev
RUN docker-php-ext-install mysqli
COPY . ./
EXPOSE 3000
CMD ["php", "-S", "0.0.0.0:3000"]
