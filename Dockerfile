FROM ubuntu:latest
RUN apt-get update && \
    apt-get install -y \
    apache2 \
    php7.3 

EXPOSE 8000

ENTRYPOINT [ "usr/sbin/apache2ctl" ]
CMD ["-D","FOREGROUND"]
