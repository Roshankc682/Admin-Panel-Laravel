
@extends('layout.header_footer')


@section('search_page_content')

@if(isset($details))
 
 
 	<?php $url = "http://localhost:8000/upload_file/Book_image/"; ?>
<div class="container" style="width:30%;">
            <form action="{{URL::to('/search')}}" class="form-inline" style="padding: 10px;" method="POST">
              {{@csrf_field()}}
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search_parameter">
            <center><button class="btn btn-outline-dark my-2 my-sm-0" style="background-color: #3bc551;" type="submit">Search</button></center>
            </form>
      </div>
<center><h1 class="Available_book">Searched Books</h1></center>

 <table class="table table-dark" style="width:99%;margin-left: 5px;">
  <thead>
    <tr>
      <th scope="col">Book Id</th>
	   <th scope="col">Cover Page</th>
      <th scope="col">Tittle</th>
      <th scope="col">Author</th>
      <th scope="col">Category</th>
      <th scope="col">Price</th>
      <th scope="col">Description</th>
      <th scope="col">Edit</th>
      <th scope="col">Remove</th>
    </tr>
  </thead>


      <!-- print_function_book -->
      
		@foreach($details as $print_book)
  		<tbody>
    		<tr>
    			<th scope="col">{{$print_book->id}}</th>
				<th scope="col"><img src="<?php echo $url ;?>{{$print_book->image}}" style="height: 100px;width: 100px;border-radius: 10px;"></th>
    			<th scope="col" title="{{$print_book->title}}"><?php echo mb_strimwidth($print_book->title, 0, 16, '...'); ?></th>
    			<th scope="col" title="{{$print_book->author}}"><?php echo mb_strimwidth($print_book->author, 0, 16, '...'); ?></th>
    			<th scope="col" title="{{$print_book->category}}"><?php echo mb_strimwidth($print_book->category, 0, 16, '...'); ?></th>
    			<th scope="col">R.s {{$print_book->price}}</th>
    			<th scope="col" title="{{$print_book->description}}"><?php echo mb_strimwidth($print_book->description, 0, 30, '...'); ?></th>
    			<th scope="col" title="Edit the Book"><a href="/edit/{{$print_book->id}}" name="{{$print_book->id}}"><i class="btn btn-outline-primary fas fa-edit"></i></a></th>
    		   <th scope="col" title="Delete the Book"><a href="/{{$print_book->id}}/delete?deleted={{$print_book->title}}" name="{{$print_book->id}}"><i class="btn btn-outline-danger far fa-trash-alt"></i></a></th>
    		</tr>
  		</tbody>
  	  @endforeach
</table>
@endif
@endsection