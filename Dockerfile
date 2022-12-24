FROM ccr.ccs.tencentyun.com/default-w7/pop-minivote-stand-alone-image:php7.4.30-swoole-alpine
MAINTAINER poplanchong123 <1227191457@qq.com>

ENV WEB_PATH /app/w7-demo
ADD . $WEB_PATH
ADD ./web.conf /usr/local/nginx/conf/vhost/

WORKDIR $WEB_PATH

RUN echo '#!/bin/sh' >> start.sh \
    && echo "nginx" >> start.sh \
    && echo "php-fpm" >> start.sh \
    && echo "tail -f /dev/null" >> start.sh
CMD ["sh", "start.sh"]

RUN rm -rf Dockerfile .git \
    && chown -R 1000:1000 $WEB_PATH \
    && chmod -R 755 $WEB_PATH
