# Description

Docker composes with .env file, creating nginx container 1.18.0, a php container 7.1.9-fpm, container postgres 12.4 that can be managed by an image with PGAdmin, all depending on each other.

All the settings in the example below can be modified by the variables contained in the .env file

# Standard Configuration of Nginx Container

1. Ports

	80 e 443

2. Volume

	Application: htdocs -> /var/www/html

	Logs: nginx/logs -> /var/log/nginx

	Virtual Host: nginx/sites -> /etc/nginx/conf.d

# Standard Php Container Configuration

1. Ports

	9000

2. Volume

	Application: htdocs -> /var/www/html

3. Libraries

	Libraries can be enabled in php through .env file

# Default PGAdmin Container Configuration

1. Ports

	16000

2. User

	default@defualt.com

3. Password

	orangegrape

# Postgresql Container Standard Configuration

1. Ports

	5432

2. Volume

	Application: postgresql/data -> /var/lib/postgresql/data

3. Configuration for connection

	- POSTGRES_DB       = default

    - POSTGRES_USER     = default

    - POSTGRES_PASSWORD = password

    - POSTGRES_PORT     = 5432

# How to use

1. Clone the repository using the command:

   git clone 

2. After cloning, enter the folder and copy the file env-example to .env.

   cp env-example .env

3. Start your container:

   docker-compose up --build -d

4. Open the browse

   http://localhost

5. Access the container shell:
	
	docker exec -it @containerid /bin/bash

6. Inspect the container to obtain the ip address

	docker container inspect @containerid

7. Open the browse and access the pgadmin with http://localhost:16000 using the default user and password

8. Access the database inside the Postgresql container

	psql default default

9. Basic commands to use the database

	\l;

	CREATE DATABASE test;
	
	\connect test;
	
	\dt;
	
	CREATE TABLE person (id serial primary key, name varchar(60) not null);
	
	INSERT INTO person(name) VALUES ('mary');

	INSERT INTO person(name) VALUES ('jonh');

	INSERT INTO person(name) VALUES ('sheldon');

	INSERT INTO person(name) VALUES ('kaley');
