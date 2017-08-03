<?php
function categoriesStaff(){
        require 'connect.php';
        //include 'getCVsBycategory.php';
        $rows = array();
        $value = array();
        $stmt = $pdo->prepare("SELECT CATEGORY_NAME FROM CATEGORY");
        $stmt -> execute();
        $result= $stmt->fetchAll(PDO::FETCH_ASSOC);
        $json_array = json_encode($result);
        foreach($result as $item){
           
            foreach($item as $key=>$value)
            {
                $rows[$key] = $value;
                //$newVar = getCVByCategories($rows[$key]);
                echo  "<div class='panel-body' >
                                        <div >
                                            <button id='".$rows[$key]."'type='button' class='buttonClicked btn btn-default btn-block' onClick='cvsByCategoryStaff()' >".$rows[$key]."</button>
                                        </div>
                                    </div>";
            }

        }
    }

function categoriesEmployer(){
        require 'connect.php';
        //include 'getCVsBycategory.php';
        $rows = array();
        $value = array();
        $stmt = $pdo->prepare("SELECT CATEGORY_NAME FROM CATEGORY");
        $stmt -> execute();
        $result= $stmt->fetchAll(PDO::FETCH_ASSOC);
        $json_array = json_encode($result);
        foreach($result as $item){
           
            foreach($item as $key=>$value)
            {
                $rows[$key] = $value;
                //$newVar = getCVByCategories($rows[$key]);
                echo  "<div class='panel-body' >
                                        <div >
                                            <button id='".$rows[$key]."'type='button' class='buttonClicked btn btn-default btn-block' onClick='cvsByCategoryEmployer()' >".$rows[$key]."</button>
                                        </div>
                                    </div>";
            }

        }
    }

function categoriesSelection(){
            require 'connect.php';
        $rows = array();
        $value = array();
        $stmt = $pdo->prepare("SELECT CATEGORY_NAME FROM CATEGORY");
        $stmt -> execute();
        $result= $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach($result as $item){

                foreach($item as $key=>$value)
                {
                    $rows[$key] = $value;
                    echo "<option value='".$rows[$key]."'>".$rows[$key]."</option>";
                }

            }
            
            
        }
?>
