<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## 1. Quick Documentation

<h3>1. Get the project</h3>
git clone https://github.com/ElvisPoe/API.git

<h3>2. Install all the dependencies</h3>
1. First run 'composer install'
2. Get .env file and set up the database with your credentials.
   ( I didn't git the .env file for security reasons )
2. Run 'php artisan serve'

<h3>3. Migrate database and seed with Articles and Comments</h3>
php artisan migrate --seed
<p>I generate about 100 Articles and 1000 Comments.</p>
<p>Seeding with 1000 Articles and 10.000 (1000*10) comments took too much time to complete the command. You can still change it in database\seeders\DatabaseSeeder.php</p>

<h3>4. App/Http/Controllers/API</h3>
1. ArticlesController Manages the Article resources (CRUD).
2. CommentsController Manages the Comment resources (CRUD).

<h3>4. App/Http/Middleware/VerifyCsrfToken</h3>
1. Exclude Articles and Comments, so we can play around with the API.

<h3>5. App/Http/Requests</h3>
1. Custom Requests. For Validating the incoming Store/Update requests.

<h3>6. App/Http/Resources</h3>
1. Resources to return.

<h3>7. App/Services</h3>
1. ArticleServices. Here we Create / Update / Delete the Articles on the external api.
   We call each service in ArticlesController functions.
   To be honest, I've never worked on an external service like this before.
   It may not be the best aproach.

<h3>8. config/services.php</h3>
1. Here I stored some necessary info about the External Service.

<h3>9. Endpoints</h3>
   <p>GET /articles Returns all the articles</p>
   <p>POST /articles Creates a new article</p>
   <p>PUT /articles/{id} Updates a specific article</p>
   <p>DELETE /articles/{id} Deletes a specific article</p>
   <p>GET /comments Returns all the comments</p>
   <p>POST /comments Creates a new comment</p>
   <p>PUT /comments/{id} Updates a specific comment</p>
   <p>DELETE /comments/{id} Deletes a specific comment</p>

<h3>10. More</h3>
1. There are several comments in the project just to explain every step.
   Nothing more than the basics.
   
2. I tested the API with Postman.
   I disabled the authorization and the CSRF Token so all we have to do is set the header to Accept 'application/json' and we are ready.

