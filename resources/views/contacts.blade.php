@extends('layout')

@section('title')
Contacts
@endsection

@section('main_content')
<div class="main-center justify-content-center">
    <div class="container-md">
        <h1 class="text-center mb-3">
            Контакты
        </h1>

        <form method="post">

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

            <div class="custom-radio">
                <div class="custom-control ">
                    <input type="radio" class="custom-control-input" id="maleId" name="gender" value="male">
                    <label class="custom-control-label" for="maleId">Мужской пол</label>
                </div>
                <div class="custom-control ">
                    <input type="radio" class="custom-control-input" id="femaleId" name="gender" value="female">
                    <label class="custom-control-label" for="femaleId">Женский пол</label>
                </div>
            </div>

            <div class="form-row mb-3">
                <div class="col">
                    <label for="inputEmailId">Введите почтовый адрес</label>
                    <input class="form-control" id="inputEmailId" name="email" placeholder="Ваш email">
                </div>
            </div>

            <div class="form-row mb-3">
                <div class="col">
                    <label for="inputPhoneId">Введите номер телефона</label>
                    <input class="form-control" id="inputPhoneId" name="phone" placeholder="Ваш мобильный номер">
                </div>
            </div>

            <div class="form-group mb-3">
                <label for="inputAgeStateId">Возраст</label>
                <select id="inputAgeStateId" name="age" class="form-control">
                    <option disabled value="" style="color: grey;">Выберите возраст</option>
                    <option value="0">0 - 5 лет</option>
                    <option value="1">5 - 10 лет</option>
                    <option value="2">10 - 15 лет</option>
                    <option value="3">15 - 20 лет</option>
                    <option value="4">20 - 25 лет</option>
                    <option value="5">30 - 35 лет</option>
                    <option value="6">40 - 45 лет</option>
                    <option value="7">50 - 55 лет</option>
                    <option value="8">60 - 65 лет</option>
                    <option value="9">70 - 75 лет</option>
                    <option value="10">80 - 85 лет</option>
                    <option value="11">90 - 95 лет</option>
                    <option value="12">вечный</option>
                </select>
            </div>

            <section>
                <label id="inputDateId">Дата рождения</label>
                <div class="ml-0 form-row d-flex justify-content-start">
                    <div class="form-group col-md-3" style="padding: 0;">
                        <input type="text" class="form-control" id="dateValue" name="dateValue" placeholder="dd/mm/yyyy" />
                    </div>
                    <div class="form-group col-md-2">
                        <button class="btn btn-outline-dark align-top" type="button" onclick="document.getElementById('calendar').style.display='block'">Выбрать дату</button>
                    </div>
                </div>

                <div id="calendar" class="modal">
                    <div class="modal-content animate">
                        <div class="form-row justify-content-center">
                            <div class="form-group mt-3">
                                <select class="form-control" name="" id="yearSelection">
                                    <script type="text/javascript">
                                        var monthes = ["Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь"];
                                        for (var i = 1; i <= 12; i++) {
                                            document.write('<option value="' + i + '">' + monthes[i - 1] + '</option>');
                                        }
                                    </script>
                                </select>
                            </div>

                            <div class="form-group mt-3">
                                <select class="form-control" id="yearSelect">
                                    <script type="text/javascript">
                                        for (var i = (new Date).getFullYear() - 100; i <= (new Date).getFullYear(); i++) {
                                            document.write('<option value="' + i + '">' + i + '</option>');
                                        }
                                    </script>
                                </select>
                            </div>
                        </div>
                        <span onclick="document.getElementById('calendar').style.display='none'" class="close" title="Close Modal">×</span>
                        <div class="card justify-content-center">
                            <table class="m-3">
                                <tbody>
                                    <tr>
                                        <td>Понедельник</td>
                                        <td>Вторник</td>
                                        <td>Среда</td>
                                        <td>Четверг</td>
                                        <td>Пятница</td>
                                        <td>Суббота</td>
                                        <td>Воскресенье</td>
                                    </tr>
                                    <script type="text/javascript">
                                        for (var i = 0; i < 6; i++) {
                                            document.write('<tr>');
                                            for (var j = 0; j < 7; j++) {
                                                document.write('<td id="td-' + i + '-' + j + '">&#129311;</td>');
                                            }
                                            document.write('</tr>');
                                        }

                                        draw_month(0, 31);

                                        function draw_month(date, days_in_month) {
                                            day = 1;
                                            date++;
                                            for (var i = 0; i < 6; i++) {
                                                for (var j = 0; j < 7; j++) {
                                                    if (date > 1) {
                                                        date--;
                                                        document.getElementById("td-" + i + "-" + j).innerHTML = '&#129311;';
                                                    } else if (days_in_month > 0) {
                                                        document.getElementById("td-" + i + "-" + j).innerHTML = '<a href="#" onclick="select_date(' + day + '); document.getElementById(&#39;calendar&#39;).style.display=&#39;none&#39;; return false;">' + day + '</a>';
                                                        day++;
                                                        days_in_month--;
                                                    } else {
                                                        document.getElementById("td-" + i + "-" + j).innerHTML = '&#129311;';
                                                    }
                                                }
                                            }
                                        }

                                        function select_date(day) {
                                            var year = document.getElementById("yearSelect").value;
                                            var month = document.getElementById("yearSelection").value;
                                            document.getElementById("dateValue").value = (day < 10 ? ('0' + day) : (day)) + '/' +
                                                (month < 10 ? ('0' + month) : (month)) + '/' +
                                                (year < 10 ? ('000' + year) : (year < 100 ? ('00' + year) : (year < 1000 ? ('0' + year) : year)));
                                        }

                                        function change_date() {
                                            var date = new Date();
                                            var year = document.getElementById("yearSelect").value;
                                            var month = document.getElementById("yearSelection").value;
                                            var date = new Date(year, month - 1, 0);
                                            draw_month(date.getDay(), new Date(year, month, 0).getDate());
                                        }

                                        document.getElementById("yearSelect").onchange = function(event) {
                                            change_date();
                                        };

                                        document.getElementById("yearSelection").onchange = function(event) {
                                            change_date();
                                        };
                                    </script>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>

            <div class="d-flex mt-3 mb-3">
                <input class="btn btn-outline-dark mr-3" type="submit" name="submit" value="Отправить">
                <button class="btn btn-outline-danger" type="button" value="reset">Очистить форму</button>
            </div>

        </form>
    </div>
</div>
@endsection