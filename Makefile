SHELL := bash# we want bash behaviour in all shell invocations
PLATFORM := $(shell uname)


# And add help text after each target name starting with '\#\#'
.DEFAULT_GOAL:=help

.PHONY: help

help:
	@grep -E '^[a-zA-Z0-9_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}'

.PHONY: start
start: ## run application
	docker-compose run --rm --service-ports php /bin/bash