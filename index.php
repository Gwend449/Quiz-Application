<?php
require_once __DIR__ . '/src/helpers.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <title>Авторизация</title>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body>

   <div class="container">
      <div style="min-height: 100vh;" class="row align-items-center">
         <div class="row justify-content-center ">
            <div class="mb-2">
               <h2 class="text-center">Вход в систему</h2>
            </div>

            <div style="width: 40%;" class="row border py-1 pb-2">
               <?php if (hasMessage('error')): ?>
                  <div style="margin: 3% auto;" class="alert alert-danger w-75" role="alert">
                     <?php getMessage('error')?>
                  </div>
               <?php endif; ?>
               <form class="row" method="post" action="src/actions/login.php">
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
                     <label for="ticket" class="form-label">Номер студенческого билета</label>
                     <input type="text" value="<?php echo old('ticket') ?>" name="ticket"
                        class="form-control <?php echo checkValid('ticket') ?>" id="ticket">
                     <div class="invalid-feedback">
                        <?php echo getErrorMessage("ticket"); ?>
                     </div>
                  </div>
                  <div class="col">
                     <button type="submit" class="btn btn-primary">Войти</button>
                  </div>
                  <div class="col-auto form-text">
                     <span class="align-middle ">Нет аккаунта? <a class="link-offset-2"
                           href="register.php">Регистрация</a></span>
                  </div>

               </form>
            </div>
         </div>
      </div>
   </div>
</body>

</html>