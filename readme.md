 # Council [![Build Status](https://travis-ci.org/rin4ik/council.svg?branch=master)](https://travis-ci.org/rin4ik/council)

 ## Installation
 
 ### Step 1.
 
 > To run this project, you must have PHP 7 installed as a prerequisite.

 Begin by cloning this repository to your machine, and installing all Composer dependencies.
 
 ```bash
 git clone git@github.com:rin4ik/council.git
 cd council && composer install
 php artisan key:generate
 mv .env.example .env
 ```
 
 ### Step 2.
 
Until an administration portal is available, manually insert any number of "channels" (think of these as forum categories) into the "channels" table in your database.
 
     Visit: http://council.test/register and register an account.
 1. Edit `config/council.php`, adding the email address of the account you just created.
 1. Visit: http://council.test/admin/channels and add at least one channel.  
 