<?php
    require "bdd_connect.php";
?>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="editbookLabel">تعديل كتاب</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal form-label-left" id="edit_book" method="post" action="server/edit_book.php">
                        <input type="hidden" name="bookId" id="editInput" value="<?php echo $_POST['bookId']; ?>" />
                        <?php
                            $book = $connect->query("SELECT * FROM bookstore WHERE bookId =".$_POST['bookId']);
                            while ($row = $book->fetch()) {
                        ?>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 marginelo">
                                <input type="text" id="e_title" name="title" value='<?php echo $row["title"]; ?>' required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="e_title">العنوان</label>     
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 marginelo">
                                <input type="text" id="e_author" name="author" value='<?php echo $row["author"]; ?>' required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="e_author">المؤلف</label>   
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 marginelo">
                                <input type="number" min="2000" id="e_publicationYear" name="publicationYear"  value='<?php echo $row["publicationYear"]; ?>' required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="e_publicationYear">سنة النشر </label>                                                    
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 marginelo">
                                <input type="text" id="e_isbn" name="isbn" value='<?php echo $row["isbn"]; ?>' required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="e_isbn">ISBN</label>                                                   
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 marginelo">
                                <input type="number" min="10" id="e_pages" name="pages" value='<?php echo $row["pages"]; ?>' required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="e_pages">الصفحات</label>                                                   
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 marginelo">
                                <input type="number" min="0" id="e_quantity" name="quantity" value='<?php echo $row["quantity"]; ?>' required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="e_quantity">الكمية</label>                                                   
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 marginelo">
                                <input type="text" id="e_speciality" name="speciality" value='<?php echo $row["speciality"]; ?>' required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="e_speciality">التخصص</label>                                                   
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 marginelo">
                                <input type="number" min="0" step="5" id="e_price" name="price" value='<?php echo $row["price"]; ?>' required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="e_price">السعر</label>                                                   
                        </div>
                        <?php 
                            }
                            $book->closeCursor();
                            unset($connect);
                        ?>
                    </form>
                    <button style="margin-left:40%" type="submit" class="btn btn-primary btn-lg" form="edit_book"> تعديل </button>
                </div>
            </div>
        </div>