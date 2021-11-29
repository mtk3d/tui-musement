vendor: composer.json composer.lock
	composer validate --no-check-publish
	composer install --ignore-platform-reqs --prefer-dist

beautify: ## Beautify the code
beautify: vendor
	vendor/bin/php-cs-fixer fix

check: ## Run code linters
check: vendor
	vendor/bin/phpstan
	vendor/bin/php-cs-fixer fix --dry-run

test: ## Run code tests
test: vendor
	vendor/bin/phpunit

help:
	@printf "\033[33mUsage:\033[0m\n  make TARGET\n\033[33m\nTargets:\n"
	@fgrep -h "##" $(MAKEFILE_LIST) | fgrep -v fgrep | sed -e 's/\\$$//' | sed -e 's/##//' | \
	awk 'BEGIN {FS = ":"}; {printf "  \033[33m%-10s\033[0m%s\n", $$1, $$2}'

.DEFAULT_GOAL = help
.PHONY: help
