This is Sample Laravel todo app<br/>
-- Installation <br/>
1-clone or download the repo<br/>
2- run <br/>
    composer install<br/>
to install necessary packages<br/>
3-rename the .env.example file to .env and add database connection<br/>
4- run<br/>
    php artisan key:generate<br/>
5-run <br/>
    php artisan migrate<br/> 
to create necessary tables<br/>
6-run <br/>
    php artisan db:seed<br/> 
to seed the database <br/>
7- run <br/>
    php artisan passport:keys<br/>
    php artisan passport:client --personal<br/>
to generate passport keys<br/>
8- default username/password test@example.com/password<br/>

-- Routes<br/>
POST            api/api_login<br/> 
POST            api/api_register <br/>
GET|HEAD        api/tasks <br/>
POST            api/tasks <br/>
GET|HEAD        api/tasks/{id} <br/>
PUT|PATCH       api/tasks/{id} <br/>
DELETE          api/tasks/{id}<br/>

-- Postman Collection<br/>
todo.postman_collection.json<br/>
