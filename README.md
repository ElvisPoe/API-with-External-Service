<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## 1. Quick Documentation

<h3>1. Get the project</h3>
git clone https://github.com/ElvisPoe/API.git

<h3>2. Install all the dependencies</h3>
composer install

<h3>3. Migrate database and seed with Articles and Comments</h3>
php artisan migrate --seed

<h3>4. App/Http/AriclesControllers</h3>
1. Manages the Article RESTfull resources (CRUD).
2. Manages the Comment RESTfull resources (CRUD).

<h3>4. App/Http/Middleware/VerifyCsrfToken</h3>
1. Exclude Articles*, So we can play around with the API.

<h3>5. App/Http/Requests</h3>
1. Custom Requests. For Validating the incoming Store/Update requests.

<h3>6. App/Http/Resources/ArticleResource</h3>
1. Resources to return.

<h3>7. App/Services</h3>
1. ArticleServices. Here we Create / Update / Delete the Articles on the external api. 
   We call it in controller functions.
   To be honest, I never worked on services like this before. 
   It may not be the best aproach. It's the best I could do for now.
   
<h3>8. More</h3>
1. There are several comments in the project just to explain every step.
Nothing more than the basics.
