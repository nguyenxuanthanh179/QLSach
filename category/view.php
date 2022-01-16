<?php require("../layout/header.php") ?>
    <div class="content col-8">
        <div class="row flex">
            <h2>List of Categories</h2>
            <a class="content__add" href="./../category/add.php">
                <i class="fas fa-plus plus"></i>
                Add
            </a>
        </div>
        <div class="table">
            <table>
                <thead class="table__header">
                    <tr class="header__title">
                        <th style="width:20px">ID</th>
                        <th style="width:200px">Name</th>
                        <th style="width:100px">Image</th>
                        <th style="width:100px">Date created</th>
                        <th style="width:100px">Date updated</th>
                        <th style="width:100px">Options </th>
                    </tr>
                </thead>
                <tbody class="table__body">
                <?php
                        require('../include/config.php');
                        $page = isset($_GET['page']) ? $_GET['page'] : 1;
                        $limit = 5;
                        $startCategory = $page * $limit - $limit;
                        $sql1="SELECT * FROM categories LIMIT $startCategory, $limit ";
                        $category = $conn->prepare($sql1);
                        $category->execute();
                        $categories = $category->fetchAll(PDO::FETCH_OBJ);          
                        $index = 1;
                        foreach($categories as $category){ ?>
                            <tr > 
                                <td align="center"><?php echo $index++ ?></td>
                                <td><?php echo $category->name ?></td>
                                <td align="center"><img class ='edit__img' src="./../photos/<?php echo $category->image ?>"/></td>
                                <td><?php echo $category->created_at ?></td>
                                <td><?php echo $category->updated_at ?></td>
                                <td align="center">
                                    <a href="./../category/edit.php?id=<?php echo $category->id;?>" class="button"><i class="far fa-edit"></i></a>
                                    <a onclick="return confirm('Are you sure you want to delete this entry?')" href="./../category/delete.php?id=<?php echo $category->id;?>" class="button"><i class="far fa-trash-alt"></i> </a>
                                </td>
                            </tr>
                            <?php
                            }
                        ?>
                        
                </tbody>
                        
            
            </table>    
        </div>
        <?php
        $sql2="SELECT * FROM categories ";
        $result = $conn->prepare($sql2);
        $result->execute();
        $rows = $result->fetchAll(PDO::FETCH_OBJ);   
        $categoryCount = count($rows); 
        $total = ceil($categoryCount / $limit );   
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
<?php require('../layout/footer.php')?>
