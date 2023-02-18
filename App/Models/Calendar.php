<?php

namespace App\Models;

class Calendar {

  public function __construct() {
    $this->naviHref = '/Event/calendar';
  }

  private $currentYear = 0;
  private $currentMonth = 0;
  private $currentDay = 0;
  private $currentDate = null;
  private $daysInMonth = 0;
  private $naviHref = null;

  public function getData() {
    $year = null;
    $month = null;

    if (null == $year && isset($_GET['year'])) {
      $year = $_GET['year'];
    } else if (null == $year) {
      $year = date("Y", time());
    }

    if (null == $month && isset($_GET['month'])) {
      $month = $_GET['month'];
    } else if (null == $month) {
      $month = date("m", time());
    }

    $this->daysInMonth = $this->_daysInMonth($month, $year);

    $this->currentYear = $year;
    $this->currentMonth = $month;
    $nav = $this->_createNavigation();
    $prevMonth = $nav[0];
    $prevYear = $nav[1];
    $nextMonth = $nav[2];
    $nextYear = $nav[3];
    $weeksInMonth = $this->_weeksInMonth($month, $year);
    $url = $this->naviHref;

    $cells = [];
    $links = [];

    $navData = date('F Y', strtotime($year . '-' . $month));

    if (isset($_GET['date'])) {
      $prev = $url . '?month=' . sprintf('%02d', $prevMonth) . '&year=' . $prevYear . '&date=' . $_GET['date'];
      $next = $url . '?month=' . sprintf('%02d', $nextMonth) . '&year=' . $nextYear . '&date=' . $_GET['date'];
    } else {
      $prev = $url . '?month=' . sprintf('%02d', $prevMonth) . '&year=' . $prevYear;
      $next = $url . '?month=' . sprintf('%02d', $nextMonth) . '&year=' . $nextYear;
    }

    for ($i = 0; $i < $weeksInMonth; $i++) {
      for ($j = 1; $j <= 7; $j++) {

        $content = $this->_showDay($i * 7 + $j);
        array_push($cells, $content[0]);
        array_push($links, $content[1]);
      }
    }

    return [
      'navData' => $navData,
      'prev' => $prev,
      'next' => $next,
      'weeks' => $weeksInMonth,
      'cells' => $cells,
      'links' => $links,
    ];
  }

  private function _daysInMonth($month = null, $year = null) {

    if (null == ($year)) {
      $year = date("Y", time());
    }
    if (null == ($month)) {
      $month = date("m", time());
    }

    return date('t', strtotime($year . '-' . $month));
  }

  private function _createNavigation() {

    $nextMonth = $this->currentMonth == 12 ? 1 : intval($this->currentMonth) + 1;
    $nextYear = $this->currentMonth == 12 ? intval($this->currentYear) + 1 : $this->currentYear;
    $prevMonth = $this->currentMonth == 1 ? 12 : intval($this->currentMonth) - 1;
    $prevYear = $this->currentMonth == 1 ? intval($this->currentYear) - 1 : $this->currentYear;

    return [$prevMonth, $prevYear, $nextMonth, $nextYear];
  }

  private function _weeksInMonth($month = null, $year = null) {

    if (null == ($year)) {
      $year = date("Y", time());
    }
    if (null == ($month)) {
      $month = date("m", time());
    }

    $daysInMonths = $this->_daysInMonth($month, $year);
    $numOfweeks = ($daysInMonths % 7 == 0 ? 0 : 1) + intval($daysInMonths / 7);
    $monthEndingDay = date('N', strtotime($year . '-' . $month . '-' . $daysInMonths));
    $monthStartDay = date('N', strtotime($year . '-' . $month . '-01'));

    if ($monthEndingDay < $monthStartDay) {

      $numOfweeks++;
    }
    return $numOfweeks;
  }

  private function _showDay($cellNumber) {

    if ($this->currentDay == 0) {

      $firstDayOfTheWeek = date('N', strtotime($this->currentYear . '-' . $this->currentMonth . '-01'));
      if (intval($cellNumber) == intval($firstDayOfTheWeek)) {
        $this->currentDay = 1;
      }
    }

    if (($this->currentDay != 0) && ($this->currentDay <= $this->daysInMonth)) {

      $this->currentDate = date('Y-m-d', strtotime($this->currentYear . '-' . $this->currentMonth . '-' . ($this->currentDay)));

      $cellContent = $this->currentDay;
      $this->currentDay++;
    } else {

      $this->currentDate = null;
      $cellContent = null;
    }
    return [$cellContent, $this->currentDate];
  }
}
