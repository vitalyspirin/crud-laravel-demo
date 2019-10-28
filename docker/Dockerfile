FROM vitalyspirin/alpine-php7

# To build image the following environment variables are needed:
# DIRECTORY_NAME - name of project directory (usually it's the same as project name)
#                - project will be located in /var/www/localhost/htdocs/[DIRECTORY_NAME]
# GIT_CLONE_URL - url with token to run command git clone [GIT_CLONE_URL]
#
# ! To run the image the following environment variables are needed:
# DB_HOST - name of MySql server
#

ARG DIRECTORY_NAME
ARG GIT_CLONE_URL

ENV DIRECTORY_NAME=${DIRECTORY_NAME}


EXPOSE 80
EXPOSE 443

WORKDIR /var/www/localhost/htdocs/

RUN \
    if [ ! -d /var/www/localhost/htdocs/${DIRECTORY_NAME} ]; then git clone ${GIT_CLONE_URL}; fi && \
    chmod -R 777 /var/www/localhost/htdocs/${DIRECTORY_NAME} && \
    \
    echo -e 'RewriteEngine on\n' >> .htaccess && \
    \
    echo -e '# Freenom DNS service allow CNAME on subdomains only so we need www. subdomain' >> .htaccess && \
    echo -e 'RewriteCond %{HTTP_HOST} !^www\. [NC]' >> .htaccess && \
    echo -e 'RewriteCond %{HTTP_HOST} !^[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}(:[0-9]+)?$' >> .htaccess && \
    echo -e 'RewriteCond %{HTTP_HOST} !^dev\. [NC]' >> .htaccess && \
    echo -e 'RewriteRule ^(.*)$ http://www.%{HTTP_HOST}/$1 [R=301,L]\n' >> .htaccess && \
    \
    echo -e '# Redirect to HTTPS' >> .htaccess && \
    echo -e 'RewriteCond %{HTTPS} !=on' >> .htaccess && \
    echo -e 'RewriteCond %{HTTP:X-Forwarded-Proto} !https [NC]' >> .htaccess && \
    echo -e 'RewriteCond %{REQUEST_URI} !^/healthcheck.txt' >> .htaccess && \
    echo -e 'RewriteCond %{HTTP_HOST} ^([^:]+)(:[0-9]+)?$' >> .htaccess && \
    echo -e 'RewriteRule ^ https://%1%{REQUEST_URI} [L,NE,R=301]\n' >> .htaccess && \
    \
    echo -e "RewriteRule ^(.*)$ /${DIRECTORY_NAME}/public/\$1 [NC,L]\n" >> .htaccess && \
    cd ${DIRECTORY_NAME} && \
    \
    # file /root/.profile will be executed if shell is invoked with -l param: sh -l
    echo -e "cd /var/www/localhost/htdocs/${DIRECTORY_NAME}" >> /root/.profile && \
    \
    git config core.fileMode false && \
    git pull `#&& \
    composer install`

CMD ["sh", "-c", ": && \
    cd /var/www/localhost/htdocs/${DIRECTORY_NAME} && \
    git pull && \
    /usr/sbin/httpd -D FOREGROUND"]
