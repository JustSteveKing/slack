.RECIPEPREFIX +=
.DEFAULT_GOAL := help
PROJECT_NAME=jump
include .env

help:
	@echo "Have you tried turning it off and on again?"

reverb:
	./vendor/bin/sail artisan reverb:start
