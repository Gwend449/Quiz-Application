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
   <nav id="navigation" class="navbar bg-body-tertiary px-3 mb-3">
      <a class="navbar-brand" href="#">
         <?php echo ($user['first_name']).' '; echo $user['last_name']?>
      </a>
      <ul class="nav nav-pills">
         <li class="nav-item">
            <!-- <a class="nav-link" href="#scrollspyHeading1">Выйти</a> -->
            <form action="src/actions/logout.php" method="post">
            <button type="submit" class="btn btn-primary">Выйти</button>
            </form>
         </li>
         <!-- <li class="nav-item">
            <a class="nav-link" href="#scrollspyHeading2">Second</a>
         </li> -->
         <!-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
               aria-expanded="false">Dropdown</a>
            <ul class="dropdown-menu">
               <li><a class="dropdown-item" href="#scrollspyHeading3">Third</a></li>
               <li><a class="dropdown-item" href="#scrollspyHeading4">Fourth</a></li>
               <li>
                  <hr class="dropdown-divider">
               </li>
               <li><a class="dropdown-item" href="#scrollspyHeading5">Fifth</a></li>
            </ul>
         </li> -->
      </ul>
   </nav>


   <div class="container p-3">
      <h2 class="mb-3">Главная страница</h2>
      <h3 class="">dfd</h3>
      <div data-bs-spy="scroll" data-bs-target="#navigation" data-bs-root-margin="0px 0px -40%"
         data-bs-smooth-scroll="true" class="scrollspy-example bg-body-tertiary p-3 rounded-2" tabindex="0">
         <h4 id="scrollspyHeading1">First heading</h4>
         <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Temporibus facilis optio aliquam repudiandae quam deleniti a placeat necessitatibus asperiores commodi!</p>
         <h4 id="scrollspyHeading2">Second heading</h4>
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta recusandae quam libero modi omnis veritatis fugiat obcaecati quidem pariatur eum! Perferendis assumenda obcaecati atque eum aut pariatur. Vel hic quia fuga expedita. Nisi, molestias corporis! Aperiam asperiores non reiciendis minima modi odio aliquid, iusto recusandae quae quasi iste. Quibusdam, veniam?</p>
         <h4 id="scrollspyHeading3">Third heading</h4>
         <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cum omnis assumenda fugiat, eius nam sequi, iure laborum velit odit rerum molestias harum debitis consectetur suscipit. Quis ipsum autem tempora voluptatem eveniet cum? Numquam unde, cupiditate facere fugit explicabo dolor? At animi corporis quaerat fugit perspiciatis fuga recusandae reiciendis asperiores magni deleniti molestiae maxime velit veritatis, consectetur est pariatur quisquam laborum, ut rem consequuntur perferendis? Neque unde error voluptas asperiores qui ea quisquam eius ratione, quas similique perspiciatis voluptate porro omnis praesentium aliquid distinctio hic reprehenderit nam nihil at, rerum quod necessitatibus reiciendis illo? Possimus doloremque deleniti, assumenda quae eveniet enim.</p>
         <h4 id="scrollspyHeading4">Fourth heading</h4>
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat quis nobis illum? Suscipit doloremque architecto quia similique ullam consequuntur aliquam molestias, adipisci unde tempora laboriosam. Laudantium ab facilis doloribus accusantium iste quas vel provident porro nulla debitis aut quod deserunt fugit odio perspiciatis hic, repellat qui eos temporibus est et magni cum. Ut culpa molestias inventore, accusamus pariatur quasi sint hic veritatis, consectetur sunt nobis nulla eum! Consectetur corrupti, neque quod harum voluptate eos ducimus a iste dolor maiores illum, debitis animi perferendis, aut quae maxime voluptatem. Architecto, ratione minima! Repellendus porro magnam eveniet soluta beatae eos, quasi quis impedit, sequi vitae natus odio ex ad a dolorem ea error atque eius! Laboriosam obcaecati veniam debitis eos reprehenderit error minus ducimus provident! Ullam vitae nihil recusandae maiores omnis, facere id eveniet nulla earum ipsa distinctio amet doloribus, totam harum at tempore corporis perferendis. Quisquam, iure quas. Culpa laborum et harum.</p>
         <h4 id="scrollspyHeading5">Fifth heading</h4>
         <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cupiditate maxime repudiandae illo doloremque iusto nisi soluta deserunt alias. Omnis voluptas velit incidunt repellendus aperiam voluptate blanditiis quis illo! Eveniet vel nostrum eaque tempore numquam quo dolorem, possimus, et qui pariatur officiis, obcaecati officia quod ullam quaerat corrupti exercitationem porro sit totam asperiores quibusdam. Eaque natus labore assumenda esse neque? Libero consequuntur eius saepe nam! Officia sint blanditiis dolorum deleniti alias nesciunt exercitationem, fugit laboriosam cupiditate vitae possimus dolores repellat ab distinctio nam, consequuntur vel placeat eligendi praesentium esse sunt molestiae! Pariatur, in iste repudiandae libero perspiciatis similique non voluptatem ipsum, id, eaque suscipit reprehenderit ex sit? Distinctio ex totam, dolores qui non mollitia aut ea id labore eius eum assumenda quaerat eos. Delectus vitae eveniet, voluptates corrupti hic obcaecati consectetur tenetur ipsa harum fugiat ratione fuga aperiam laboriosam optio atque eum deleniti nesciunt architecto tempore commodi. Eligendi officiis odio vero cum ratione pariatur sed, quisquam dicta iste dolor quos provident animi doloremque voluptatem culpa in maiores ipsum voluptatum natus eum cupiditate placeat. Iure temporibus enim doloribus rerum, tempora nihil consectetur saepe, corrupti, repellat quo blanditiis laborum minus. Error commodi dolores consequatur expedita quos laudantium quae. Ducimus sequi amet hic! Iste.</p>
      </div>
   </div>
<?php require_once __DIR__.'/components/script.php' ?>
</body>

</html>