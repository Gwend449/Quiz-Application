<?php
require_once __DIR__ . "/src/helpers.php";

checkGuest();
?>


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <title>Регистрация</title>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body>

   <div class="container">
      <div style="min-height: 100vh;" class="row align-items-center">
         <div class="row justify-content-center">
            <div class="mb-2">
               <h2 class="text-center">Регистрация</h2>
            </div>
            <div style="width: 50%;" class="row border py-1 pb-2">
               <form class="row gx-2" action="src/actions/register.php" method="post" enctype="multipart/form-data">

                  <div class="mb-3">
                     <label for="first_name" class="form-label">Имя</label>
                     <input type="text" value="<?php echo old('first_name') ?>" name="first_name"
                        class="form-control <?php echo checkValid('first_name') ?>" id="first_name" placeholder="Иван">
                     <div class="invalid-feedback">
                        <?php echo getErrorMessage("first_name"); ?>
                     </div>
                  </div>
                  <div class="mb-3">
                     <label for="last_name" class="form-label">Фамилия</label>
                     <input type="text" value="<?php echo old('last_name') ?>" name="last_name"
                        class="form-control <?php echo checkValid('last_name') ?>" id="last_name" placeholder="Иванов">
                     <div class="invalid-feedback">
                        <?php echo getErrorMessage("last_name"); ?>
                     </div>
                  </div>
                  <div class="mb-3">
                     <label for="surname" class="form-label">Отчество</label>
                     <input type="text" name="surname" class="form-control" id="surname" placeholder="Иванович">
                  </div>
                  <div class="row gx-2">
                     <div class="col-auto mb-3">
                        <label for="groups" class="form-label">Группа</label>
                        <input type="text" value="<?php echo old('groups') ?>" name="groups"
                           class="form-control <?php echo checkValid('groups') ?>" id="groups">
                        <div class="invalid-feedback">
                           <?php echo getErrorMessage("groups") ?>
                        </div>
                     </div>
                     <div class="col mb-3">
                        <label for="ticket" class="form-label">Студенческий билет</label>
                        <input type="number" value="<?php echo old('ticket') ?>" name="ticket"
                           class="form-control <?php echo checkValid('ticket') ?>" id="ticket">
                        <div class="invalid-feedback">
                           <?php echo getErrorMessage("ticket"); ?>
                        </div>
                     </div>
                  </div>

                  <div class="col-auto me-3">
                     <button type="submit" class="btn btn-primary">Регистрация</button>
                  </div>
                  <div class="col form-text">
                     <span class="align-middle ">Уже есть аккаунт? <a class="link-offset-2" href="/">Войти</a></span>
                  </div>
               </form>
               <?php clearValid(); ?>
            </div>
         </div>
      </div>
   </div>
</body>

</html>