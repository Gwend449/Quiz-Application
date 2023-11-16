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
      <div class="row w-75 justify-content-center">
         <h2 class="text-center">Вход в систему</h2>

         <div class="row w-50">
            <form class="">
               <div class="mb-3">
                  <label for="firstName" class="form-label">Имя</label>
                  <input type="text" class="form-control" id="firstName">
               </div>
               <div class="mb-3">
                  <label for="lastName" class="form-label">Фамилия</label>
                  <input type="text" class="form-control" id="lastName">
               </div>
               <div class="mb-3">
                  <label for="ticket" class="form-label">Номер студенческого билета</label>
                  <input type="text" class="form-control" id="ticket">
                  <div class="invalid-feedback">Пожалуйста укажите действующий номер студ. билета</div>
               </div>
               <button type="submit" class="btn btn-primary">Войти</button>
            </form>
         </div>

      </div>

   </div>
</body>

</html>