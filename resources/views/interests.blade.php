@extends('layout')

@section('title')
My Interests
@endsection

@section('main_content')

<div class="menu-left nav flex-column col-2">
    <div class="list-group">
        <a href="#AnchorBooks" class="list-group-item list-group-item-action">
            My favourite books
        </a>
        <a href="#AnchorFilms" class="list-group-item list-group-item-action">
            My favourite films
        </a>
        <a href="#AnchorMusic" class="list-group-item list-group-item-action">
            My favourite music
        </a>
        <a href="#AnchorHobby" class="list-group-item list-group-item-action">
            My hobbies
        </a>
    </div>

    <a href="#AnchorInterests" class="back-up bg-light">
        <img src="../assets/imgs/icons/back.png" alt="Нет картинки" width="50px" height="50px">
    </a>
</div>

<div class="main-center justify-content-center pl-3">
    <div>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Volutpat consequat mauris nunc congue.
            Porttitor eget dolor morbi non arcu. Id porta nibh venenatis cras sed felis eget velit. Nunc eget lorem dolor sed viverra ipsum nunc aliquet bibendum.
            Adipiscing commodo elit at imperdiet dui accumsan sit amet. Bibendum arcu vitae elementum curabitur vitae.
            Et pharetra pharetra massa massa ultricies mi. Diam sollicitudin tempor id eu. Nulla malesuada pellentesque elit eget gravida cum sociis natoque penatibus.
            Vestibulum rhoncus est pellentesque elit. Nunc sed velit dignissim sodales ut eu.
            Ut consequat semper viverra nam. Aliquet lectus proin nibh nisl condimentum id venenatis.
            Sed sed risus pretium quam vulputate dignissim.
            Elit duis tristique sollicitudin nibh sit. Vitae nunc sed velit dignissim sodales.
            Imperdiet proin fermentum leo vel orci. Feugiat nibh sed pulvinar proin.
        </p>

        <p>
            Dignissim suspendisse in est ante in nibh mauris cursus mattis.
            Morbi tincidunt ornare massa eget.
            Odio eu feugiat pretium nibh ipsum consequat nisl vel pretium.
            Diam quam nulla porttitor massa id neque aliquam. Tempus urna et pharetra pharetra massa massa ultricies.
            Purus sit amet volutpat consequat mauris nunc congue nisi. Quam quisque id diam vel quam elementum pulvinar etiam non.
            Sed enim ut sem viverra aliquet eget. Massa placerat duis ultricies lacus sed turpis.
            Magna fringilla urna porttitor rhoncus dolor. Proin fermentum leo vel orci porta non.
            Leo in vitae turpis massa sed elementum tempus egestas. Ultricies mi quis hendrerit dolor magna eget est lorem.
        </p>
        <hr>

        <?php
        foreach ($data as $item) {
            echo '<h3 id="' . $item["Id"] . '">' . $item["Name"] . '</h3>';
            echo '<hr>';
            echo '<div class="d-flex flex-row">';
            foreach ($item["Images"]["Value"] as $pkey => $image) {
                echo '<div class="gallery-card">';
                echo '      <img class="card-img zoomed-image" src="../assets/imgs/interests/' . $pkey . '.jpg">';
                echo '</div>';
            }
            echo '</div>';
            echo '<p>' . $item["Content"] . '</p>';
        }
        ?>
    </div>
</div>

@endsection