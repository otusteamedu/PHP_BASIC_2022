<?php

require 'src/util/getConfig.php';
require 'src/util/renderTemplate.php';

require 'src/db/dbConnect.php';
require 'src/db/queryBooksAll.php';
require 'src/db/querySearchBooks.php';

require 'src/model/getFormData.php';
require 'src/model/getBooks.php';
require 'src/model/buildBookRows.php';
