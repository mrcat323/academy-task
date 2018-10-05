# academy-task
Hey guys, it's another repository, solved simple task, it's students' system. The main controllers are teachers (we can call them users), they can add students, modify them, bind them to a courses, delete them. They can do almost everything with the poor students, but not students at all. *Let's get started!*
## Get started
First you have to just clone the repository to your machine saying:
```BASH
git clone https://github.com/mrcat323/academy-task
```
### Configuring
First generate a key:
```BASH
php artisan key:generate
```
### Database
Set up the **database**:
```BASH
cp .env.example .env
```
And change that DB details to yours, something like **DB_HOST**, **DB_DATABASE**, **DB_USERNAME**, **DB_PASSWORD** to yours.
### Dependencies
Then install all composer & NPM dependencies:
```BASH
composer install
npm install
```
Simply compile them *(just in case)*:
```BASH
npm run dev
```
### DBs
You need the database to work with project, and that's why type:
```BASH
php artisan migrate
```
After that to simplify your work, not adding data to DB and wasting time, I prepared the seeders for you, just run:
```BASH
php artisan db:seed --class=AllDataSeeder
```
If after running that you'll see such error like **Class not found** or something like that, say:
```BASH
composer dump-autoload
```
and then run the seeds again:
```BASH
php artisan db:seed --class=AllDataSeeder
```
### Usage
**Simply just run**:
```BASH
php artisan serve
```
and test that out. Go to Register page, type login details, sign up, just test it. Hope u'll enjoy it :cat2:
