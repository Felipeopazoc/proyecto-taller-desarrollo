FROM ubuntu:latest
RUN apt-get update && \
    apt-get install -y \
    apache2\
    php7.3 

EXPOSE 80

ENTRYPOINT [ "usr/sbin/apache2ctl" ]
CMD ["-D","FOREGROUND"]
