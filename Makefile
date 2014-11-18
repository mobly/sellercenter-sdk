all: clean coverage

clean:
	rm -rf build/artifacts/*

test:
	vendor/bin/phpunit --colors

testsuite:
	vendor/bin/phpunit --testsuite=unit $(TEST)

travis:
	vendor/bin/phpunit --colors --coverage-text

coverage:
	vendor/bin/phpunit --colors --coverage-html=build/artifacts/coverage

coverage-show:
	open build/artifacts/coverage/index.html
