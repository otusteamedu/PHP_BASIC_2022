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
    $username = $this->_username;

    if ($limit == 'all') {
      return '';
    }

    $start = 1;
    $end = ceil($this->_total / $limit);
    $class = ($this->_page == $start) ? "page-item disabled" : "page-item";

    $html = '<ul class="pagination justify-content-center">';

    if ($username) {
      $html .= '<li class="' . $class . '"><a class="page-link" href="?username=' . $username . '&limit=' . $limit . '&page=' . ($this->_page - 1) . '">Previous</a></li>';
      for ($i = $start; $i <= $end; $i++) {
        $class = ($this->_page == $i) ? "active" : "";
        $html .= '<li class="' . $class . '"><a class="page-link" href="?username=' . $username . '&limit=' . $limit . '&page=' . $i . '">' . $i . '</a></li>';
      }
      $class = ($this->_page == $end) ? "disabled" : "";
      $html .= '<li class="' . $class . '"><a class="page-link" href="??username=' . $username . '&limit=' . $limit . '&page=' . ($this->_page + 1) . '">Next</a></li>';

    } else {
      $html .= '<li class="' . $class . '"><a class="page-link" href="?limit=' . $limit . '&page=' . ($this->_page - 1) . '">Previous</a></li>';
      for ($i = $start; $i <= $end; $i++) {
        $class = ($this->_page == $i) ? "active" : "";
        $html .= '<li class="' . $class . '"><a class="page-link" href="?limit=' . $limit . '&page=' . $i . '">' . $i . '</a></li>';
      }
      $class = ($this->_page == $end) ? "disabled" : "";
      $html .= '<li class="' . $class . '"><a class="page-link" href="?limit=' . $limit . '&page=' . ($this->_page + 1) . '">Next</a></li>';
    }

    $html .= '</ul>';

    return $html;
  }
}