<?php
namespace app\components;

$questionsTest1 = array(
   array(
      'question' => 'Какой из перечисленных ниже протоколов относится к транспортному (transport) уровню модели TCP/IP? (Выберите два ответе)?',
      'options' => array('A' => 'Ethernet', 'B' => 'HTTP', 'C' => 'IP', 'D' => 'UDP', 'E' => 'SMTP', 'F' => 'TCP'),
      'correct_answer' => array('D', 'F')
   ),
   array(
      'question' => 'Какой из перечисленных ниже протоколов относится к канальному уровню модели TCP/IP? (Выберите два ответа)?',
      'options' => array('A' => 'Ethernet', 'B' => 'HTTP', 'C' => 'IP', 'D' => 'UDP', 'E' => 'SMTP', 'F' => 'TCP', 'G' => 'PPP'),
      'correct_answer' => array('B', 'C')
   ),
);


$questionsTest2 = array(
   array(
      'question' => 'В локальной сети малого офиса некоторые пользовательские утройства подключены к сети LAN по кабелю, а другие по беспроводной технологии (без кабеля). Что истинно из следующего, если в локальной сети используется Ethernet?',
      'options' => array('A' => 'Ethernet используют только устройства, подключенные по кабелю', 'B' => 'Ethernet используют только устройства, подключенные по беспроводной технологии.', 'C' => 'Ethernet используют все устройства, и подключенные по кабелю и беспроводной технологии.', 'D' => 'Ни одно из устройств не использует Ethernet'),
      'correct_answer' => array('A')
   ),
   array(
      'question' => 'Какой из следующих стандартов Ethernet определяет передачу трафика Gigabit Ethernet по кабелю UTP?',
      'options' => array('A' => '10GBASE-T', 'B' => '100BASE-T', 'C' => '1000BASE-T', 'D' => 'Ни один из указанных выше ответов не верный'),
      'correct_answer' => array('C')
   ),
);