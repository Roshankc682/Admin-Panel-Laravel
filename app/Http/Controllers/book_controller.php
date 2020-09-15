<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\book;
class book_controller extends Controller
{
    //
    public function index()
    {
    	return view('upload');
     }


	// print data in table
      public function print_function()
    {
   		return view('view')->with('print_function_book',book::all());
    }



 public function home()
    {
    	return view('view');
     }
	

	public function store(Request $req)
	{
		// echo "<pre>";
		// print_r($_POST);
		// print_r($_FILES);
		// echo "processing";

		// image/jpeg image/png image/gif image/jpg


if($req->hasfile('image'))
{
		if(isset($_FILES['image']))
        {
			
			$file_type = array("image/jpeg", "image/png", "image/gif", "image/jpg");
			if (in_array($_FILES['image']['type'], $file_type))
	  		{
	  			// echo $_FILES['image']['type'];
	  			
	  			// print_r($_FILES);
        		$file = $req->file('image');
        		$extension = $file->getClientOriginalExtension();

        		
        		// jpeg png gif jpg
        		$file_extension = array("jpeg", "png", "gif", "jpg");
        		if (in_array($extension, $file_extension))
	  			{

	  				// title author category price description
                
	  				$Book = new book();
	  				$Book->title = $req->input('title');

	  				$Book->author = $req->input('author');
	  				$Book->category = $req->input('category');
	  				$Book->price = $req->input('price');
	  				$Book->description = $req->input('description');
	  				
	  			// echo $Book->title;
	  			// echo $Book->author;
	  			// echo $Book->category;
	  			// echo $Book->price;
	  			// echo $Book->description;
	  				$hash = bin2hex(random_bytes(16));
	  				$hash_time = bin2hex(time());
	  				$filename = $hash.$hash_time.'.'.$extension;
	  				// // echo '<br>'.$filename;
	  				$file->move('upload_file/Book_image/',$filename);
	  				$Book->image = $filename;
	  				$Book->save();
	      			session()->flash('success','Book uploaded');
		  			return redirect("/upload?upload=success");

		  		}
		  		else
		  		{
		  			session()->flash('unsuccess','Not valid');
	  				return redirect("/upload?upload=fail");
		  		}
	  			
	  		}
			else
	  		{
	  			session()->flash('unsuccess','Not valid');
	  			return redirect("/upload?upload=fail");
	  		}
		}
		else
		{
			session()->flash('unsuccess','Not valid');
	  			return redirect("/upload?upload=fail");
		}
}
else
{
	session()->flash('unsuccess','Not valid');
	  			return redirect("/upload?upload=fail");
}		
	
}



//final_delete
public function final_delete(book $delete_id)
    {
    	$Book = new book();
    	
    	$print_the_title = htmlspecialchars($_GET['deleted']);
    	// echo $print_the_title;
    	$filename =  "upload_file/Book_image/".$delete_id->image;
    	// echo $filename;
    	unlink($filename);
    	$delete_id->delete();
    	session()->flash('success_delete',"{$print_the_title} deleted successfully");
        return redirect("/");
    }

    // edit_delete
	public function edit_delete(book $edit_id)
    {
    	// echo $edit_id;

    	return view('edit')->with('edit_id_passed',$edit_id,book::all());
    }

    public function final_edit_means_final($id,Request $request)
    {
    	$Book = new book();
    	// echo "<pre>";
    	// print_r($_POST);
    	// echo $id;
    	$image_name_to_delete = $_POST['image_name'];

    	$data_passwd_as_edit = $request->all();
    	// print_r($data_passwd_as_edit);

    	if($request->hasfile('image'))
		{
			if(isset($_FILES['image']))
        	{
        		$file_type = array("image/jpeg", "image/png", "image/gif", "image/jpg");
				if (in_array($_FILES['image']['type'], $file_type))
	  			{
	  				// echo $_FILES['image']['type'];
	  			
		  			// print_r($_FILES);
        			$file = $request->file('image');
        			$extension = $file->getClientOriginalExtension();

        		
	        		// jpeg png gif jpg
        			$file_extension = array("jpeg", "png", "gif", "jpg");
        			if (in_array($extension, $file_extension))
	  				{
	  					
	  					$filename_delete =  "upload_file/Book_image/".$image_name_to_delete;	
	  					// echo $filename;
	  					unlink($filename_delete);
	  					$hash = bin2hex(random_bytes(16));
	  					$hash_time = bin2hex(time());
	  					$filename = $hash.$hash_time.'.'.$extension;
	  					echo '<br>'.$filename;
	  					$file->move('upload_file/Book_image/',$filename);
	  					

	  							session()->flash('edit_success',"Data updated");
						    	$data_edit = book::find($id);
						    	$data_edit->image = $filename;
								$data_edit->save();
        						// return redirect("/");
	  				}
	  				else
	  				{
	  					session()->flash('unsuccess','Not valid');
	  					return redirect("/");
	  				}
	  			}
	  			else
	  			{

	  					session()->flash('unsuccess','Not valid');
	  					return redirect("/");
  				}
  			}
	  		else
	  		{

	  					session()->flash('unsuccess','Not valid');
	  					return redirect("/");
			}
        }
        else
        {
        		
	  					// session()->flash('unsuccess','Not valid');
	  					// return redirect("/");
        }
	
			$Title_by_user = $_POST['title'];
			echo $Title_by_user;
        		if(!$_POST["title"]==null)
				{
						    if (!strcmp($Title_by_user, 'Title')==1) 
						    {
						    	// session()->flash('edited_failed',"It's seems you doesn't change anything");
        						// return redirect("/");
        						
						    }
						    else
						    {
						    	session()->flash('edit_success',"Data updated");
						    	$data_edit = book::find($id);
						    	$data_edit->title = $data_passwd_as_edit['title'];
								$data_edit->save();
        						return redirect("/");
						    }

				}	
				else
				{
					// session()->flash('edited_failed',"It's seems you doesn't change anything");
        			// return redirect("/");
				}

				$author_by_user = $_POST['author'];
				if(!$_POST["author"]==null)
				{
						    if (!strcmp($author_by_user, 'Author')==1) 
						    {
						    	// session()->flash('edited_failed',"It's seems you doesn't change anything");
        						// return redirect("/");
						    }
						    else
						    {
						    	session()->flash('edit_success',"Data updated");
						    	$data_edit = book::find($id);
						    	$data_edit->author = $data_passwd_as_edit['author'];
								$data_edit->save();
        						// return redirect("/");
						    }

				}	
				else
				{
					// session()->flash('edited_failed',"It's seems you doesn't change anything");
        			// return redirect("/");
				}

				$category_by_user = $_POST['category'];
				if(!$_POST["title"]==null)
				{
						    if (!strcmp($category_by_user, 'Category')==1) 
						    {
						    	// session()->flash('edited_failed',"It's seems you doesn't change anything");
        						// return redirect("/");
						    }
						    else
						    {
						    	session()->flash('edit_success',"Data updated");
						    	$data_edit = book::find($id);
						    	$data_edit->category = $data_passwd_as_edit['category'];
								$data_edit->save();
        						// return redirect("/");
						    }

				}	
				else
				{
					// session()->flash('edited_failed',"It's seems you doesn't change anything");
        			// return redirect("/");
				}

				$price_by_user = $_POST['price'];
				if(!$_POST["title"]==null)
				{
						    if (!strcmp($price_by_user, 'Price')==1) 
						    {
						    	// session()->flash('edited_failed',"It's seems you doesn't change anything");
        						// return redirect("/");
						    }
						    else
						    {
						    	session()->flash('edit_success',"Data updated");
						    	$data_edit = book::find($id);
						    	$data_edit->price = $data_passwd_as_edit['price'];
								$data_edit->save();
        						// return redirect("/");
						    }

				}	
				else
				{
					// session()->flash('edited_failed',"It's seems you doesn't change anything");
        			// return redirect("/");
				}

				$description_by_user = $_POST['Description'];
				if(!$_POST["Description"]==null)
				{
						    
						    	session()->flash('edit_success',"Data updated");
						    	$data_edit = book::find($id);
						    	$data_edit->description = $data_passwd_as_edit['Description'];
								$data_edit->save();
						    

				}	
				else
				{
					// session()->flash('edit_success',"It's seems you doesn't change anything");
        			// return redirect("/");
				}


    	
		

   		

   				return redirect("/");

    }

}