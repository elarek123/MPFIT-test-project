USERNAME := $(shell whoami)

ifeq ($(USERNAME),root)
    USERNAME := $(shell sudo -u $(SUDO_USER) whoami)
endif

UID := $(shell id -u $(USERNAME))
GID := $(shell id -g $(USERNAME))


down:
	docker-compose down

up:
	docker-compose up -d

reup: down up

build:
	docker-compose build --build-arg USERNAME=$(USERNAME) --build-arg UID=$(UID) --build-arg GID=$(GID)

build-up: down build
	docker-compose up -d

rebuild-up: down build-up

l:
	docker-compose exec tgcollector-app bash

env:
	cp .env.example .env
