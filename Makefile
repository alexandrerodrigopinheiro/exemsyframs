
drop:
	@php artisan db:wipe


fresh:
	@php artisan migrate:fresh


run:
	@php artisan serve --host=192.168.3.4 --port=8000


clean:
	@php artisan cache:clear
	@php artisan view:cache
	@php artisan view:clear
	@php artisan config:cache
	@php artisan config:clear
	@php artisan event:cache
	@php artisan event:clear
	@php artisan route:clear
	@php artisan route:cache