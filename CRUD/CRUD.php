<?php

    class CRUD{ 
        
        /*============================================
        =METODO PARA REGISTRAR EN LA BASE DE DATOS
        =============================================*/

        public function Create($tabledb=false, $fields=false, $data=false){   

            $db = new ConnectionDB();
            $connect = $db->connect();

            $searchTable = ("INSERT INTO $tabledb ($fields) VALUES ($data)");
            //echo $searchTable;
            
            $sqlTable = mysqli_query($connect, $searchTable);

            return $sqlTable;

        }
        
        
        /*=================================================================
        =METODO PARA TRAER DATOS Y LISTARLOS EN LA PAGINA LA BASE DE DATOS
        ===================================================================*/
 
        public function Read($tabledb=false, $id=false, $separator=false, $showPage=false){   
            
            $db = new ConnectionDB();
            $connect = $db->connect();

            if($separator=="" && $showPage==""){

                $searchTable = ("SELECT * FROM $tabledb ORDER BY $id DESC");
                //echo $searchTable;
                $sqlTable = mysqli_query($connect, $searchTable);
                
               return $sqlTable;

            }else{

                //esto es para buscar en la base de datos y organizarlos para poder paginar la tabla
                $searchTable = ("SELECT * FROM $tabledb ORDER BY $id DESC LIMIT $separator, $showPage");
                //echo "2";
                $sqlTable = mysqli_query($connect, $searchTable);
                
                return $sqlTable;
            }
            
            
        }
        
        /*=================================================================
        =METODO PARA CONTAR LOS REGISTROS LA BASE DE DATOS
        ===================================================================*/

        public function ReadCount($tabledb=false, $field=false, $id=false){   

            $db = new ConnectionDB();
            $connect = $db->connect();

            if($field=="" && $id==""){

                $searchTable = ("SELECT COUNT(*) as totalRegisters FROM $tabledb");
                                    
                $sqlTable = mysqli_query($connect, $searchTable);
    
                $result = mysqli_fetch_array($sqlTable);
    
                return $result;

            }else{
                // METODO PARA CONTAR LOS REGISTROS  CON UNA CONDICION DE LA BASE DE DATOS
                $searchTable = "SELECT COUNT(*) as totalRegisters FROM $tabledb WHERE $field=".$id;
                  
                $sqlTable = mysqli_query($connect, $searchTable);
    
                $result = mysqli_fetch_array($sqlTable);
    
                return $result;

            }

        }

        /*=======================================================================
        =METODO PARA TRAER DATOS DE DOS TABLAS DE LA DB Y LISTARLOS EN LA PAGINA
        =========================================================================*/

        public function ReadJoin($tabledb=false, $tabledb2=false, $a=false, $b=false, $field=false, $id=false, $separator=false, $showPage=false, $WHERE=false){   

            $db = new ConnectionDB();
            $connect = $db->connect();

            if($WHERE==""){

            $searchTable = ("SELECT * FROM $tabledb $a INNER JOIN $tabledb2 $b ON $a.$field = $b.$field ORDER BY $id DESC LIMIT $separator,$showPage");
                                
            $sqlTable = mysqli_query($connect, $searchTable);
            
            return $sqlTable;

            }

            if($separator=="" && $showPage==""){

                //ESTO ES PARA TRAER DATOS DE DOS TABLAS DE LA DB  CON UNA CONDICION Y LISTARLOS EN LA PAGINA SIN PAGINADOR
                $searchTable = "SELECT * FROM $tabledb $a INNER JOIN $tabledb2 $b ON $a.$field = $b.$field $WHERE ORDER BY $id DESC";
                //echo $searchTable;           
                $sqlTable = mysqli_query($connect, $searchTable);
                
                return $sqlTable;

            }else{
                //ESTO ES PARA TRAER DATOS DE DOS TABLAS DE LA DB CON UNA CONDICION Y LISTARLOS EN LA PAGINA CON PAGINADOR
                $searchTable = "SELECT * FROM $tabledb $a INNER JOIN $tabledb2 $b ON $a.$field = $b.$field $WHERE ORDER BY $id DESC LIMIT $separator,$showPage";

                //echo $searchTable;           
                $sqlTable = mysqli_query($connect, $searchTable);
                
                return $sqlTable;

            }

        }

        
        /*========================================================================
        =METODO PARA TRAER DATOS DE LA BD Y LISTARLOS EN LA PAGINA PARA EDITARLOS
        ==========================================================================*/

        public function ReadUpdate($tabledb=false, $field=false, $id=false){   

            $db = new ConnectionDB();
            $connect = $db->connect();

            $searchTable = "SELECT * FROM $tabledb WHERE $field=".$id;
            //echo $searchTable;
              
            $sqlTable = mysqli_query($connect, $searchTable);

            $result = mysqli_fetch_array($sqlTable);

            return $result;

        }

        /*========================================================
        =METODO PARA INSERTAR DATOS EN LA DB PREVIAMENTE EDITADOS
        ==========================================================*/

        public function Update($tabledb=false, $fields=false, $field1=false, $id=false){   
            
            $db = new ConnectionDB();
            $connect = $db->connect();

            $searchTable = "UPDATE $tabledb SET $fields WHERE $field1=".$id;
            //echo $searchTable;
            
            $sqlTable = mysqli_query($connect, $searchTable);

            return $sqlTable;

        }
        //$update= "UPDATE $tabledb SET $field2 = '2' WHERE $field1 =".$search['ProId'];
        /*==================================================
        =METODO PARA ELIMINAR REGISTROS DE LA BASE DE DATOS
        ====================================================*/

        public function Delete($tabledb=false, $field=false, $id=false){   

            $db = new ConnectionDB();
            $connect = $db->connect();

            $searchTable = "DELETE FROM $tabledb WHERE $field=".$id;
            
            $sqlTable = mysqli_query($connect, $searchTable);

            return $sqlTable;

        }
        

    }

?>