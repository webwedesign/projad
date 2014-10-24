<?php
class Hero_Manager
{
  private $db; // Instance de PDO
  
  public function __construct($db)
  {
    $this->db = $db;
  }
  
  public function add(Hero $hero)
  {
    $q = $this->db->prepare('INSERT INTO personnages_v2 SET nom = :nom, type = :type');
    
    $q->bindValue(':nom', $hero->nom());
    $q->bindValue(':type', $h


      ero->type());
    
    $q->execute();
    
    $Hero->hydrate(array(
      'id' => $this->db->lastInsertId(),
      'degats' => 0,
      'atout' => 0
    ));
  }
  
  public function count()
  {
    return $this->db->query('SELECT COUNT(*) FROM personnages_v2')->fetchColumn();
  }
  
  public function delete(Hero $hero)
  {
    $this->db->exec('DELETE FROM personnages_v2 WHERE id = '.$hero->id());
  }
  
  public function exists($info)
  {
    if (is_int($info)) // On veut voir si tel personnage ayant pour id $info existe.
    {
      return (bool) $this->db->query('SELECT COUNT(*) FROM personnages_v2 WHERE id = '.$info)->fetchColumn();
    }
    
    // Sinon, c'est qu'on veut vérifier que le nom existe ou pas.
    
    $q = $this->db->prepare('SELECT COUNT(*) FROM personnages_v2 WHERE nom = :nom');
    $q->execute(array(':nom' => $info));
    
    return (bool) $q->fetchColumn();
  }
  
  public function get($info)
  {
    if (is_int($info))
    {
      $q = $this->db->query('SELECT id, nom, degats, timeEndormi, type, atout FROM personnages_v2 WHERE id = '.$info);
      $hero = $q->fetch(PDO::FETCH_ASSOC);
    }
    
    else
    {
      $q = $this->db->prepare('SELECT id, nom, degats, timeEndormi, type, atout FROM personnages_v2 WHERE nom = :nom');
      $q->execute(array(':nom' => $info));
      
      $hero = $q->fetch(PDO::FETCH_ASSOC);
    }
    
    switch ($hero['type'])
    {
      case 'Hero_Tank': return new Hero_Tank($hero);
      case 'Hero_Healer': return new Hero_Healer($hero);
      default: return null;
    }
  }
  
  public function getList($nom)
  {
    $persos = array();
    
    $q = $this->db->prepare('SELECT id, nom, degats, timeEndormi, type, atout FROM personnages_v2 WHERE nom <> :nom ORDER BY nom');
    $q->execute(array(':nom' => $nom));
    
    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      switch ($donnees['type'])
      {
        case 'Hero_Tank': $persos[] = new Hero_Tank($donnees); break;
        case 'Hero_Healer': $persos[] = new Hero_Healer($donnees); break;
      }
    }
    
    return $persos;
  }
  
  public function update(Hero $hero)
  {
    $q = $this->db->prepare('UPDATE personnages_v2 SET degats = :degats, timeEndormi = :timeEndormi, atout = :atout WHERE id = :id');
    
    $q->bindValue(':degats', $hero->degats(), PDO::PARAM_INT);
    $q->bindValue(':timeEndormi', $hero->timeEndormi(), PDO::PARAM_INT);
    $q->bindValue(':atout', $hero->atout(), PDO::PARAM_INT);
    $q->bindValue(':id', $hero->id(), PDO::PARAM_INT);
    
    $q->execute();
  }
}