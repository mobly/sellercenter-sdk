all: clean coverage coverage-show

clean:
	@rm -rf build/artifacts/*

test:
	@vendor/bin/phpunit --colors

coverage:
	@vendor/bin/phpunit --colors --coverage-html=build/artifacts/coverage

coverage-show:
	@open build/artifacts/coverage/index.html
