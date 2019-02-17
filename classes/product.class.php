<?php
class Product {
        private $id;
        private $prix;
        private $titre;
        private $couleur;
        private $description;
        private $categorie;

        function addProduct(){
            $query =
            '
                INSERT INTO
                    products
                    (Size, Matiere, Produit_Id)
                VALUES
                    (?, ?, ?)
            ';
            $resultSet = $pdo->prepare($query);
            $resultSet->execute([$_POST['Size'], $_POST['Matiere'], $_POST['Produit_Id']]);
        }

      
        public function getId()
        {
            return $this->id;
        }
        public function setId($id)
        {
            $this->id = $id;
        }


        public function settitre($titre)
        {
            $this->titre = $titre;
        }
        public function gettitre()
        {
            return $this->titre;
        }

      


        public function setprix($prix)
        {
            $this->prix = $prix;
        }
        public function getprix()
        {
            return $this->prix;
        }

       

       

        public function setdescription($description)
        {
            $this->description = $description;
        }
        public function getdescription()
        {
            return $this->description;
        }

        public function setcouleur($couleur)
        {
            $this->couleur = $couleur;
        }
        public function getcouleur()
        {
            return $this->couleur;
        }

        public function setcategorie($categorie)
        {
            $this->categorie = $categorie;
        }
        public function getcategorie()
        {
            return $this->categorie;
        } 

    }