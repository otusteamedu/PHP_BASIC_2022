<?php

$subjects = [
    'Хакасия' => ["Абаза", "Абакан", "Саяногорск", "Сорск", "Черногорск"],
    'Оренбургская область' => ["Абдулино", "Бугуруслан", "Бузулук", "Гай", "Кувандык", "Медногорск", "Новотроицк", "Оренбург", "Орск", "Соль-Илецк", "Сорочинск", "Ясный"],
    'Краснодарский край' => ["Абинск", "Анапа", "Апшеронск", "Армавир", "Белореченск", "Геленджик", "Горячий Ключ", "Гулькевичи", "Ейск", "Кореновск", "Краснодар", "Кропоткин", "Крымск", "Курганинск", "Лабинск", "Новокубанск", "Новороссийск", "Приморско-Ахтарск", "Славянск-на-Кубани", "Сочи", "Темрюк", "Тимашёвск", "Тихорецк", "Туапсе", "Усть-Лабинск", "Хадыженск"],
    'Башкортостан' => ["Агидель", "Баймак", "Белебей", "Белорецк", "Бирск", "Благовещенск", "Давлеканово", "Дюртюли", "Ишимбай", "Кумертау", "Межгорье", "Мелеуз", "Нефтекамск", "Октябрьский", "Салават", "Сибай", "Стерлитамак", "Туймазы", "Уфа", "Учалы", "Янаул"],
    'Татарстан' => ["Агрыз", "Азнакаево", "Альметьевск", "Арск", "Бавлы", "Болгар", "Бугульма", "Буинск", "Елабуга", "Заинск", "Зеленодольск", "Иннополис", "Казань", "Кукмор", "Лаишево", "Лениногорск", "Мамадыш", "Менделеевск", "Мензелинск", "Набережные Челны", "Нижнекамск", "Нурлат", "Тетюши", "Чистополь"],
    'Адыгея' => ["Адыгейск", "Майкоп"],
    'Ростовская область' => ["Азов", "Аксай", "Батайск", "Белая Калитва", "Волгодонск", "Гуково", "Донецк", "Зверево", "Зерноград", "Каменск-Шахтинский", "Константиновск", "Красный Сулин", "Миллерово", "Морозовск", "Новочеркасск", "Новошахтинск", "Пролетарск", "Ростов-на-Дону", "Сальск", "Семикаракорск", "Таганрог", "Цимлянск", "Шахты"],
    'Тыва' => ["Ак-Довурак", "Кызыл", "Туран", "Чадан", "Шагонар"],
    'Северная Осетия' => ["Алагир", "Ардон", "Беслан", "Владикавказ", "Дигора", "Моздок"],
    'Свердловская область' => ["Алапаевск", "Арамиль", "Артёмовский", "Асбест", "Берёзовский", "Богданович", "Верхний Тагил", "Верхняя Пышма", "Верхняя Салда", "Верхняя Тура", "Верхотурье", "Волчанск", "Дегтярск", "Екатеринбург", "Заречный", "Ивдель", "Ирбит", "Каменск-Уральский", "Камышлов", "Карпинск", "Качканар", "Кировград", "Краснотурьинск", "Красноуральск", "Красноуфимск", "Кушва", "Лесной", "Михайловск", "Невьянск", "Нижние Серги", "Нижний Тагил", "Нижняя Салда", "Нижняя Тура", "Новая Ляля", "Новоуральск", "Первоуральск", "Полевской", "Ревда", "Реж", "Североуральск", "Серов", "Среднеуральск", "Сухой Лог", "Сысерть", "Тавда", "Талица", "Туринск"],
    'Чувашия' => ["Алатырь", "Канаш", "Козловка", "Мариинский Посад", "Новочебоксарск", "Цивильск", "Чебоксары", "Шумерля", "Ядрин"],
    'Якутия' => ["Алдан", "Верхоянск", "Вилюйск", "Ленск", "Мирный", "Нерюнгри", "Нюрба", "Олёкминск", "Покровск", "Среднеколымск", "Томмот", "Удачный", "Якутск"],
    'Алтайский край' => ["Алейск", "Барнаул", "Белокуриха", "Бийск", "Горняк", "Заринск", "Змеиногорск", "Камень-на-Оби", "Новоалтайск", "Рубцовск", "Славгород", "Яровое"],
    'Владимирская область' => ["Александров", "Владимир", "Вязники", "Гороховец", "Гусь-Хрустальный", "Камешково", "Карабаново", "Киржач", "Ковров", "Кольчугино", "Костерёво", "Курлово", "Лакинск", "Меленки", "Муром", "Петушки", "Покров", "Радужный", "Собинка", "Струнино", "Судогда", "Суздаль", "Юрьев-Польский"],
    'Пермский край' => ["Александровск", "Березники", "Верещагино", "Горнозаводск", "Гремячинск", "Губаха", "Добрянка", "Кизел", "Красновишерск", "Краснокамск", "Кудымкар", "Кунгур", "Лысьва", "Нытва", "Оса", "Оханск", "Очёр", "Пермь", "Соликамск", "Усолье", "Чайковский", "Чердынь", "Чёрмоз", "Чернушка", "Чусовой"],
    'Сахалинская область' => ["Александровск-Сахалинский", "Анива", "Долинск", "Корсаков", "Курильск", "Макаров", "Невельск", "Оха", "Поронайск", "Северо-Курильск", "Томари", "Углегорск", "Холмск", "Южно-Сахалинск"],
    'Белгородская область' => ["Алексеевка", "Белгород", "Бирюч", "Валуйки", "Грайворон", "Губкин", "Короча", "Новый Оскол", "Старый Оскол", "Строитель", "Шебекино"],
    'Тульская область' => ["Алексин", "Белёв", "Богородицк", "Болохово", "Венёв", "Донской", "Ефремов", "Кимовск", "Киреевск", "Липки", "Новомосковск", "Плавск", "Советск", "Суворов", "Тула", "Узловая", "Чекалин", "Щёкино", "Ясногорск"],
    'Иркутская область' => ["Алзамай", "Ангарск", "Байкальск", "Бирюсинск", "Бодайбо", "Братск", "Вихоревка", "Железногорск-Илимский", "Зима", "Иркутск", "Киренск", "Нижнеудинск", "Саянск", "Свирск", "Слюдянка", "Тайшет", "Тулун", "Усолье-Сибирское", "Усть-Илимск", "Усть-Кут", "Черемхово", "Шелехов"],
    'Крым' => ["Алупка", "Алушта", "Армянск", "Бахчисарай", "Белогорск", "Джанкой", "Евпатория", "Керчь", "Красноперекопск", "Саки", "Симферополь", "Старый Крым", "Судак", "Феодосия", "Щёлкино", "Ялта"],
    'Хабаровский край' => ["Амурск", "Бикин", "Вяземский", "Комсомольск-на-Амуре", "Николаевск-на-Амуре", "Советская Гавань", "Хабаровск"],
    'Чукотский АО' => ["Анадырь", "Билибино", "Певек"],
    'Тверская область' => ["Андреаполь", "Бежецк", "Белый", "Бологое", "Весьегонск", "Вышний Волочёк", "Западная Двина", "Зубцов", "Калязин", "Кашин", "Кимры", "Конаково", "Красный Холм", "Кувшиново", "Лихославль", "Нелидово", "Осташков", "Ржев", "Старица", "Тверь", "Торжок", "Торопец", "Удомля"],
    'Кемеровская область' => ["Анжеро-Судженск", "Белово", "Берёзовский", "Гурьевск", "Калтан", "Кемерово", "Киселёвск", "Ленинск-Кузнецкий", "Мариинск", "Междуреченск", "Мыски", "Новокузнецк", "Осинники", "Полысаево", "Прокопьевск", "Салаир", "Тайга", "Таштагол", "Топки", "Юрга"],
    'Мурманская область' => ["Апатиты", "Гаджиево", "Заозёрск", "Заполярный", "Кандалакша", "Кировск", "Ковдор", "Кола", "Мончегорск", "Мурманск", "Оленегорск", "Островной", "Полярные Зори", "Полярный", "Североморск", "Снежногорск"],
    'Московская область' => ["Москва", "Апрелевка", "Балашиха", "Белоозёрский", "Бронницы", "Верея", "Видное", "Волоколамск", "Воскресенск", "Высоковск", "Голицыно", "Дедовск", "Дзержинский", "Дмитров", "Долгопрудный", "Домодедово", "Дрезна", "Дубна", "Егорьевск", "Жуковский", "Зарайск", "Звенигород", "Ивантеевка", "Истра", "Кашира", "Клин", "Коломна", "Королёв", "Котельники", "Красноармейск", "Красногорск", "Краснозаводск", "Краснознаменск", "Кубинка", "Куровское", "Ликино-Дулёво", "Лобня", "Лосино-Петровский", "Луховицы", "Лыткарино", "Люберцы", "Можайск", "Мытищи", "Наро-Фоминск", "Ногинск", "Одинцово", "Озёры", "Орехово-Зуево", "Павловский Посад", "Пересвет", "Подольск", "Протвино", "Пушкино", "Пущино", "Раменское", "Реутов", "Рошаль", "Руза", "Сергиев Посад", "Серпухов", "Солнечногорск", "Старая Купавна", "Ступино", "Талдом", "Фрязино", "Химки", "Хотьково", "Черноголовка", "Чехов", "Шатура", "Щёлково", "Электрогорск", "Электросталь", "Электроугли"],
    'Чечня' => ["Аргун", "Грозный", "Гудермес", "Курчалой", "Урус-Мартан", "Шали"],
    'Мордовия' => ["Ардатов", "Инсар", "Ковылкино", "Краснослободск", "Рузаевка", "Саранск", "Темников"],
    'Нижегородская область' => ["Арзамас", "Балахна", "Богородск", "Бор", "Ветлуга", "Володарск", "Ворсма", "Выкса", "Горбатов", "Городец", "Дзержинск", "Заволжье", "Княгинино", "Кстово", "Кулебаки", "Лукоянов", "Лысково", "Навашино", "Нижний Новгород", "Павлово", "Первомайск", "Перевоз", "Саров", "Семёнов", "Сергач", "Урень", "Чкаловск", "Шахунья"],
    'Саратовская область' => ["Аркадак", "Аткарск", "Балаково", "Балашов", "Вольск", "Ершов", "Калининск", "Красноармейск", "Красный Кут", "Маркс", "Новоузенск", "Петровск", "Пугачёв", "Ртищево", "Саратов", "Хвалынск", "Шиханы", "Энгельс"],
    'Приморский край' => ["Арсеньев", "Артём", "Большой Камень", "Владивосток", "Дальнегорск", "Дальнереченск", "Лесозаводск", "Находка", "Партизанск", "Спасск-Дальний", "Уссурийск", "Фокино"],
    'Красноярский край' => ["Артёмовск", "Ачинск", "Боготол", "Бородино", "Дивногорск", "Дудинка", "Енисейск", "Железногорск", "Заозёрный", "Зеленогорск", "Игарка", "Иланский", "Канск", "Кодинск", "Красноярск", "Лесосибирск", "Минусинск", "Назарово", "Норильск", "Сосновоборск", "Ужур", "Уяр", "Шарыпово"],
    'Архангельская область' => ["Архангельск", "Вельск", "Каргополь", "Коряжма", "Котлас", "Мезень", "Мирный", "Новодвинск", "Няндома", "Онега", "Северодвинск", "Сольвычегодск", "Шенкурск"],
    'Томская область' => ["Асино", "Кедровый", "Колпашево", "Северск", "Стрежевой", "Томск"],
    'Астраханская область' => ["Астрахань", "Ахтубинск", "Знаменск", "Камызяк", "Нариманов", "Харабали"],
    'Челябинская область' => ["Аша", "Бакал", "Верхнеуральск", "Верхний Уфалей", "Еманжелинск", "Златоуст", "Карабаш", "Карталы", "Касли", "Катав-Ивановск", "Копейск", "Коркино", "Куса", "Кыштым", "Магнитогорск", "Миасс", "Миньяр", "Нязепетровск", "Озёрск", "Пласт", "Сатка", "Сим", "Снежинск", "Трёхгорный", "Троицк", "Усть-Катав", "Чебаркуль", "Челябинск", "Южноуральск", "Юрюзань"],
    'Вологодская область' => ["Бабаево", "Белозерск", "Великий Устюг", "Вологда", "Вытегра", "Грязовец", "Кадников", "Кириллов", "Красавино", "Никольск", "Сокол", "Тотьма", "Устюжна", "Харовск", "Череповец"],
    'Бурятия' => ["Бабушкин", "Гусиноозёрск", "Закаменск", "Кяхта", "Северобайкальск", "Улан-Удэ"],
    'Калининградская область' => ["Багратионовск", "Балтийск", "Гвардейск", "Гурьевск", "Гусев", "Зеленоградск", "Калининград", "Краснознаменск", "Ладушкин", "Мамоново", "Неман", "Нестеров", "Озёрск", "Пионерский", "Полесск", "Правдинск", "Приморск", "Светлогорск", "Светлый", "Славск", "Советск", "Черняховск"],
    'Кабардино-Балкария' => ["Баксан", "Майский", "Нальчик", "Нарткала", "Прохладный", "Терек", "Тырныауз", "Чегем"],
    'Калужская область' => ["Балабаново", "Белоусово", "Боровск", "Ермолино", "Жиздра", "Жуков", "Калуга", "Киров", "Козельск", "Кондрово", "Кремёнки", "Людиново", "Малоярославец", "Медынь", "Мещовск", "Мосальск", "Обнинск", "Сосенский", "Спас-Деменск", "Сухиничи", "Таруса", "Юхнов"],
    'Забайкальский край' => ["Балей", "Борзя", "Краснокаменск", "Могоча", "Нерчинск", "Петровск-Забайкальский", "Сретенск", "Хилок", "Чита", "Шилка"],
    'Новосибирская область' => ["Барабинск", "Бердск", "Болотное", "Искитим", "Карасук", "Каргат", "Куйбышев", "Купино", "Новосибирск", "Обь", "Татарск", "Тогучин", "Черепаново", "Чулым"],
    'Ульяновская область' => ["Барыш", "Димитровград", "Инза", "Новоульяновск", "Сенгилей", "Ульяновск"],
    'Кировская область' => ["Белая Холуница", "Вятские Поляны", "Зуевка", "Киров", "Кирово-Чепецк", "Кирс", "Котельнич", "Луза", "Малмыж", "Мураши", "Нолинск", "Омутнинск", "Орлов", "Слободской", "Советск", "Сосновка", "Уржум", "Яранск"],
    'Пензенская область' => ["Белинский", "Городище", "Заречный", "Каменка", "Кузнецк", "Нижний Ломов", "Никольск", "Пенза", "Сердобск", "Спасск", "Сурск"],
    'Амурская область' => ["Белогорск", "Благовещенск", "Завитинск", "Зея", "Райчихинск", "Свободный", "Сковородино", "Тында", "Циолковский", "Шимановск"],
    'Карелия' => ["Беломорск", "Кемь", "Кондопога", "Костомукша", "Лахденпохья", "Медвежьегорск", "Олонец", "Петрозаводск", "Питкяранта", "Пудож", "Сегежа", "Сортавала", "Суоярви"],
    'Ханты-Мансийский АО' => ["Белоярский", "Когалым", "Лангепас", "Лянтор", "Мегион", "Нефтеюганск", "Нижневартовск", "Нягань", "Покачи", "Пыть-Ях", "Радужный", "Советский", "Сургут", "Урай", "Ханты-Мансийск", "Югорск"],
    'Еврейская АО' => ["Биробиджан", "Облучье"],
    'Ставропольский край' => ["Благодарный", "Будённовск", "Георгиевск", "Ессентуки", "Железноводск", "Зеленокумск", "Изобильный", "Ипатово", "Кисловодск", "Лермонтов", "Минеральные Воды", "Михайловск", "Невинномысск", "Нефтекумск", "Новоалександровск", "Новопавловск", "Пятигорск", "Светлоград", "Ставрополь"],
    'Воронежская область' => ["Бобров", "Богучар", "Борисоглебск", "Бутурлиновка", "Воронеж", "Калач", "Лиски", "Нововоронеж", "Новохопёрск", "Острогожск", "Павловск", "Поворино", "Россошь", "Семилуки", "Эртиль"],
    'Ленинградская область' => ["Санкт-Петербург", "Бокситогорск", "Волосово", "Волхов", "Всеволожск", "Выборг", "Высоцк", "Гатчина", "Ивангород", "Каменногорск", "Кингисепп", "Кириши", "Кировск", "Коммунар", "Кудрово", "Лодейное Поле", "Луга", "Любань", "Мурино", "Никольское", "Новая Ладога", "Отрадное", "Пикалёво", "Подпорожье", "Приморск", "Приозерск", "Светогорск", "Сертолово", "Сланцы", "Сосновый Бор", "Сясьстрой", "Тихвин", "Тосно", "Шлиссельбург"],
    'Орловская область' => ["Болхов", "Дмитровск", "Ливны", "Малоархангельск", "Мценск", "Новосиль", "Орёл"],
    'Новгородская область' => ["Боровичи", "Валдай", "Великий Новгород", "Малая Вишера", "Окуловка", "Пестово", "Сольцы", "Старая Русса", "Холм", "Чудово"],
    'Брянская область' => ["Брянск", "Дятьково", "Жуковка", "Злынка", "Карачев", "Клинцы", "Мглин", "Новозыбков", "Почеп", "Севск", "Сельцо", "Стародуб", "Сураж", "Трубчевск", "Унеча", "Фокино"],
    'Костромская область' => ["Буй", "Волгореченск", "Галич", "Кологрив", "Кострома", "Макарьев", "Мантурово", "Нерехта", "Нея", "Солигалич", "Чухлома", "Шарья"],
    'Дагестан' => ["Буйнакск", "Дагестанские Огни", "Дербент", "Избербаш", "Каспийск", "Кизилюрт", "Кизляр", "Махачкала", "Хасавюрт", "Южно-Сухокумск"],
    'Смоленская область' => ["Велиж", "Вязьма", "Гагарин", "Демидов", "Десногорск", "Дорогобуж", "Духовщина", "Ельня", "Починок", "Рославль", "Рудня", "Сафоново", "Смоленск", "Сычёвка", "Ярцево"],
    'Псковская область' => ["Великие Луки", "Гдов", "Дно", "Невель", "Новоржев", "Новосокольники", "Опочка", "Остров", "Печоры", "Порхов", "Псков", "Пустошка", "Пыталово", "Себеж"],
    'Камчатский край' => ["Вилючинск", "Елизово", "Петропавловск-Камчатский"],
    'Ивановская область' => ["Вичуга", "Гаврилов Посад", "Заволжск", "Иваново", "Кинешма", "Комсомольск", "Кохма", "Наволоки", "Плёс", "Приволжск", "Пучеж", "Родники", "Тейково", "Фурманов", "Шуя", "Южа", "Юрьевец"],
    'Волгоградская область' => ["Волгоград", "Волжский", "Дубовка", "Жирновск", "Калач-на-Дону", "Камышин", "Котельниково", "Котово", "Краснослободск", "Ленинск", "Михайловка", "Николаевск", "Новоаннинский", "Палласовка", "Петров Вал", "Серафимович", "Суровикино", "Урюпинск", "Фролово"],
    'Марий Эл' => ["Волжск", "Звенигово", "Йошкар-Ола", "Козьмодемьянск"],
    'Коми' => ["Воркута", "Вуктыл", "Емва", "Инта", "Микунь", "Печора", "Сосногорск", "Сыктывкар", "Усинск", "Ухта"],
    'Удмуртия' => ["Воткинск", "Глазов", "Ижевск", "Камбарка", "Можга", "Сарапул"],
    'Ярославская область' => ["Гаврилов-Ям", "Данилов", "Любим", "Мышкин", "Переславль-Залесский", "Пошехонье", "Ростов", "Рыбинск", "Тутаев", "Углич", "Ярославль"],
    'Алтай' => ["Горно-Алтайск"],
    'Калмыкия' => ["Городовиковск", "Лагань", "Элиста"],
    'Липецкая область' => ["Грязи", "Данков", "Елец", "Задонск", "Лебедянь", "Липецк", "Усмань", "Чаплыгин"],
    'Ямало-Ненецкий АО' => ["Губкинский", "Лабытнанги", "Муравленко", "Надым", "Новый Уренгой", "Ноябрьск", "Салехард", "Тарко-Сале"],
    'Курганская область' => ["Далматово", "Катайск", "Курган", "Куртамыш", "Макушино", "Петухово", "Шадринск", "Шумиха", "Щучье"],
    'Курская область' => ["Дмитриев", "Железногорск", "Курск", "Курчатов", "Льгов", "Обоянь", "Рыльск", "Суджа", "Фатеж", "Щигры"],
    'Тамбовская область' => ["Жердевка", "Кирсанов", "Котовск", "Мичуринск", "Моршанск", "Рассказово", "Тамбов", "Уварово"],
    'Самарская область' => ["Жигулёвск", "Кинель", "Нефтегорск", "Новокуйбышевск", "Октябрьск", "Отрадный", "Похвистнево", "Самара", "Сызрань", "Тольятти", "Чапаевск"],
    'Тюменская область' => ["Заводоуковск", "Ишим", "Тобольск", "Тюмень", "Ялуторовск"],
    'Омская область' => ["Асино", "Буй", "Волгореченск", "Галич", "Исилькуль", "Калачинск", "Кедровый", "Кологрив", "Колпашево", "Кострома", "Макарьев", "Мантурово", "Называевск", "Нерехта", "Нея", "Омск", "Северск", "Солигалич", "Стрежевой", "Тара", "Томск", "Тюкалинск", "Чухлома", "Шарья"],
    'Ингушетия' => ["Карабулак", "Магас", "Малгобек", "Назрань", "Сунжа"],
    'Карачаево-Черкесия' => ["Карачаевск", "Теберда", "Усть-Джегута", "Черкесск"],
    'Рязанская область' => ["Касимов", "Кораблино", "Михайлов", "Новомичуринск", "Рыбное", "Ряжск", "Рязань", "Сасово", "Скопин", "Спас-Клепики", "Спасск-Рязанский", "Шацк"],
    'Магаданская область' => ["Магадан", "Сусуман"],
    'Ненецкий АО' => ["Нарьян-Мар"],
    'Ханты-Мансийский АО — Югра' => ["Советский", "Ханты-Мансийск"],
];
function printSubjectsFormatted(array $subjects): void {
    foreach ($subjects as $subject => $cities) {
        echo $subject . ": " . implode(", ", $cities) . PHP_EOL;
    }
}

printSubjectsFormatted($subjects);