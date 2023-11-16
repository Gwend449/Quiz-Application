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
               <form class="row" method="post">
                  <div class="mb-3">
                     <label for="first_name" class="form-label">Имя</label>
                     <input type="text" name="first_name" class="form-control" id="first_name" placeholder="Иван">
                  </div>
                  <div class="mb-3">
                     <label for="last_name" class="form-label">Фамилия</label>
                     <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Иванов">
                  </div>
                  <div class="mb-3">
                     <label for="ticket" class="form-label">Номер студенческого билета</label>
                     <input type="text" name="ticket" class="form-control" id="ticket">
                     <div class="invalid-feedback">Пожалуйста укажите действующий номер студ. билета</div>
                  </div>
                  <div class="col">
                     <button type="submit" class="btn btn-primary">Войти</button>
                  </div>
                  <div class="col-auto form-text">
                     <span class="align-middle ">Нет аккаунта? <a class="link-offset-2" href="register.php">Регистрация</a></span>
                  </div>

               </form>
            </div>
         </div>
      </div>
   </div>
</body>

</html>