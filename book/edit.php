<?php 
    require("../include/config.php");
    $id= $_GET['id'];
    $sql="SELECT * FROM books WHERE id='$id'";
    $books = $conn->prepare($sql);
    $books->execute(['id'=> $id]);
    $book = $books->fetch(PDO::FETCH_OBJ);
    
    if(isset($_POST['update'])){
        $name = $_POST['name'];
        $image = $_POST['image'];
        $image_save=$image; 
        if (isset($_FILES['image'])) {
            $file_name = $_FILES['image']['name'];
            $file=$_FILES['image']['tmp_name'];
            $upload_folder = "./../photos/";
            move_uploaded_file($file,$upload_folder .$file_name);
            $image_save = $_FILES["image"]["name"];
        }
        $price = $_POST['price'];
        $sale = $_POST['sale'];
        $category_id = $_POST['category_id'];
        $description = $_POST['description'];
        $created_at = $_POST['created_at'];
        $updated_at = $_POST['updated_at'];
        $author = $_POST['author'];
        $sql = 'UPDATE books 
        SET name=:name, image=:image_save, author=:author, price=:price, sale=:sale, category_id=:category_id, description=:description, created_at =:created_at, updated_at=:updated_at 
        WHERE id=:id';
        $books = $conn->prepare($sql);
        if($books->execute([
            'id'=>$id,
            'name' => $name,
            'author'=>$author,
            'image_save'=>$image_save,
            'price'=>$price,
            'sale'=>$sale,
            'category_id'=>$category_id,
            'description'=>$description,
            'created_at'=>$created_at,
            'updated_at'=>$updated_at])){
            header("Location:./../book/view.php");
        }
        
    }
    require('../layout/header.php')
?>
            <div class="content col-8">
                <div class="row flex">
                    <h2>Edit information</h2>
                </div>
                <div class="table">
                <form action="" method="post" enctype="multipart/form-data">
                        <div class="row form-group">
                            <div class="col-6 ">
                                <label for="name" >Name</label>
                                <input type="text" name="name" id="name" class="form-control" value="<?php echo $book->name ?>">
                        
                            </div>
                            <div class="col-6">
                                <label for="author" >Author</label>
                                <input type="text" name="author" class="form-control" value="<?php echo $book->author ?>">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-6">
                                <label for="image" >Image</label>
                                <input type="file" name="image" class="form-control" value="<?php echo $book->image ?>">
                            </div>
                           
                            <div class="col-6">
                                <label for="category_id" >Category</label>
                                <input type="text" name="category_id" class="form-control" value="<?php echo $book->category_id ?>">   
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="price" >Price</label>
                                <input type="text" name="price" class="form-control" value="<?php echo $book->price ?>">
                            </div>
                            <div class="col-6" >
                                <label for="sale" >Sale</label>
                                <input type="text" name="sale" class="form-control" value="<?php echo $book->sale ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="created_at" >Date created</label>
                                <input type="date" name="created_at" class="form-control" value="<?php echo $book->created_at ?>">
                            </div>
                            <div class="col-6" >
                                <label for="updated_at" >Date updated</label>
                                <input type="date" name="updated_at" class="form-control" value="<?php echo $book->updated_at ?>">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="description" >Description</label>
                            <textarea type="text" name="description" class="form-control"><?php echo $book->description ?></textarea>
                        </div>
                        <button type="submit" name="update" class="btn btn-primary">Save</button>
                        <a href="./../book/view.php" class="btn btn-default btn-primary">Cancel</a>
                    </form>
                </div>
            </div>
        </main>
<?php require('../layout/footer.php')?>
   
