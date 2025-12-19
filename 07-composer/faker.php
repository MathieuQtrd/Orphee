<?php 

# composer require fakerphp/faker

// https://github.com/fakerPHP/Faker

require __DIR__ . '/vendor/autoload.php';

$faker = Faker\Factory::create('fr_FR');

// var_dump($faker);
// var_dump(get_class_methods($faker));

echo '<h2>Données Users</h2>';
for($i = 0; $i < 5; $i++) {
    echo 'Nom : ' . $faker->name . '<br>';
    // echo 'Prénom : ' . $faker->firstName . '<br>';
    // echo 'Nom de famille : ' . $faker->Lastname . '<br>';
    echo 'Email : ' . $faker->email . '<br>';
    echo 'Téléphone : ' . $faker->phoneNumber . '<br>';
    echo 'Date de naissance : ' . $faker->date('d/m/Y') . '<br>';
    echo 'Adresse : ' . $faker->address . '<hr>';
}

echo '<h2>Textes</h2>';
echo 'Phrase : ' . $faker->sentence() . '<hr>';
echo 'Paragraphe : ' . $faker->paragraph() . '<hr>';
echo 'Texte : ' . $faker->text(1500) . '<hr>';

echo '<h2>Entreprise</h2>';
echo 'Entreprise : ' . $faker->company . '<br>';
echo 'Slogan : ' . $faker->catchPhrase . '<br>';
echo 'Métier : ' . $faker->jobTitle . '<hr>';