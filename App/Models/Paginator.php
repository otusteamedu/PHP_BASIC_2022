<?php

namespace App\Models;

class Paginator {

  private $_pdo;
  private $_limit;
  private $_page;
  private $_query;
  private $_total;
  private $_username;

  public function __construct($pdo, $query, $count, $username) {

    $this->_query = $query;
    $this->_username = $username;
    $this->_pdo = $pdo;
    $this->_total = $count;
  }

  public function getData($limit, $page) {

    $this->_limit = $limit;
    $this->_page = $page;

    if ($this->_limit == 'all') {
      $query = $this->_query;
    } else {
      $query = $this->_query . " LIMIT " . (($this->_page - 1) * $this->_limit) . ", $this->_limit";
    }

    $rs = $this->_pdo->prepare($query);
    $rs->execute();

    $results = [];

    while ($row = $rs->fetch()) {
      $results[] = $row;
    }
    return $results;
  }

  public function createLinks() {

    $limit = $this->_limit;
    $start = 1;
    $end = ceil($this->_total / $limit);

    if ($limit == 'all') {
      return '';
    }

    return array(
      'limit' => $limit,
      'username' => $this->_username,
      'start' => $start,
      'end' => $end,
      'page' => $this->_page,
    );
  }
}
