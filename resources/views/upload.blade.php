 
@extends('layout.header_footer')


@section('upload_page_content')
    
        <div class="center">
            <center><h1>Upload Book</h1>
            
              @if(session()->has('success'))  
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{session()->get('success')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>
              @endif 

              @if(session()->has('unsuccess'))  
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{session()->get('unsuccess')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>
              @endif

 
            <div class="form-group upload_section">
              <form action="{{route('add_book')}}" method="POST" enctype="multipart/form-data">
                {{@csrf_field()}}
                <!-- // title author category price description -->
                  
                <strong><label for="usr">Title:</label></strong>
                <input type="text" name="title" class="form-control" placeholder="Title of Book ....">
                <strong><label for="usr">Author:</label></strong>
                <input type="text" name="author" class="form-control" placeholder="Author of Book ...">

                <strong><label for="usr">Category:</label></strong>
                <input type="text" name="category" class="form-control" placeholder="Category ...">

                <strong><label for="usr">Price:</label></strong>
                <input type="text" name="price" class="form-control" placeholder="Price of Book ...">

                <strong><label for="usr">Description:</label></strong>
                <textarea name="description" class="form-control" placeholder="Description of Book ..." rows="3"></textarea>


      
              <div class="input-group my-3">
                
                <div class="custom-file">
                  <input type="file" name="image" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                  <label class="custom-file-label" for="inputGroupFile01">Browse Image</label>
                </div>
                </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
              
            </div>

            </center>
          </form>
        </div>



    </body>
    </html>
@endsection