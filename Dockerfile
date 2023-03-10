FROM ccr.ccs.tencentyun.com/w7team/swoole:fpm-php7.2
MAINTAINER yuanwentao <admin@w7.com>


ENV PHP_INI_DIR /etc/php7

ENV WEB_PATH /home/w7-demo
ADD . $WEB_PATH
ADD ./web.conf /usr/local/nginx/conf/vhost/
ADD ./bolt.so /usr/lib/php7/modules/
RUN echo "extension=/usr/lib/php7/modules/bolt.so" > $PHP_INI_DIR/conf.d/php-ext-custom-bolt.ini


WORKDIR $WEB_PATH

RUN echo '#!/bin/sh' >> start.sh \
    && echo "nginx" >> start.sh \
    && echo "tail -f /dev/null" >> start.sh
CMD ["sh", "start.sh"]


RUN rm -rf Dockerfile .git bolt.so \
    && chown -R 1000:1000 $WEB_PATH \
    && chmod -R 755 $WEB_PATH
