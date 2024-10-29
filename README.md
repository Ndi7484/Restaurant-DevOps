## How to run
- run "docker pull angelineho/restaurant-epsilon:app_1.0.0"
- run "docker pull angelineho/restaurant-epsilon:web_server"

- create file .env from file .env.example
- run "docker compose up"
- run "docker exec it app php artisan config:cache"

run migration for the first time
- run "docker exec -it app php artisan migrate"

run seeder only for once for starter data dummy
- run "docker exec -it app php artisan db:seed"

NB: you can use admin account after run the seeder:
email: admin@gmail.com
password: password

Access application: http://127.0.0.1:8000