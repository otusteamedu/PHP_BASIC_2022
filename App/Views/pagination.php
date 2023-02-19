<?php

$html = '<ul class="pagination justify-content-center">';
$class = ($pagination['page'] == $pagination['start']) ? "disabled" : "";

if ($pagination['username']) {
  $html .= '<li class="' . $class . '"><a class="page-link" href="?username=' . $pagination['username'] . '&page=' . ($pagination['page']-1) . '">Previous</a></li>';
  for ($i = $pagination['start']; $i <= $pagination['end']; $i++) {
    $class = ($pagination['page'] == $i) ? "active" : "";
    $html .= '<li class="' . $class . '"><a class="page-link" href="?username=' . $pagination['username'] . '&page=' . $i . '">' . $i . '</a></li>';
  }
  $class = ($pagination['page'] == $pagination['end']) ? "disabled" : "";
  $html .= '<li class="' . $class . '"><a class="page-link" href="??username=' . $pagination['username'] . '&page=' . ($pagination['page'] + 1) . '">Next</a></li>';

} else {
  $html .= '<li class="' . $class . '"><a class="page-link" href="?page=' . ($pagination['page']-1) . '">Previous</a></li>';
  for ($i = $pagination['start']; $i <= $pagination['end']; $i++) {
    $class = ($pagination['page'] == $i) ? "active" : "";
    $html .= '<li class="' . $class . '"><a class="page-link" href="?&page=' . $i . '">' . $i . '</a></li>';
  }
  $class = ($pagination['page'] == $pagination['end']) ? "disabled" : "";
  $html .= '<li class="' . $class . '"><a class="page-link" href="?page=' . ($pagination['page'] + 1) . '">Next</a></li>';
}

$html .= '</ul>';

echo $html;
