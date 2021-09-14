<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

На основании этого видео

[![Основное видео](http://img.youtube.com/vi/jV7lVrtZVko/0.jpg)](https://www.youtube.com/watch?v=jV7lVrtZVko&list=PLD5U-C5KK50X1KcfueA73sGSjBsd8vgVG "Основное видео")


## Create Laravel

1. Создаем новый проект `lara.vue.loc`

        composer create-project laravel/laravel lara.vue.loc

2. Добавляем пакет для работы с vue

        composer require laravel/ui

3. Обновляем ноду до хотя бы 12.12

4. Запускаем установку пакетов node.js
        
        npm i

5. Запускаем сборку

        npm run dev

6. Запускаем авторизацию на vue

        php artisan ui vue --auth

7. Запускаем сборку на постоянной основе

        npm run watch-poll

---

##  Устанавливаем стек Redis + Socket.io

### Ставим Redis

    sudo apt install redis-server

### Ставим библиотеку для бека 

    composer require predis/predis

### Ставим библиотеку для фронта 

    npm i ioredis
    npm i socket.io

---

## В файле `.env`

Меняем:

    BROADCAST_DRIVER=redis

Добавляем:

    REDIS_CLIENT=predis
    REDIS_PREFIX=''

## nGinx

Для корректной работы рекомендую проксировать через nGinx локальный порт. Для этого в конфиг nGinx стоит внести такой раздел
    
	# Requests for socket.io are passed on to Node on port 4242
	location ~* \.io {
		proxy_set_header X-Real-IP $remote_addr;
		proxy_set_header X-Forwarded-For $proxy_add_x_forwarded_for;
		proxy_set_header Host $http_host;
		proxy_set_header X-NginX-Proxy false;

		proxy_pass http://localhost:4242;
		proxy_redirect off;

		proxy_http_version 1.1;
		proxy_set_header Upgrade $http_upgrade;
		proxy_set_header Connection "upgrade";
	}

где `proxy_pass http://localhost:4242;` это локальный адрес где запущен socket.io

Если проксироваться таким образом, в клиенте указываем корень приложения, без портов и дургих проблем

    const socket = io('/')
