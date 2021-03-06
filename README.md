<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## Quick Documentation

<h3>1. Get the project</h3>
git clone https://github.com/ElvisPoe/API.git

<h3>2. Install all the dependencies</h3>
<p>1. First run 'composer install'</p>
<p>2. Get .env file and set up the database with your credentials.(I didn't git the .env file for security reasons )</p>
<p>3. Run 'php artisan serve'</p>

<h3>3. Migrate database and seed with Articles and Comments</h3>
Run 'php artisan migrate --seed'
<p>I generated about 100 Articles and 1000 Comments.</p>
<p>* Seeding with 1000 Articles and 10.000 (1000*10) comments took too much time to complete the command. You can still change it in database\seeders\DatabaseSeeder.php</p>

<h3>4. App/Http/Controllers/API</h3>
<p>1. ArticlesController Manages the Article resources (CRUD).</p>
<p>2. CommentsController Manages the Comment resources (CRUD).</p>

<h3>5. App/Http/Middleware/VerifyCsrfToken</h3>
1. Exclude Articles and Comments, so we can play around with the API.

<h3>6. App/Http/Requests</h3>
1. Custom Requests. For Validating the incoming Store/Update requests.

<h3>7. App/Http/Resources</h3>
1. Resources to return. In case we need the data in a specific format.

<h3>8. App/Services</h3>
1. ArticleServices. Here we Create / Update / Delete the Articles on the external service.
   We call each service method in ArticlesController functions.

<h3>9. config/services.php</h3>
1. Here I stored some necessary info about the External Service.

<h3>10. Endpoints</h3>
   <p>GET /articles Returns all the articles</p>
   <p>POST /articles Creates a new article</p>
   <p>PUT /articles/{id} Updates a specific article</p>
   <p>DELETE /articles/{id} Deletes a specific article</p>
   <p>GET /comments Returns all the comments</p>
   <p>POST /comments Creates a new comment</p>
   <p>PUT /comments/{id} Updates a specific comment</p>
   <p>DELETE /comments/{id} Deletes a specific comment</p>

<h3>11. More</h3>
1. There are several comments in the project just to explain every step.
   Nothing more than the basics.
   
2. I tested the API with Postman.
   I disabled the authorization and the CSRF Token so all we have to do is set the header to Accept 'application/json' and we are ready.

