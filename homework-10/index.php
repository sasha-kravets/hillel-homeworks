<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Homework-10</title>
  <link rel="stylesheet" href="./css/styles.css">
</head>
<body>
  <div class="container">
    <form action="server.php" method="post" enctype="multipart/form-data" class="form">
      <h2 class="form__title">User Information</h2>
      <!-- input type="text" -->
      <div class="form__item item">
        <label for="firstName" class="item__title">First name</label>
        <input type="text" id="firstName" name="firstName" class="item__input">
      </div>
      <div class="form__item item">
        <label for="lastName" class="item__title">Last name</label>
        <input type="text" id="lastName" name="lastName" class="item__input">
      </div>
      <!-- input type="radio" -->
      <div class="form__item item">
        <p class="item__title">Gender</p>
        <div class="item__wrapper">
          <input type="radio" id="male" name="gender" value="Male">
          <label for="male">Male</label>
        </div>
        <div class="item__wrapper">
          <input type="radio" id="female" name="gender" value="Female">
          <label for="female">Female</label>
        </div>
      </div>
      <!-- input type="checkbox" -->
      <div class="form__item item">
        <p class="item__title">Skills</p>
        <div class="item__wrapper">
          <input type="checkbox" id="html" name="hobbies[]" value="HTML">
          <label for="html">HTML</label>
        </div>
        <div class="item__wrapper">
          <input type="checkbox" id="css" name="hobbies[]" value="CSS">
          <label for="css">CSS</label>
        </div>
        <div class="item__wrapper">
          <input type="checkbox" id="js" name="hobbies[]" value="JavaScript">
          <label for="js">JavaScript</label>
        </div>
        <div class="item__wrapper">
          <input type="checkbox" id="php" name="hobbies[]" value="PHP">
          <label for="php">PHP</label>
        </div>
      </div>
      <!-- select -->
      <div class="form__item item">
        <label for="city" class="item__title">City</label>
        <select id="city" name="city">
          <option value="Lutsk">Lutsk</option>
          <option value="Lviv">Lviv</option>
          <option value="Kyiv">Kyiv</option>
          <option value="Odesa">Odesa</option>
        </select>
      </div>
      <!-- input type="file" -->
      <div class="form__item item">
        <p class="item__title">Profile picture</p>
        <input type="file" name="picture" class="item__input">
      </div>
      <!-- multiple input type="file" -->
      <div class="form__item item">
        <p class="item__title">Pictures</p>
        <input type="file" name="pictures[]" multiple class="item__input">
      </div>
      <!-- input type="submit" -->
      <div class="form__item item">
        <input type="submit" class="form__button">
      </div>
    </form>
  </div>
</body>
</html>