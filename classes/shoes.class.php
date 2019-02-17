<?php
class Shoes extends Product{

        private $id;
        private $size;
        private $matiere;
        private $produit_id;

        public function getid(){
            return  $this->id;
          }

        public function setsize(){
            $this->size=$size;
        }
        public function getsize(){
          return  $this->size;
        }
        public function setmatiere(){
            $this->matiere=$matiere;
        }
        public function getmatiere(){
          return  $this->matiere;
        }
       
        public function getproduit_id(){
          return  $this->produit_id;
        }





}