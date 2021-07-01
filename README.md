# Mars Rover TEST

Features:
- Give initial starting point (x and y) of the rover and the initial facing direction of the rover (N, S, E, W)
- Rover takes the commands. (e.g FRLFLFLFR)
    - F = move forward
    - R = turn right
    - L = turn left
- Implemented on a 200x200 planet
- With obstacle detection

Setup:
- After cloning, run `composer install` and then `npm i && npm run prod` (in case you don't have the app.css and app.js files) copy the `.env.development` file to `.env` and run `php artisan key:generate`
- Run `php artisan serve` and access via [http://127.0.0.1:8000/](http://127.0.0.1:8000/) 
