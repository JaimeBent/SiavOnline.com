<?php

    /*=======================================
    =FUNCION PARA LA VALIDACION DEL LOGIN
    ========================================*/
    
    function validacion($a, $b){     
       
        session_start();

        if(isset($_SESSION['cart'])){

            unset($_SESSION['cart']);
        }
         
        include '../setting/Connection.php';

        $db = new ConnectionDB();
        $connect = $db->connect();   

        $usuario= $a;
        $password= $b;
        $alert="";

        if(!empty($_SESSION['active'])){

            header ('location:../Customers/SalesProducts.php');

        }else{

            if (empty($usuario) and empty($password)){ 
            
                $mensaje = "Todos los campos son obligatorios";
                return $mensaje;
                
            }
            if(empty($usuario) and $password){ 
            
                    $mensaje = "El campo Usuario es obligatorio";
                    return $mensaje;
            }
            if ($usuario and empty($password)){ 
            
                $mensaje = "El campo contraseña es obligatorio";
                return $mensaje;
            }
            else{
                
                $query = mysqli_query($connect,"SELECT * FROM tblusuario Where UsuCedula=$usuario and UsuClave=$password");
                $resultado = mysqli_num_rows($query);
                $data =mysqli_fetch_array($query);
                if($resultado>0){   
                    $_SESSION['active']= true;
                    $_SESSION['iduser']= $data['UsuIdUsuario'];
                    $_SESSION['nombre']= $data['UsuNombre'];
                    $_SESSION['rol']= $data['RolId'];

                    if($data['RolId']==1){//administrador
                    
                        header ('location:../Users/ReadUsers.php');
                    }
                    if($data['RolId']==2){//vendedor
                                          
                        header ('location:../Users/ReadUsers.php');
                    }
                    if($data['RolId']==3){//cliente
                    
                        header ('location:../Customers/SalesProducts.php');
                    }


                }
                else{

                    $mensaje= 'Error: El usuario o contrasena son incorrectos';
                    return $mensaje;
                    session_destroy();
                }
            }
        }   
    }


    function validacionPassword($a, $b){     
       
        session_start();
        include '../setting/Connection.php';

        $db = new ConnectionDB();
        $connect = $db->connect();   

        $password= $a;
        $repeatPassword= $b;
        
        if(!empty($_SESSION['active'])){

            header ('location:../Customers/SalesProducts.php');

        }else{

            if (empty($password) and empty($repeatPassword)){ 
            
                $mensaje = "campo contraseña vacio";
                return $mensaje;

            }
        }
    }

    /*=====================================================================
    =FUNCION PARA TRAER LOS ROLES DEPENDIENDO DEL USUARIO QUE SE QUIERE UPDATE
    ========================================================================*/
    
    function ReadAux($tabledb=false, $field=false){   

        $db = new ConnectionDB();
        $connect = $db->connect();   

        $searchTable = "SELECT  MAX($field) FROM $tabledb";
        
        $sqlTable = mysqli_query($connect, $searchTable);
        
        $result = mysqli_fetch_array($sqlTable);
        
        return $result;
    }

    function ReadJoinAux($tabledb=false, $tabledb2=false, $tabledb3=false, $field=false, $field2=false, $field3=false,
                         $a=false, $c=false, $d=false, $usuario=false, $IdPedCurrent=false ){   

        $db = new ConnectionDB();
        $connect = $db->connect();   

        $searchTable = "SELECT * FROM $tabledb2 $a 
                        INNER JOIN $tabledb3 $c ON  $a.$field2 = $c.$field2 
                        INNER JOIN $tabledb $d ON $a.$field3 = $d.$field3 
                        WHERE $d.$field=$usuario AND $a.$field3=".$IdPedCurrent;

        //echo $searchTable;
                                
        $result = mysqli_query($connect, $searchTable);

        return $result;

    }
    

    
    function ReadCount($tabledb=false, $field=false, $id=false){   

/*         include '../setting/Connection.php';
        $db = new ConnectionDB();
        $connect = $db->connect(); */
        $hostname = "localhost";
        $database = "dbsiav"; 
        $username = "root"; 
        $password = "";
        $charset = "utf8";

        $connection= mysqli_connect($hostname, $username, $password, $database);

        if($field=="" && $id==""){

            $searchTable = ("SELECT COUNT(*) as totalRegisters FROM $tabledb");
                                
            $sqlTable = mysqli_query($connection, $searchTable);

            $result = mysqli_fetch_array($sqlTable);

            mysqli_close($connection);

            return $result;

        }else{
            // METODO PARA CONTAR LOS REGISTROS  CON UNA CONDICION DE LA BASE DE DATOS
            $searchTable = "SELECT COUNT(*) as totalRegisters FROM $tabledb WHERE $field=".$id;
              
            $sqlTable = mysqli_query($connection, $searchTable);

            $result = mysqli_fetch_array($sqlTable);

            mysqli_close($connection);

            return $result;

        }

    }



    