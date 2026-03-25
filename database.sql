CREATE DATABASE IF NOT EXISTS autocompletion CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE autocompletion;

DROP TABLE IF EXISTS pokemon;

CREATE TABLE pokemon (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    type1 VARCHAR(50) NOT NULL,
    type2 VARCHAR(50) DEFAULT NULL,
    description TEXT NOT NULL,
    image VARCHAR(255) DEFAULT NULL
);

INSERT INTO pokemon (nom, type1, type2, description, image) VALUES
('Bulbizarre', 'Plante', 'Poison', 'Pokémon graine de la première génération.', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/1.png'),
('Herbizarre', 'Plante', 'Poison', 'Évolution de Bulbizarre.', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/2.png'),
('Florizarre', 'Plante', 'Poison', 'Évolution finale de Bulbizarre.', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/3.png'),
('Salamèche', 'Feu', NULL, 'Pokémon lézard avec une flamme au bout de la queue.', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/4.png'),
('Reptincel', 'Feu', NULL, 'Évolution de Salamèche.', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/5.png'),
('Dracaufeu', 'Feu', 'Vol', 'Évolution finale de Salamèche.', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/6.png'),
('Carapuce', 'Eau', NULL, 'Pokémon tortue très populaire.', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/7.png'),
('Carabaffe', 'Eau', NULL, 'Évolution de Carapuce.', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/8.png'),
('Tortank', 'Eau', NULL, 'Évolution finale de Carapuce.', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/9.png'),
('Chenipan', 'Insecte', NULL, 'Petit Pokémon insecte.', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/10.png'),
('Chrysacier', 'Insecte', NULL, 'Évolution de Chenipan.', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/11.png'),
('Papilusion', 'Insecte', 'Vol', 'Papillon Pokémon.', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/12.png'),
('Roucool', 'Normal', 'Vol', 'Petit oiseau très courant.', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/16.png'),
('Roucoups', 'Normal', 'Vol', 'Évolution de Roucool.', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/17.png'),
('Roucarnage', 'Normal', 'Vol', 'Évolution finale de Roucool.', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/18.png'),
('Pikachu', 'Électrik', NULL, 'La mascotte emblématique de Pokémon.', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/25.png'),
('Raichu', 'Électrik', NULL, 'Évolution de Pikachu.', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/26.png'),
('Sabelette', 'Sol', NULL, 'Pokémon qui aime creuser.', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/27.png'),
('Sablaireau', 'Sol', NULL, 'Évolution de Sabelette.', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/28.png'),
('Mélofée', 'Fée', NULL, 'Pokémon adorable venu de la lune selon les rumeurs.', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/35.png'),
('Goupix', 'Feu', NULL, 'Pokémon renard à plusieurs queues.', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/37.png'),
('Rondoudou', 'Normal', 'Fée', 'Pokémon connu pour sa chanson.', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/39.png'),
('Nosferapti', 'Poison', 'Vol', 'Pokémon chauve-souris.', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/41.png'),
('Mystherbe', 'Plante', 'Poison', 'Pokémon herbe qui aime la lune.', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/43.png'),
('Paras', 'Insecte', 'Plante', 'Petit crabe avec des champignons sur le dos.', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/46.png'),
('Mimitoss', 'Insecte', 'Poison', 'Pokémon aux grands yeux.', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/48.png'),
('Caninos', 'Feu', NULL, 'Pokémon chien de feu.', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/58.png'),
('Psykokwak', 'Eau', NULL, 'Pokémon souvent pris de migraines.', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/54.png'),
('Abra', 'Psy', NULL, 'Pokémon capable de se téléporter.', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/63.png'),
('Machoc', 'Combat', NULL, 'Pokémon très fort physiquement.', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/66.png');