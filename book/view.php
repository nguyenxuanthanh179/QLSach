<?php include("../layout/header.php") ?>
    <div class="content col-8">
        <div class="row flex">
            <h2>List of books</h2>
            <a class="content__add" href="./../book/add.php">
                <i class="fas fa-plus plus"></i>
                Add 
            </a>
        </div>
        <div class="table">
            <table>
                <thead class="table__header">
                    <tr class="header__title">
                        <th style="width:40px">ID</th>
                        <th style="width:150px">Name</th>
                        <th style="width:80px">Image</th>
                        <th style="width:100px">Author</th>
                        <th style="width:80px">Category</th>
                        <th style="width:100px">Price</th>
                        <th style="width:100px">Sale</th>
                        <th style="width:300px">Description</th>
                        <th style="width:100px">Options</th>
                    </tr>
                </thead>
                <tbody class="table__body">
                <?php
                        require('../include/config.php');
                        $page = isset($_GET['page']) ? $_GET['page'] : 1;
                        $limit = 5;
                        $startBook = $page * $limit - $limit;
                        $sql1="SELECT books.*, categories.name as category_name 
                        FROM books left join categories on books.category_id = categories.id  LIMIT $startBook, $limit ";
                        $book = $conn->prepare($sql1);
                        $book->execute();
                        $books = $book->fetchAll(PDO::FETCH_OBJ);          
                        $index = 1;
                        foreach($books as $book){ ?>
                            <tr > 
                                <td align="center"><?php echo $index++ ?></td>
                                <td><?php echo $book->name ?></td>
                                <td align="center"><img class ='edit__img' src="./../photos/<?php echo $book->image ?>"/></td>
                                <td><?php echo $book->author ?></td>
                                <td align="center"><?php echo $book->category_name ?></td>
                                <td align="center"><?php echo number_format($book->price).' VNĐ' ?></td>
                                <td align="center"><?php echo number_format($book->sale) .' VNĐ'?></td>
                                <td><?php echo $book->description ?></td>
                                <td align="center">
                                    <a href="./../book/edit.php?id=<?php echo $book->id;?>" class="button"><i class="far fa-edit"></i></a>
                                    <a onclick="return confirm('Are you sure you want to delete this entry?')" href="./../book/delete.php?id=<?php echo $book->id;?>" class="button"><i class="far fa-trash-alt"></i> </a>
                                </td>
                            </tr>
                            <?php
                            }
                        ?>
                        
                </tbody>
                        
            
            </table>    
        </div>
        <?php
        $sql2="SELECT * FROM books ";
        $result = $conn->prepare($sql2);
        $result->execute();
        $rows = $result->fetchAll(PDO::FETCH_OBJ);   
        $bookCount = count($rows); 
        $total = ceil($bookCount / $limit );   
        ?>
        <div class="pagination">
            <ul class="list__pagination">
            <?php if ($page > 1): ?> 
                
                <li class="list__pagination-item">
                    <a href="view.php?page=<?= $page - 1 ?>" class="pagination__links"> <i class="fas fa-chevron-left"></i></a>
                </li>

            <?php endif; ?>
                <?php for($i = 1; $i <= $total; $i++ ): ?>
                    <?php if ($page == $i){ ?> 
                        <li class="list__pagination-item"><a href="view.php?page=<?= $i ?>" class="pagination__links"><?= $i ?></a></li>
                    <?php } else {?>
                        <li class="list__pagination-item "><a href="view.php?page=<?= $i ?>" class="pagination__links"><?= $i ?></a></li>
                <?php } endfor; ?>
                
                <?php if ($page !== $total): ?> 
                
                    <li class="list__pagination-item">
                        <a href="view.php?page=<?= $page + 1 ?>" class="pagination__links"> <i class="fas fa-chevron-right"></i></a>
                    </li>

                <?php endif; ?>
            </ul>
        </div>
    </div>
</main>
<?php include('../layout/footer.php')?>
