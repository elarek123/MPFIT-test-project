FROM nginx

# Add bash for boot cmd
RUN apt install -y bash

# permissions and nginx user for tightened security
RUN chown -R nginx:nginx /var/cache/nginx && \
        chown -R nginx:nginx /var/log/nginx && \
        chmod -R 755 /var/log/nginx && \
        chown -R nginx:nginx /etc/nginx/conf.d

# # Uncomment to keep the nginx logs inside the container - Leave commented for logging to stdout and stderr
# RUN mkdir -p /var/log/nginx
# RUN unlink /var/log/nginx/access.log \
#     && unlink /var/log/nginx/error.log \
#     && touch /var/log/nginx/access.log \
#     && touch /var/log/nginx/error.log \
#     && chown nginx /var/log/nginx/*log \
#     && chmod 644 /var/log/nginx/*log

ARG USERNAME

ARG UID
ARG GID

RUN groupmod -g $GID nginx || groupadd -g $GID nginx
RUN usermod -u $UID nginx || useradd -u $UID nginx

# set workdir
WORKDIR /var/www

USER nginx

RUN mkdir /tmp/nginx && \
        touch /tmp/nginx/access.log && \
        touch /tmp/nginx/error.log && \
        mkdir /tmp/nginx/default && \
        touch /tmp/nginx/default/access.log && \
        touch /tmp/nginx/default/error.log;
