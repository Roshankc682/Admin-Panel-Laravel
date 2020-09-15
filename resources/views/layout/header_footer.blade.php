<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Admin panel</title>


        <!-- Font awsum icons -->
         <script src="https://kit.fontawesome.com/6801da4b95.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="Nav_menu.css">

        <!-- google fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
        <link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">


        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

 
  <style type="text/css">
    body{
       background-image: url("https://www.apa.org/images/continuing-education_tcm7-211074.jpg");
        no-repeat center fixed;     
        background-size: cover;
        opacity: 0.9;
    }
    .upload_section{
      background-color: #ae9696;
      border-radius: 8px;
    }
      
      .center {
                margin: auto;
                width: 50%;
                padding: 10px;
                margin-top: 20px;
                border-radius: 20px;
              }
              .text_style{
                font-family: 'Tangerine', serif;
                font-size: 30px;
                text-shadow: 4px 4px 4px #aaa;
              }
              .collapse{
                background-color : #d1fad054;
                border-radius: 15px;
              }
              .Available_book{
                font-size: 50px;
               font-family: 'Shadows Into Light', cursive;
              }
    }

  </style>

  <nav class="navbar navbar-expand-lg navbar-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <strong><a class="text_style nav-link" href="/"><i class="fas fa-home"></i><span class="sr-only">(current)</span></a></strong>
      </li>
      <li class="nav-item">
        <strong><a class=" text_style nav-link" href="/upload">Add New</a></strong>
      </li>
    </ul>
    
  </div>
</nav>

@yield('view_page_content')


<div class="container">
@yield('upload_page_content')
</div>


<div class="container">
@yield('edit_page_content')
</div>



@yield('search_page_content')

<script>
function goBack() {
  window.history.back();
}
</script>