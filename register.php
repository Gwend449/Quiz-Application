<?php 

require_once __DIR__."/src/helpers.php";

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
         <div class="row justify-content-center ">
            <div class="mb-2">
               <h2 class="text-center">Регистрация</h2>
            </div>
            <div style="width: 40%;" class="row border py-1 pb-2">
               <form class="row gx-2" action="src/actions/register.php" method="post" enctype="multipart/form-data">
                  <div class="mb-3">
                     <label for="first_name" class="form-label">Имя</label>
                     <input type="text" name="first_name" class="form-control <?php echo checkValid() ?>" id="first_name"
                        placeholder="Иван" >
                     <div class="invalid-feedback">
                        <?php echo displayError("first_name");?>
                     </div>
                  </div>
                  <div class="mb-3">
                     <label for="last_name" class="form-label">Фамилия</label>
                     <input type="text" name="last_name" class="form-control is-invalid" id="last_name" placeholder="Иванов">
                     <div class="invalid-feedback">Пожалуйста заполните пустое поле</div>
                  </div>
                  <div class="mb-3">
                     <label for="surname" class="form-label">Отчество</label>
                     <input type="text" name="surname" class="form-control is-invalid" id="surname" placeholder="Иванович">
                     <div class="invalid-feedback">Пожалуйста заполните пустое поле</div>
                  </div>
                  <div class="col mb-3">
                     <label for="surname" class="form-label">Группа</label>
                     <input type="text" name="groups" class="form-control is-invalid" id="groups">
                     <div class="invalid-feedback">Пожалуйста заполните пустое поле</div>
                  </div>
                  <div class="col mb-3">
                     <label for="ticket" class="form-label">Номер студенческого билета</label>
                     <input type="text" name="ticket" class="form-control is-invalid" id="ticket" >
                     <div class="invalid-feedback">Пожалуйста укажите действующий номер студ. билета</div>
                  </div>
                  <!-- <div class="md-6 mb-3">
                     <label for="test" class="form-label">City</label>
                     <input type="text" class="form-control" id="test"
                        required>
                     <div id="validationServer03Feedback" class="invalid-feedback">
                        Please provide a valid city.
                     </div>
                  </div> -->
                  <div class="">
                     <button type="submit" class="btn btn-primary">Регистрация</button>
                  </div>

               </form>
            </div>
         </div>
      </div>
   </div>
</body>

</html>