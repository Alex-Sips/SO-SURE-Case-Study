This is a basic login serive that has a login page and then seperate pages depending on the user level. For this kind of thing usually I would just use Auth which is the inbuilt user authentication for laravel but feel like it wouldve defeated the point of the tests. 

I did not serilize the users password in the case as it was not a requirement but probaly should have.

For docker the database and the app are being mask to different ports and as the standard ports is being used by my other local

To Run the service you must have docker up and running and run 
```
docker-compose build
docker-composer up
docker-compose exec app bash
php artisan key:generate
php artisan config:cache
```

You will only have to run the key generate once this should probably be moved to be done in docker.

If you want to have the existing users that where in the test case you can run these commands to migrate and seed the database
```
docker-compose run app php artisan migrate
docker-compose run app php artisan db:seed
```

If you want to run this command on one line you can do

```
docker-compose run app php artisan migrate:fresh --seeder="Database\Seeders\DatabaseSeeder"
```

If you want to run the test you can do it with 

```
docker-compose run app vendor/bin/phpunit
```
