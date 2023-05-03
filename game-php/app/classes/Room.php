<?php

class Room {
    private string $name;
    private string $description;
    private string $type;
    private int $donjon_id;
    private int $or;

    public function __construct($room)
    {
        $this->name = $room['name'];
        $this->description = $room['description'];
        $this->type = $room['type'];
        $this->donjon_id = $room['donjon_id'];
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getHTML(): string
    {
        $html = "";

        switch ($this->type) {
            case 'vide':
                $html .= "<p class='mt-4'><a href='donjon_play.php?id=". $this->donjon_id ."' class='btn btn-green'>Continuer l'exploration</a></p>";
                break;

            case 'treasure':
                $html .= "<p class='mt-4'>Vous avez gagné " . $this->or . " pièce d'or</p>";
                $html .= "<p class='mt-4'><a href='donjon_play.php?id=". $this->donjon_id ."' class='btn btn-green'>Continuer l'exploration</a></p>";
                break;

            case 'combat':
                $html .= "<p class='mt-4'><a href='donjon_fight.php?id=". $this->donjon_id ."' class='me-2 btn btn-green'>Combattre</a>";
                $html .= "<a href='donjon_play.php?id=". $this->donjon_id ."' class='btn btn-blue'>Fuir et continuer l'exploration</a></p>";
                break;
            
            default:
                $html .= "<p>Aucune action possible !</p>";
                break;
        }

        return $html;
    }

    public function makeAction(): void
    {
        switch ($this->type) {
            case 'vide':
                break;

            case 'treasure':
                $this->or = rand(0, 20);
                $_SESSION['perso']['gold'] += $this->or;
                break;

            case 'combat':
                break;
            
            default:
                break;
        }
    }

}