@extends('layout.header_footer')


@section('edit_page_content')
<style type="text/css">
	.flex_container_for_edit {
  display: flex;
  flex-wrap: wrap;
}

.flex_container_for_edit > div {
  background-color: #f1f1f1;
  width: 45%;
  
}
</style>
<?php $url = "http://localhost:8000/upload_file/Book_image/"; ?>
<div class="flex_container_for_edit" >
  <div style="border-radius: 10px;">
  			<center><h1 style="margin-right: 20px; font-family: 'Shadows Into Light', cursive;">Present Details</h1></center>

  			<label for="usr">Titlte:</label>
		 	<strong>{{$edit_id_passed->title}}</strong><br>

		 	<label for="usr">Author</label>
		 	<strong>{{$edit_id_passed->author}}</strong><br>

		 	<label for="usr">Category:</label>
		 	<strong>{{$edit_id_passed->category}}</strong><br>

		 	<label for="usr">Price:</label>
		 	<strong>{{$edit_id_passed->price}}</strong><br>

		 	<label for="usr" title="{{$edit_id_passed->description}}">Description:</label>
		 	<strong><?php echo mb_strimwidth($edit_id_passed->description, 0, 400, '...'); ?></strong><br><br>

		 	<label for="usr">Cover Page :</label>
		 	<img style="width: 150px;height: 150px;border-radius: 30%;" src="<?php echo $url.$edit_id_passed->image; ?>">


	</div>

	<div style="background-color: lightblue;opacity: 0.9;margin-left: 10px;border-radius: 10px;">
		
		<center><strong><h1 style="font-family: 'Shadows Into Light', cursive;">Edit

				<?php echo mb_strimwidth($edit_id_passed->title, 0, 15, '...'); ?>


		 </h1></strong></center>
		<form action="/{{$edit_id_passed->id}}/edit_file_for_good" method="POST" enctype="multipart/form-data">
	                {{@csrf_field()}}
		<strong><label for="usr">Title:</label></strong>
		<input type="text" value="Title" name="title" class="form-control">

		<strong><label for="usr">Author:</label></strong>
		<input type="text" value="Author" name="author" class="form-control">


		<strong><label for="usr">Category:</label></strong>
		<input type="text" value="Category" name="category" class="form-control">

		<strong><label for="usr">Price:</label></strong>
		<input type="text" value="Price" name="price" class="form-control">

		<strong><label for="usr">Description:</label></strong>
		 <textarea type="text" name="Description" class="form-control" placeholder="Type here Description ..." rows="3"></textarea>

		<strong><label for="usr">Image :</label></strong>
		 <div class="input-group my-3">
                
                <div class="custom-file">
                	<input type="hidden" name="image_name" value="{{$edit_id_passed->image}}">
                  <input type="file" name="image" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                  <label class="custom-file-label" for="inputGroupFile01">Browse Image</label>
                </div>
                </div>

		<br>
		<center><button type="submit" class="btn btn-secondary">Save</button>

		</form>
		<button type="button" class="btn btn-danger" onclick="goBack()">Go Back</button></center>
		<br>
	</div>

<!-- finish flex -->
</div>
@endsection