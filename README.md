<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Mini CRM Test Project

## How to test it?

1. Pull the `main` branch to your local machine
2. Add this to your .env file `MAP_BOX_TOKEN=pk.eyJ1IjoiZ21vbmNsb3VkIiwiYSI6ImNsZmpvdzIycjAydzUzdG15NjJwZ3JicHoifQ.QjODdPKjhEFF_rKH1l03tg`
3. Run `composer install`
4. Run `php artisan migrate`
5. Run `php artisan db:seed --class=DatabaseSeeder`
6. Run `yarn dev` to display the front-end properly
7. If your are working in a Windows machine make sure you configure your host file to the local domain that you prefer, mine is https://minicrm.local/
8. Screenshot for login page: 

![image](https://user-images.githubusercontent.com/104826224/227923147-5cbbd5dd-b46b-41b0-bc92-9593a3472143.png)

9. Use this credential to login to the admin:
username: admin@property.com
password: password
10. Screenshot for the dashboard: 

![image](https://user-images.githubusercontent.com/104826224/227923825-5c018003-da67-44aa-b48e-789979db29aa.png)


## PROPERTY TYPE

1. Visit the property type page: https://minicrm.local/property_types
2. Create a property type: 

![image](https://user-images.githubusercontent.com/104826224/227923379-76fe305c-d9f3-44a9-8f9d-3ac0c64739fe.png)

3. You can upload multiple images (the system has no limit in image upload, only jpg, jpeg and png should be allowed)
4. Edit a property type by clicking the 3 dots under action column
5. Delete a property type
6. There is a bug in showing the edit property, the is_active is not selected in the display but the update process is working properly.

## PROPERTY
1. Visit the property page: https://minicrm.local/properties

![image](https://user-images.githubusercontent.com/104826224/227923980-c3742853-b7f9-4911-b7bf-9fe2bd500d53.png)


2. Fill out the form property:

![image](https://user-images.githubusercontent.com/104826224/227923059-153334d6-0d56-45ea-bea3-f308041847f9.png)
 
3. For the Addressable type make sure your value is using the following:
`Home`, `Work`, `Business`, `Shipping`, `Biling`, `Mailing`, `Primary`, `Secondary`
This supposed to be in a dropdown but its not implemented yet in the front-end. It will create an error if input a value other then those `ENUM` value specified.
4. From address 1 until the country fields make sure that you input a correct data to get the correct longitude and latitude from MapBox else it will create an error that I haven't hadled yet.
5. After filling out the fields check the table for address, the longitude and latitude must have a value (this coming from MapBox already)
6. The Property Type data when showing the edit is not populating (this is a bug) but the data can be updated propertly
7. There is no way to delete and update the property images yet.
8. Delete a property (this will delete also the address associated with it.)

## PAGINATION
Pagination will show if the record is >= 10

## API endpoint
This will fetch all the records in properties (no token needed)
https://minicrm.local/api/v1/properties

## File Changes
You can visit here:
[https://github.com/gmoncloud/mini-crm/pull/1](https://github.com/gmoncloud/mini-crm/pull/1/commits/64d765caff1f471c6d11cee70d8ce942c22bab5b)
[https://github.com/gmoncloud/mini-crm/pull/2](https://github.com/gmoncloud/mini-crm/pull/2/commits/fd3326a66d66608acea061384158151b963d2a25)
[https://github.com/gmoncloud/mini-crm/pull/3](https://github.com/gmoncloud/mini-crm/pull/3/commits/331cb0069869032cb54608a4821e42359a1f3257)
[https://github.com/gmoncloud/mini-crm/pull/4](https://github.com/gmoncloud/mini-crm/pull/4/commits/97a81ec3bcc48f0bca8fa921fb41e63e5d81d67b)

