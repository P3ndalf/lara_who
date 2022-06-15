@extends('layout')

@section('title')
Test
@endsection

@section('main_content')
<div class="main-center justify-content-center">
    <div class="container-md">
        <h1 class="text-center mb-3">
            Test
        </h1>
        <h3>Electronics basic</h3>
        <hr>
        <form method="post">
            <div>
                <div class="form-group">
                    <div class="mb-1">1) Что из списка изображено на картинке.</div>
                    <img src="../assets/L.jpg" alt="А картинки-то, нет" width="400" height="300" class="border">
                    <div class="custom-radio">
                        <div class="custom-control">
                            <input type="radio" class="custom-control-input" id="answ1" name="qstn1" value="likvidity">
                            <label class="custom-control-label" for="answ1">Катушка ликвидности</label>
                        </div>
                        <div class="custom-control ">
                            <input type="radio" class="custom-control-input" id="answ2" name="qstn1" value="effectivity">
                            <label class="custom-control-label" for="answ2">Катушка эффективности</label>
                        </div>
                        <div class="custom-control ">
                            <input type="radio" class="custom-control-input" id="answ3" name="qstn1" value="inductivity">
                            <label class="custom-control-label" for="answ3">Катушка индуктивности</label>
                        </div>
                    </div>
                </div>

                <br>

                <div class="form-group">
                    <div class="mb-1">2) Выберите правильные единцы измерения для сопротивления.</div>
                    <select id="answState" class="form-control" name="qstn2">
                        <option selected disabled value="">Выберите из списка</option>
                        <option value="1answState">Q, Им</option>
                        <option value="2answState">W, Ум</option>
                        <option value="3answState">E, Ем</option>
                        <option value="4answState">R, Ом</option>
                        <option value="5answState">F, Ым</option>
                    </select>
                </div>

                <br>

                <div class="form-group">
                    <div class="mb-1">3) Введите формулировку закона Ома.(Ответ должен содержать больше 19 слов)</div>
                    <textarea class="form-control" placeholder="Введите Ваш ответ" rows="5" name="qstn3"></textarea>
                </div>

                <br>

                <div class="form-row d-flex justify-content-between">
                    <div id="nameFieldId" class="col-md-5 mb-3">
                        <label for="NameId">Write name</label>
                        <input id="NameId" type="text" class="form-control" placeholder="Your name" name="name" data-validate>
                        <div id="NameErrorId"></div>
                    </div>
                    <div id="lastNameFieldId" class="col-md-5 mb-3">
                        <label for="LastNameId">Write lastName</label>
                        <input id="LastNameId" type="text" class="form-control" placeholder="Your lastname" name="lastName" data-validate>
                        <div id="LastNameErrorId"></div>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="inputEmailId">Введите почтовый адрес</label>
                    <input type="email" class="form-control" placeholder="Ваш email" name="email">
                </div>
            </div>

            <div class="d-flex mb-3">
                <input class="btn btn-outline-dark mr-3" type="submit" name="submit" value="Отправить">
                <button class="btn btn-outline-danger" type="reset" value="reset">Очистить форму</button>
            </div>
        </form>

        <?php if (isset($_SESSION['user'])) {
            echo '<div class="mb-5">';
            echo '<table class="table table-sm">';
            echo '    <thead>';
            echo '        <tr>';
            echo '            <th scope="col">Id</th>';
            echo '            <th scope="col">Имя</th>';
            echo '            <th scope="col">Фамилия</th>';
            echo '            <th scope="col">Ответ</th>';
            echo '        </tr>';
            echo '    </thead>';
            echo '    <tbody>';
            foreach ($results as $value) {
                $answer = (array)$value;
                echo '<tr>';
                echo '  <th scope="row">' . $answer['id'] . '</th>';
                echo '  <td>' . $answer['name'] . '</td>';
                echo '  <td>' . $answer['lastName'] . '</td>';
                echo '  <td>' . $answer['percent'] . '</td>';
                echo '<tr>';
            }
            echo '    </tbody>';
            echo '</table>';
            echo '</div>';
        }
        ?>

    </div>
</div>
@endsection