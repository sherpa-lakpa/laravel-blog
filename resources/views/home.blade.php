<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <title>Search with Laravel Scout</title>
    </head>
    <body>

    <h1 class="h1" style="text-align: center;background: rgba(0,0,0,0.5);">This is elastic serach output using Algolia</h1>
    {{-- Form for searching --}}
       <!--  <div class="container">
           <div class="well well-sm">
               <div class="form-group">
                   <div class="input-group input-group-md">
                       <div class="icon-addon addon-md">
                           <input type="text" placeholder="What are you looking for?" class="form-control" id="qta_field">
                       </div>
                       <span class="input-group-btn">
                           <a href='' onclick="this.href='api/search?q='+document.getElementById('qta_field').value"><button class="btn btn-default" type="button">Search!</button></a>
                       </span>
                   </div>
               </div>
           </div> -->
            <div id="products" class="row list-group">
            </div>
        </div>
        <div class="row">
        @foreach($posts as $post)
            <div class="col-md-8">
                <h1>{{ $post->title }}</h1>
                <p>{{ $post->body }}</p>
            </div>
        @endforeach
        </div>
    </body>
</html>