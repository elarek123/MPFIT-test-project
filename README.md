# Test project for MPFIT
## Требования
- Работать из под non-root пользователя
- Docker и Docker Compose
## Разворачиваем проект 
- `make env` 
- заполнить файл `.env`
- `make build`
- `make up`
- `docker compose exec app bash -c "composer install && php artisan key:generate && php artisan migrate"`
- `docker compose exec app bash -c "php artisan filament:user"` - создание пользователя для панели администратора

## Проект состоит из
- [Filament](https://filamentphp.com/)
- [Laravel](https://laravel.com/)
- [Docker](https://www.docker.com/)


