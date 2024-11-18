<?php

class Pays {
    private ?int $id_pays;
    private ?string $nom_pays;
    private ?int $code_iso;
    private ?string $population;

    // Constructor
    public function __construct(?int $id_pays, ?string $nom_pays, ?int $code_iso, ?string $population) {
        $this->id_pays = $id_pays;
        $this->nom_pays = $nom_pays;
        $this->code_iso = $code_iso;
        $this->population = $population;
    }

    // Getters and Setters

    public function getIdPays(): ?int {
        return $this->id_pays;
    }

    public function setIdPays(?int $id_pays): void {
        $this->id_pays = $id_pays;
    }

    public function getNomPays(): ?string {
        return $this->nom_pays;
    }

    public function setNomPays(?string $nom_pays): void {
        $this->nom_pays = $nom_pays;
    }

    public function getCodeIso(): ?int {
        return $this->code_iso;
    }

    public function setCodeIso(?int $code_iso): void {
        $this->code_iso = $code_iso;
    }

    public function getPopulation(): ?string {
        return $this->population;
    }

    public function setPopulation(?string $population): void {
        $this->population = $population;
    }
}

?>
