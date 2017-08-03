
 <?php
                        //function categoriesUpload($categoryName){
                        if($_POST)
                        {
                            include 'connect.php';
                            $errors = array();

                            if(empty($_POST['newCategoryName']))
                            {
                                $errors['empty'] ="please insert a category name";

                            }

                            if(count($errors) == 0){

                                $stmt = $pdo->prepare("INSERT INTO CATEGORY (CATEGORY_NAME) VALUES (:CATEGORY_NAME);");
                                $stmt -> bindParam(":CATEGORY_NAME",$_POST['newCategoryName']);
                                $stmt -> execute();
                                $result = $stmt->fetchAll(PDO::FETCH_OBJ);
                                if($result > 0)
                                {
                                    $success = "new category created";
                                    $errors['success'] = $success;
                                }
                                else
                                {
                                    $fail = "could not create a category";
                                    $errors['fail'] = $fail;
                                }
                            }
                        }
                        ?>
                                

