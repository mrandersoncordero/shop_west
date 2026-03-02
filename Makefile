DC = docker compose

# ─── Contenedores ────────────────────────────────────────────────────────────

up:
	$(DC) up -d

down:
	$(DC) down

build:
	$(DC) up -d --build

restart:
	$(DC) restart

logs:
	$(DC) logs -f

ps:
	$(DC) ps

# ─── Aplicación ──────────────────────────────────────────────────────────────

shell:
	$(DC) exec app bash

artisan:
	$(DC) exec app php artisan $(filter-out $@,$(MAKECMDGOALS))

composer:
	$(DC) exec app composer $(filter-out $@,$(MAKECMDGOALS))

npm:
	$(DC) exec node npm $(filter-out $@,$(MAKECMDGOALS))

# ─── Primera instalación ─────────────────────────────────────────────────────

install:
	cp -n .env.example .env || true
	$(DC) up -d --build
	$(DC) exec app composer install
	$(DC) exec app php artisan key:generate
	$(DC) exec app php artisan migrate --seed
	$(DC) exec app php artisan storage:link

# ─── Base de datos ───────────────────────────────────────────────────────────

migrate:
	$(DC) exec app php artisan migrate

migrate-fresh:
	$(DC) exec app php artisan migrate:fresh --seed

seed:
	$(DC) exec app php artisan db:seed

# ─── Caché ───────────────────────────────────────────────────────────────────

clear:
	$(DC) exec app php artisan optimize:clear

# ─── MySQL ───────────────────────────────────────────────────────────────────

db:
	$(DC) exec mysql mysql -u appuser -psecret shop_west

# Captura argumentos extras sin intentar tratarlos como targets
%:
	@:

.PHONY: up down build restart logs ps shell artisan composer npm install \
        migrate migrate-fresh seed clear db
