SHELL := bash# we want bash behaviour in all shell invocations
PLATFORM := $(shell uname)


# And add help text after each target name starting with '\#\#'
.DEFAULT_GOAL:=help

help:
	@grep -E '^[a-zA-Z0-9_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}'

install: ## install dependencies
	composer install

validate: ## run composer validate
	composer validate
lint: ## run linter
	composer exec --verbose phpcs -- --standard=PSR12 src bin

brain-game: ## run application
	./bin/brain-games.php

docker-run-lint: ## run linter in docker container
	docker-compose run --rm php bash -c "composer exec --verbose phpcs -- --standard=PSR12 ./src ./bin"

docker-run-validate: ## run composer validate in docker
	docker-compose run --rm php validate

docker-run-install: ## install dependencies in docker
	docker-compose run --rm php install

docker-run-brain-game: ## run application in docker
	docker-compose run --rm php bash -c "./bin/brain-games.php"

start: ## run application
	docker-compose run --rm --service-ports php /bin/bash

.PHONY: install start help docker-brain-game docker-install