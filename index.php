<?php

// require
require "models/Category.php";

// instancier
$category = new Category("Catégorie 1");

// var_dump
echo "<pre>";
var_dump($category);
echo "</pre>";

// setId
$category->setId(1);

// var_dump
echo "<pre>";
var_dump($category);
echo "</pre>";

// require category manager
require "managers/AbstractManager.php";
require "managers/CategoryManager.php";

// instancier category manager
$manager = new CategoryManager();

// var_dump du manager
echo "<pre>";
var_dump($manager);
echo "</pre>";

// var_dump de la méthode findAll du Manager
echo "<pre>";
var_dump($manager->findAll());
echo "</pre>";
