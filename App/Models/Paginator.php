<?php

namespace App\Models;

class Paginator {

  private $_pdo;
  private $_limit;
  private $_page;
  private $_query;
  private $_total;

  public function __construct($pdo, $query, $countQuery) {

    $this->_query = $query;
    $this->_pdo = $pdo;
    $rs = $pdo->query($countQuery);
    $this->_total = $rs->fetchColumn();
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

    while ($row = $rs->fetch()) {
      $results[] = $row;
    }
    return $results;
  }

  public function createLinks() {

    if ($this->_limit == 'all') {
      return '';
    }

    $last = ceil($this->_total / $this->_limit);
    $start = (($this->_page - $last) > 0) ? $this->_page - $last : 1;
    $end = (($this->_page + $last) < $last) ? $this->_page + $last : $last;
    $html = '<ul class="pagination justify-content-center">';
    $class = ($this->_page == 1) ? "page-item disabled" : "page-item";
    $html .= '<li class="' . $class . '"><a class="page-link" href="?limit=' . $this->_limit . '&page=' . ($this->_page - 1) . '">Previous</a></li>';

    if ($start > 1) {
      $html .= '<li><a href="?limit=' . $this->_limit . '&page=1">1</a></li>';
      $html .= '<li class="disabled"><span>...</span></li>';
    }

    for ($i = $start; $i <= $end; $i++) {
      $class = ($this->_page == $i) ? "active" : "";
      $html .= '<li class="' . $class . '"><a class="page-link" href="?limit=' . $this->_limit . '&page=' . $i . '">' . $i . '</a></li>';
    }

    if ($end < $last) {
      $html .= '<li class="disabled"><span>...</span></li>';
      $html .= '<li><a href="?limit=' . $this->_limit . '&page=' . $last . '">' . $last . '</a></li>';
    }

    $class = ($this->_page == $last) ? "disabled" : "";
    $html .= '<li class="' . $class . '"><a class="page-link" href="?limit=' . $this->_limit . '&page=' . ($this->_page + 1) . '">Next</a></li>';

    $html .= '</ul>';

    return $html;
  }
}