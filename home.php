<?php
require_once __DIR__ . '/src/helpers.php';
$user = currentUser();
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
   <title>Home page</title>
</head>

<body>
   <nav id="navigation" class="navbar bg-body-secondary px-3 mb-3">
      <div class="navbar-brand" href="#">
         <?php echo ($user['first_name']) . ' ';
         echo $user['last_name'] ?>
      </div>
      <ul class="nav">
         <li class="nav-item">
            <form action="src/actions/logout.php" method="post">
               <button type="submit" class="btn btn-outline-primary">Выйти</button>
            </form>
         </li>
      </ul>
   </nav>


   <div class="container p-3">
      <h2 class="mb-3">Главная страница</h2>
      <h4 style="font-weight: 400;" class="mb-3">Инфокоммуникационные технологии и системы связи</h4>
      <div class="row">

         <div class="col-2">
            <nav id="navbar-example3" class="h-100 flex-column align-items-stretch pe-4 border-end">
               <nav class="nav nav-pills flex-column">
                  <a class="nav-link" href="#item-1">Часть I</a>
                  <a class="nav-link" href="#item-2">Часть II</a>
                  <a class="nav-link" href="#item-3">Часть III</a>
                  <a class="nav-link" href="#item-4">Часть IV</a>
                  <a class="nav-link" href="#item-5">Часть V</a>
                  <a class="nav-link" href="#item-6">Часть VI</a>
                  <a class="nav-link" href="#item-7">Часть VII</a>
                  <a class="nav-link" href="#item-8">Часть VIII</a>
                  <a class="nav-link" href="#item-9">Часть IX</a>
                  <a class="nav-link" href="#item-10">Часть X</a>
               </nav>
            </nav>
         </div>

         <div class="col-9">
            <div data-bs-spy="scroll" data-bs-target="#navbar-example3" data-bs-smooth-scroll="true"
               class="scrollspy-example-2" tabindex="0">
               <div id="item-1">
                  <h4>Часть I</h4>
                  <p>
                  <ul type="square">
                     <li>
                        Сетевое подключение зависит от способа использования сети; например, домашняя сесть, вероятнее всего, использовала бы подключение DSL или абонентский телевизионный канал, корпоративная сеть - подключение Ethernet или беспроводное подключение. 
                     </li>
                     <li>
                        Сетевая модель, называемая также сетевой архитектурой или схемой сети, - это исчерпывающий набор документации.
                     </li>
                     <li>
                        Современный компьютерный мир использует только одну сетевую модель: протокол TCP/IP.
                     </li>
                     <li>
                        МОдель TCP/IP определяет и использует множество протколов, которые и позволяют компьютерам общаться.
                     </li>
                     <li>
                        У первоначальной модели TCP/IP было четыре уровня: приложений, транспортный, Интернета и канала связи. Современная модернизированная модель TCP/IP имеет пять уровней: приложений, транспортный и сетевой, а уровень канала связи разделен на два уровня - канальный и физический.
                     </li>
                     <li>
                        Протоколы уровня приложений модели TCP/IP обслуживают прикладное программное обеспечение, выполняющееся на компьютере. Уровень приложений определяет не сами приложения, а необходимые им службы.
                     </li>
                     <li>
                        На транспортном уровне чаще всего используются два протокола: протокол управления передачей (TCP) и протокол пользовательских дейтаграмм (UDP).
                     </li>
                     <li>
                        Протоколы транспортного уровня обслуживают протоколы уровня приложений, располгающиеся в модели TCP/IP уровнем выше.
                     </li>
                     <li>
                        Протокол TCP/IP нуждается в механизме, гарантирующем передачу данных по сети. Посколько гарантия передачи данных через сеть необходима множеству протоколов уровня приложений, создатели включали в протокол TCP средство восстанавления при ошибках. Для восстанавления после ошибок протокол TCP использует концепцию подтверждений.
                     </li>
                     <li>
                        Протокол IP предоставляет множество средств, важнейшими из котороых являются адресация и маршрутизация.
                     </li>
                     <li>
                        Сетевой уровень модели TCP/IP, используя протокол IP, обеспечивает передачу пакетов IP с одного устройства на другое. Любое устройство с IP-адресом может быть подключено к сети TCP/IP и передавать пакеты.
                     </li>
                     <li>
                        Первоначальный уровень канала связи модели TCP/IP определяет протоколы и аппаратные средства, необходимые для доставки данных через физическую сеть. Термин канал относится к физическим соединениям или каналам связи между двумя устройствами, и к протокола, контролирующим эти каналы связи.
                     </li>
                     <li>
                        Процесс передачи данных хостом TCP/IP может быть разделен на пять этапов. Первые четыре этапа относятся к инкапсуляции, выполняемой четырьмя уровнями модели TCP/IP, а последний этап - это фактическая физическая передача данных.
                     </li>
                     <li>
                        Модель OSI подразумевает семь уровней: приложений, представляения, сеансовый, транспортны, сетевой, канальный и физческий.
                     </li>
                     <li>
                        Компания Cisco, требует, чтобы сертифицированный специалист CCENT имел понятие об основных функциях каждого уровня модели OSI и помнил их названия. Кроме того, для каждого упоминаемого в книге устройства или протокола важно понимать, какие уровни модели OSI ближе всего соответствуют их функциям.
                     </li>
                     <li>
                        Поскольку большинство людей намного ближе знакомы с функциями модели TCP/IP, чем с функциями модели OSI, одним из лучших способов изучения функций различных уровней модели OSI является их сопоставление с функциями модели TCP/IP.
                     </li>
                     <li>
                        Если используется модель TCP/IP с пятью уровнями, то четыре её нижних уровня очень похожи на таковые модели OSI. Единственное различие в нижних четырех уровнях - это название третьего уровня: в модели OSI это сетевой уровень, а в первоначальной модели TCP/IP - уровень интернета.
                     </li>
                     <li>
                        Три верних уровня эталонной модели OSI (приложений, представления и сеансовый (7, 6 и 5)) совместно определяют функции,соответствующие уровню приложений модели TCP/IP.
                     </li>
                  </ul>
                  </p>
               </div>
               <div id="item-2">
                  <h4>Часть I</h4>
                  <p></p>
               </div>
               <div id="item-3">
                  <h4>Item 3</h4>
                  <p></p>
               </div>
               <div id="item-4">
                  <h5>Item 3-1</h5>
                  <p>...</p>
               </div>
               <div id="item-5">
                  <h5>Item 3-2</h5>
                  <p></p>
               </div>
               <div id="item-6">
                  <h5>Item 3-2</h5>
                  <p></p>
               </div>
               <div id="item-7">
                  <h5>Item 3-2</h5>
                  <p></p>
               </div>
               <div id="item-8">
                  <h5>Item 3-2</h5>
                  <p></p>
               </div>
               <div id="item-9">
                  <h5>Item 3-2</h5>
                  <p></p>
               </div>
               <div id="item-10">
                  <h5>Item 3-2</h5>
                  <p></p>
               </div>
            </div>
         </div>
      </div>
   </div>
   <?php
   require_once __DIR__ . '/assets/footer.php';
   require_once __DIR__ . '/components/script.php';
   ?>
</body>

</html>