FROM ipaya/php-7.0:apache

MAINTAINER Di Zhang <zhangdi_me@163.com>

ENV APP_ENV="prod"
ENV MYSQL_HOST=localhost
ENV MYSQL_DB=ipaya
ENV MYSQL_USERNAME=root
ENV MYSQL_PASSWORD=root
ENV FRONTEND_BASE_URL='http://storage.dev.ipaya.cn'

ENV ALIYUN_OSS_ENDPOINT=your-aliyun-oss-endpoint
ENV ALIYUN_ACCESS_KEY_ID=your-aliyun-access-key-id
ENV ALIYUN_ACCESS_KEY_SECRET=your-aliyun-access-key-secret
ENV ALIYUN_OSS_BUCKET=your-aliyun-oss-bucket

ENV CODE_PATH="/code"

WORKDIR $CODE_PATH

COPY . $CODE_PATH
COPY ./deploy/scripts/startup.sh /usr/local/bin/startup

# Enable apache rewrite
RUN a2enmod rewrite

# Writable
RUN chmod -R 777 \
  $CODE_PATH/apps/frontend/runtime \
  $CODE_PATH/apps/frontend/web/assets \
  $CODE_PATH/apps/backend/runtime \
  $CODE_PATH/apps/backend/web/assets \
  $CODE_PATH/apps/api/runtime \
  $CODE_PATH/apps/api/web/assets \
  $CODE_PATH/apps/console/runtime

# Install composer packages
RUN cd $CODE_PATH && \
  # Uncomment if you're in china.
  # composer config -g repo.packagist composer https://packagist.phpcomposer.com && \
  composer global require "fxp/composer-asset-plugin:~1.2.0" && \
  composer install --prefer-dist --no-dev --no-suggest --optimize-autoloader

RUN chmod +x $CODE_PATH/console && \
  ln -s $CODE_PATH/console /usr/local/bin/console && \
  chmod +x /usr/local/bin/startup

CMD ["startup"]

RUN rm -rf /var/www/html && ln -s /code/apps/backend/web/ /var/www/html

