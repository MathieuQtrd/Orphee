<?php  
/*
Modéliser une BDD permettant de gérer les expositions des musées en France, les oeuvres, artistes et la localisation de ces expositions.
    - On veut aussi suivre quels musées ont exposé quelles oeuvres lors de quelles expositions.

Tables minimales à prévoir
-------------------------
    - museum (musée)
    - city (ville)
    - region (région)
    - artwork oeuvre)
    - artist (artiste)
    - exhibition (exposition)
    - theme (thème d’exposition) (pour le N–N)
    - exhibition_artwork (table pivot)
    - exhibition_theme (table pivot)

Relations attendues
-------------------
1) One-to-many / Many-to-one
    - region (1) -> (N) city
    - city (1) -> (N) museum
    - museum (1) -> (N) exhibition
    - artist (1) -> (N) artwork

2) Many-to-many
    - Exposition ↔ oeuvre
        - exhibition (N) <-> (N) artwork via exhibition_artwork
            - Dans la table pivot, il est possible d'ajouter :
                - display_room (salle)
                - display_start_at, display_end_at
    - Exposition ↔ Thème
        - exhibition (N) <-> (N) theme via exhibition_theme


Conseils
--------
    - Une exhibition a : title, start_at, end_at, museum_id.
    - Un artist a : name, birth_year, death_year (nullable), nationality (optionnel).
    - Une artwork a : title, year_created (optionnel), type (peinture, sculpture…), artist_id.
    - Une oeuvre peut apparaître dans plusieurs expositions (d’où le N–N).

*/