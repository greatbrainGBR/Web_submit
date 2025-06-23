FROM nginx:latest

COPY ./page/public/ /usr/share/nginx/html/

EXPOSE 80
