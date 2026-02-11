<?php 

echo '<h2>Classes existantes : </h2>';
echo '<pre>'; print_r(get_declared_classes()); echo '</pre>';

echo '<h2>Interfaces existantes : </h2>';
echo '<pre>'; print_r(get_declared_interfaces()); echo '</pre>';

trait Trait1
{
    public function direBonjour()
    {
        return 'Bonjour à tous';
    }
}

echo '<h2>Traits existants : </h2>';
echo '<pre>'; print_r(get_declared_traits()); echo '</pre>';

// $maVariable = 123;

// echo '<h2>Variables existants : </h2>';
// echo '<pre>'; print_r(get_defined_vars()); echo '</pre>';