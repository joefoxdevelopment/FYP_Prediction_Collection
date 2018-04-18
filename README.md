#FYP_Prediction_Collection
## Joe Fox U1454236

### GitHub repository
https://github.com/joefoxdevelopment/FYP_Prediction_Collection

### Requirements
1) PHP 7.x.x
2) Composer PHP package manager installed globally
3) SQL based relational database system

It is recommended you run this on a system you have access to a Unix terminal.

### Set up instructions
1) Run `composer install` in this directory to install the dependencies.
2) Copy the `.env.example` file to `.env` using `cp .env.example .env`.
3) Open the `.env` file you just created in a text editor and add the details
for the relational database connection. By default, there are connection details
for an Sqlite database file located in the `database/` directory. To create an 
Sqlite database file, running `touch database/database.sqlite` from this 
directory will suffice. Bundled with the code there is a compressed copy of an 
Sqlite database file with the set of user predictions that were used to train 
the learning algorithms, this file can be placed into the database directory 
(if you do this, skip step 4).
4) Run the following command to create the required database tables.
`php artisan:migrate`
5) Run the following command to generate the app encryption key.
`php artisan key:generate`
6) Run the following command to add the predictable matches to the database.
`php artisan match:add-predictable`
7) The system is now ready to collect predictions. Start it by configuring your
server to point at the `public/index.php` file or by running the command
`php artisan serve` to run the application on your local test server.
8) Once all the required predictions are collected, you can export the
prediction data by running either of the two commands 
`php artisan export:user-predictions` (HomeTeam, AwayTeam, HomeGoals, AwayGoals)
 format or `php artisan export:hyphenated-predictions` 
 (HomeTeam, AwayTeam, HomeGoals-AwayGoals) format.

### Match Data Source
Historic football match data from http://www.football-data.co.uk/englandm.php.
Data used from 2010/11 Premier League season to the 1017/18 Premier League
season (last matchday used is 16th April 2018).
