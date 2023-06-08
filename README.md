<h1 align="center">Money-tracking</h1>
  <p> A Laravel project for tracking money with checkpoints on a map.
 <h2>Description:</h2>
  <p>The project allows users to track banknotes by associating them with checkpoints. Each checkpoint represents a location on the map and includes the date, comment, and optional photo.</p>
<h2>Features:</h2>
<ul>

- User authentication: Sign up, sign in, and sign out functionality.
- Banknote tracking: Add banknotes with their serial numbers and prices.
- Checkpoint creation: Add checkpoints with location, date, comment, and photo.
- Google Maps integration: Display checkpoints on a map with markers.
- Route generation: Draw routes connecting all the checkpoints.
</ul>

<h2> Installation </h2>
<ul>
    
- Clone the repository: git clone https://github.com/your-username/your-repo.git.<br>
- Install dependencies: composer install.<br>
- Copy the .env.example file to .env.<br>
- Generate the application key: php artisan key:generate.<br>
- Configure the database connection in the .env file.<br>
</ul>

<h2> Start steps</h2>

1. Create containers:

```make build```

2. Run them:

```make up```

3. Check them:

```make ps```

4. Create tables in the database:

```make migrate``` 
5. After registration run: docker compose exec php-fpm php artisan queue:work


<h2>Usage </h2>
<ul>
    
- Sign up or sign in to access the application.<br>
- Add banknotes by entering the serial number and price.<br>
- Create checkpoints by providing the location, date, comment, and optional photo.<br>
- View checkpoints on the map.<br>
- Click on a marker to view the checkpoint details.<br>
- The routes connecting the checkpoints will be automatically generated.<br>
</ul>
