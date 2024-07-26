<?php
$pathImg = "img/";

function getAllOeuvres()
{
    return "SELECT * FROM `oeuvres`";
}

function getOneOeuvre()
{
    return "SELECT * FROM `oeuvres` WHERE `id` = :id";
}

function createOeuvre()
{
    return "INSERT INTO `oeuvres` (`titre`, `artiste`, `description`, `image_url`, `image_alt`) VALUES (:titre, :artiste, :description, :image_url, :image_alt)";
}
