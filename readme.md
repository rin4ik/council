 > In order to install it on your machine follow steps below
 
 TODO
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
 
 1. Visit: http://council.test/register and register an account.
 1. Edit `config/council.php`, adding the email address of the account you just created.
 1. Visit: http://council.test/admin/channels and add at least one channel.  
 
 ### Step 3.
 
 reCAPTCHA is a Google tool to help prevent forum spam. You'll need to create a free account (don't worry, it's quick). 
 
 [https://www.google.com/recaptcha/intro/](https://www.google.com/recaptcha/intro/)
 
 Choose reCAPTCHA V2, and specify your local (and eventually production) domain name, as illustrated in the image below.
 
 ![recaptcha example](https://photos-2.dropbox.com/t/2/AAD0oUp45M_jCBaogaf-bMudZEX6rjtDf8kRF0OtfMD4EQ/12/774859/png/32x32/3/1515013200/0/2/Screenshot%202018-01-03%2011.11.02.png/ENqvYBiOvfHGASAHKAc/Vk2xX4J2ADXnunB9_47pmBAU23j_QVDVgHjxD5rEfTI?dl=0&preserve_transparency=1&size=2048x1536&size_mode=3)
 
 Once submitted, you'll see two important keys that should be referenced in your `.env` file. 
 

 ```
 RECAPTCHA_KEY=PASTE_KEY_HERE
 RECAPTCHA_SECRET=PASTE_SECRET_HERE
 ```
 
 ### Step 4.
 
 Until an administration portal is available, manually insert any number of "channels" (think of these as forum categories) into the "channels" table in your database.
 
 Once finished, clear your server cache, and you're all set to go!
 
 ```
 php artisan cache:clear
 ```
 
 ### Step 5.
 
 Use your forum! Visit `http://council.dev/threads` to create a new account and publish your first thread.