<?php

$pdo = new PDO("mysql:host=localhost; dbname=bd_gestion", "root", "");

function ajouterClient($nom, $ville, $tel)
{
    global $pdo;
    $sql = "INSERT INTO clients VALUES(null, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(1, $nom, pdo::PARAM_STR);
    $stmt->bindValue(2, $ville, pdo::PARAM_STR);
    $stmt->bindValue(3, $tel, pdo::PARAM_STR);
    return $stmt->execute();
}

function supprimerClient($id)
{
    global $pdo;
    $sql = "DELETE FROM clients WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(1, $id, pdo::PARAM_INT);
    return $stmt->execute();
}

function modifierClient($id, $nom, $ville, $tel)
{
    global $pdo;
    $sql = "UPDATE clients SET nom=:nom, ville=:ville, telephone=:tel WHERE id=:id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue('id', $id, pdo::PARAM_INT);
    $stmt->bindValue('nom', $nom, pdo::PARAM_STR);
    $stmt->bindValue('ville', $ville, pdo::PARAM_STR);
    $stmt->bindValue('tel', $tel, pdo::PARAM_STR);
    return $stmt->execute();
}

function getClient($id)
{
    global $pdo;
    $sql = "SELECT * FROM clients where id=?";
    $stmt = $pdo->prepare($sql);
  
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_OBJ);
}

function getAllClients()
{
    global $pdo;
    $sql = "SELECT * FROM clients";
    $stmt = $pdo->prepare($sql);
  
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}