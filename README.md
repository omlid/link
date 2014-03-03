# Link Helper for Laravel v4.*

This allows you to name pre-defined URL templates and dynamically output them

### Installation
1.	Add `"punn/laymode": "dev-master"` to `app/config/app.php` in the `require`
2.	Add `'Punn\Link\LinkServiceProvider',` to the `providers` array in `app/config/app.php`
3.	Add `'Link' => 'Punn\Link\Facades\Link'` to the `aliases` array in `app/config/app.php`
4.	You may have to run `composer dump-autoload` or `php composer.phar dump-autoload` inside your laravel project's root
5.	Create a file called `links.php` in your `app` directory
6.	At the bottom of `app/start/global.php`, add this:
```php
/*
|--------------------------------------------------------------------------
| Require Links File
|--------------------------------------------------------------------------
|
| Add links the website's views and controllers should use to output URLs
|
*/
require app_path().'/links.php';
```
7.	Follow the examples below!

### Usage
#### Add a link
```php
Link::add($key, $path);
```
#### Get a link
```php
Link::get($key);
```
#### Dynamic URLs
```php
Link::add('post', '/article/[ID]/[SLUG]');
// get the post link absolutely
echo Link::get('post', array('id' => 15000, 'slug' => 'top-10-ways-to-help-the-world'));
// output: myapp.com/article/15000/top-10-ways-to-help-the-world

// get the post link relatively
echo Link::get('post', array('id' => 15000, 'slug' => 'top-10-ways-to-help-the-world'), false);
// output: /article/15000/top-10-ways-to-help-the-world
```

### Examples
#### Simple homepage URL:
1.	In `links.php`, add the following:
```php
Link::add('home', '/');
```
2.	In your views, you can retrieve the URL:
```php
Link::get('home');
```

### Notes
* Great for controlling your links in one centralized spot versus having to change paths in all views and controllers
* No need to remember the paths of your links