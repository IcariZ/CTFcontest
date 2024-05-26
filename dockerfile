FROM php:8.3.7-cli-alpine

WORKDIR /home/ctf

# Copy the application code
COPY index.php ./

COPY function.php ./

COPY Inject.php ./

RUN mkdir -p Controller Router Views

COPY Controller ./Controller

COPY Router ./Router

COPY Views ./Views

RUN chmod 555 /home/ctf/

EXPOSE 7777 

CMD ["php", "-S", "0.0.0.0:7777"]

# sudo docker run -d -p 7777:7777 d08a36ee1e4b
# -p buat nentuin portnya local:docker 