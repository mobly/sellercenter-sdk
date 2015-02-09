all: clean prepare composer lint test

ci: clean prepare composer lint phploc pdepend phpmd-ci phpcs-ci phpcpd coverage phpdox

clean:
	@rm -rf build/*

prepare:
	@mkdir -p build/api/
	@mkdir -p build/coverage/
	@mkdir -p build/logs/
	@mkdir -p build/pdepend/
	@mkdir -p build/phpdox/

composer:
	@composer install

lint:
	@vendor/bin/phplint src/
	@vendor/bin/phplint tests/

phploc:
	@vendor/bin/phploc --log-csv build/logs/phploc.csv --log-xml build/logs/phploc.xml src/

pdepend:
	@vendor/bin/pdepend --jdepend-xml=build/logs/jdepend.xml --jdepend-chart=build/pdepend/dependencies.svg --overview-pyramid=build/pdepend/overview-pyramid.svg src/

phpmd:
	@vendor/bin/phpmd src/ text phpmd.xml

phpmd-ci:
	@vendor/bin/phpmd src/ xml phpmd.xml --reportfile build/logs/pmd.xml

phpcs:
	@vendor/bin/phpcs --standard=PSR2 --extensions=php src/ tests/

phpcs-ci:
	@vendor/bin/phpcs --report=checkstyle --report-file=build/logs/checkstyle.xml --standard=PSR2 --extensions=php src/ tests/

phpcpd:
	@vendor/bin/phpcpd --log-pmd build/logs/pmd-cpd.xml src/

test:
	@vendor/bin/phpunit --colors

coverage:
	@vendor/bin/phpunit --colors --coverage-html=build/coverage

coverage-show:
	@open build/coverage/index.html

phpdox:
	@phpdox --file build/phpdox.xml

phpdox-show:
	@open build/api/index.html
