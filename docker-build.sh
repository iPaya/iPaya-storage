#!/usr/bin/env bash

# backend
cp Dockerfile backend.Dockerfile
echo -e "
RUN rm -rf /var/www/html && ln -s /code/apps/backend/web/ /var/www/html
" >> backend.Dockerfile

# frontend
cp Dockerfile frontend.Dockerfile
echo -e "
RUN rm -rf /var/www/html && ln -s /code/apps/frontend/web/ /var/www/html
" >> frontend.Dockerfile

# api
cp Dockerfile api.Dockerfile
echo -e "
RUN rm -rf /var/www/html && ln -s /code/apps/api/web/ /var/www/html
" >> api.Dockerfile
