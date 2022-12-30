# init-passport: new laravel project init laravel/passport etc dependence.
init-passport:
	# passport
	composer require laravel/passport "4.0.*" --with-all-dependencies
	php artisan migrate
	php artisan passport:install
	php artisan vendor:publish --tag=passport-components

	# jwt
	composer require lcobucci/jwt=3.3.3

# init-rbac: new laravel project init laravel/passport etc dependence.
#init-rbac:
#	composer require santigarcor/laratrust=5.1
#
#	# init laratrust
#	php artisan vendor:publish --tag="laratrust"
#	php artisan config:clear
#	php artisan laratrust:setup
#	composer dump-autoload
#	php artisan migrate

# init-rbac: new laravel project init laravel/passport etc dependence.
init-rbac:
	composer require encore/laravel-admin=1.8.19
	php artisan vendor:publish --provider="Encore\Admin\AdminServiceProvider"
	php artisan admin:install
	composer require doctrine/dbal=2.13 -W

init-pusher:
	composer require vinkla/pusher
	php artisan vendor:publish


# mock create mock data.
mock:
	php artisan laratrust:seeder
	php artisan db:seed --class=LaratrustSeeder

# uuid: gen laravel/passport uuids
uuid:
	php artisan passport:install --uuids

# publish: when deploy smis first time need publish to create passport keys.
publish:
	php artisan passport:keys

run-npm:
	npm run dev

run:
	php artisan serve
