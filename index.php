<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="initial-scale=1.0, width=device-width">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>PHP Developer. Basic Lesson 5 Home work 4</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@400;500;600&display=swap" rel="stylesheet"><title>Lesson 5 Home work 4</title>
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap-grid.css">
	<link rel="stylesheet" href="css/style.css">

</head>
<body>

<section class="gravity">
	<div class="container">
		<div class="row">
			<div class="col-6 col-sm-6 col-md-6 col-lg-6">
				<a href="">
					<img src="img/logo.svg"  alt="Logo">
				</a>
			</div>
			<div class="col-lg-3 d-none d-lg-block">
				<a href="#">
					Home
				</a>
			</div>
			<div class="col-lg-2 d-none d-lg-block">
				<a href="#" style="opacity: 0.3;">
					Contacts
				</a>
			</div>
			<div class="col-6 col-sm-6 col-md-6 col-lg-1" style="text-align: right;">
				<a href="">
					<img src="img/icon-menu.svg"  alt="Menu icon">
				</a>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-7">
				<div class="my-placeholder-left">
                    <span>
                        Shooting Stars
                    </span>
					<h2>
						Pictures In The Sky
					</h2>
					<p>
						Many people has the notion that enlightenment is one state. Many also believe that when
						it is attained, a person is forever in that state.
					</p>
					<div class="my-social-icons">
						<button onclick="window.location.href = '#';">
							Get started
						</button>
						<a href="">
							<img src="img/icon-twitter.svg"  alt="Icon twitter">
						</a>
						<a href="">
							<img src="img/icon-linkedin.svg"  alt="Icon Linkedin">
						</a>
						<a href="">
							<img src="img/icon-google.svg"  alt="Google icon">
						</a>
					</div>
				</div>
			</div>
			<div class="col-sm-12 col-md-12 col-lg-5">
				<div class="my-placeholder-right">
					<img src="img/placeholder.svg"  alt="Placeholder"  style="max-width: 100%; height: auto;">
				</div>
			</div>
		</div>
	</div>
</section>

<foot>
	<div class="row justify-content-center align-items-center">
		<span>
			<?php
            /** ЗАДАНИЕ 1
              * выводим текущий год с помощью функции date()
              * в ООП стиле можно реализовать с помощью PHP класса DateTime, тогда код примет вид:
              * $nowYear = new DateTime();
              * $nowYear = $nowYear->format('Y');
              * echo "© ".$nowYear." OTUS PHP Developer. BASIC";
              */
            echo "© ".date("Y")." OTUS PHP Developer. BASIC";
            
            /** ЗАДАНИЕ 2
              * $a = 5;
              * $b = '05';
              * var_dump($a == $b);                         // результат: true - так как (int)05 = int(5) (отбросили 0)
              * var_dump((int)'012345');                    // результат: 12345 - аналогично, отбросили первый ноль
              * var_dump((float)123.0 === (int)123.0);      // результат: false - т.к. (int)123.0 = int(123) таким образом float и int не равны, т.к. === проверяет совпадение типов. в случае == была бы истина
              * var_dump((int)0 === (int)'hello, world');   // результат: true - int - это число из множества ℤ = {..., -2, -1, 0, 1, 2, ...} Значение, которое к INT привести невозможно, заменяется на 0
              */
            
            /** ЗАДАНИЕ 3
              * при смене версий PHP с 8.0 на 7.0 в ЗАДАНИИ 2 вывод не изменится
              */
            
            /** ЗАДАНИЕ 4
              * вариант решения 1: ветвление
              */
            $a = 1;
            $b = 2;
            if ($a == 1 AND $b == 2)
                $b = 1; $a = 2;
            /** ЗАДАНИЕ 4
              * вариант решения 2: массив
              */
            $const = array($a, $b);
            $a = $const[1];
            $b = $const[0];
            /** ЗАДАНИЕ 4
              * вариант решения 3: математика
              */
            $a = $a + $b; // результат: $a = 3
            $b = $a - $b; // результат: $b = 1
            $a = $a - $b; // результат: $a = 2
            ?>
		</span>
	</div>
</foot>

</body>
</html>