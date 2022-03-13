<?php
//admin name email password

//logic


// class calculatFactorial{
//     function calculat($num){
//         $result=1;
// for($i=1;$i<$num;$i++){

// $result*=$i;
// }
// return $result;

//     }
// }
// $obj =new calculatFactorial;
// echo $obj->calculat(4);






//----------------
// class admin
// var $name;
// function setName($value){
//     $this->name = $value;
// }
// function getName(){
//     return $this->name;

// }
// // var $email;
// // var $password;


// }
//  $obj= new admin;
//  $obj-> setName('ahmed');
//  echo $obj->getName();



// class user{

// var $email;
// var $password;
// var $name;

// }
// $admin = new user() ;

// var_dump($admin);

// $adming = new user() ;

// var_dump($adming);

//-------------
//parnt class {titel, content,[added_by()]}
//child {author }   novel [pup_at()]
// class library{

// var $titel,$content;

// function setTitle($value){
//     $this->title =$value;
// }
// function setContent($value){
//     $this->content =$value
// }

// function getTitle(){
//     return $this->title;
// }
// function getContent(){
//     return $this->Content;
// }
// //mrto
// function aded_by(){
//     return 'add by admin';
// }
// }
// class  book extends library{

// var $author;
// function setAuthor($value){
//     $this->author =$value
// }

// function getAuthor(){
//     return $this->title;
// }


// }
 
// class noval extends library {
//     function puplish_id(){
//         return '9000';
//     }

// }
// $obj1= new book();
// $obj1-> setAuthor('omaer');
// // echo $obj1->getAuthor;
// echo $obj1->aded_by();
// $obj1= new novel();
// $obj1-> added_by();
//---------------
//parent (name phone)


//--------------------

// class student{
//     var $email ,$name ,$phone;
//     function __construct($value,$value2,$value3=null){
//         $this->email=$value;
//         $this->name =$value2;
//         $this->phone =$value3;
//     }
//     function mail(){
//         return $this->email. $this->name. $this->phone ;
//     }
//     function __destruct(){
//                 echo 'End of Class';
//             }
// }
// $obj= new student('fd@gmail.com','ahmed');

//   echo $obj->mail();


//-----------------
// parent(name , phone)
// class user{

//     var $name,$email,$password,$phone;

//     function __construct($value1,$value2,$value3,$value4){

//         $this->name     = $value;
//         $this->email    = $value2;
//         $this->phone    = $value3; 
//         $this->password = $value4;

//     }
//        function login($email,$password){
//       return "login function";
//    }
// function getData(){
//     return $this-> name . '<br>' . $this->email . '<br>' .$this->password ;
// }
// }
// class students extends user{


//     var $phone;

//     function __construct($value4,$namevalue,$emailvalue,$passwordvalue){
//   user ::__construct();
     
//         $this->phone    = $value4; 
      

//     }
//        function joinCourse(){
//       return "join course ";
//    }
// //  final  function login($email,$password){
// //     return "login function change";
// //  }
// }
// class admins extends user{
//     function addStudent(){
//         return 'aadf hjuyi';
//     }
// }
// $obj =new students('jyftdty','a@gmai.com','reat41');
// // echo $obj->joinCourse();
// echo $obj->getData();

// class students{

//     var $name,$email,$password,$phone;

//     function __construct($value1,$value2,$value3,$value4){

//         $this->name     = $value;
//         $this->email    = $value2;
//         $this->phone    = $value3; 
//         $this->password = $value4;

//     }

//    function login($email,$password){
//        // Logic .... 
//    }

//    function JoinCourse(){
//        // Logic
//    }
// }


// class admins{

//     var $name,$email,$password;

//     function __construct($value1,$value2,$value3){

//         $this->name     = $value;
//         $this->email    = $value2;
//         $this->phone    = $value3; 
//     }

//    function login($email,$password){
//        // Logic .... 
//    }

//    function addStudent(){
//        // Logic
//    }
// }
//--------------------------






// class adminUser{

//     var $name,$phone;
    
//     function setName($value){
//         $this->name =$value;
//     }
//     function setPhone($value){
//         $this->phone =$value;
//     }
    
//     function getName(){
//         return $this->name;
//     }
//     function getPhone(){
//         return $this->phone;
//     }
    
//     function login(){
//         return 'login by admin';
//     }
//     }
//     class  admin extends adminUser{
    

//         function addStudent(){
//             return ' student joind';
//               }
    
//     }
     
//     class student extends adminUser {
//         function joinCourse(){
//             return ' student added';
//         }
    
//     }
//     $obj1= new admin();
//    echo  $obj1-> addStudent();
//     $obj1= new Student();
//    echo  $obj1-> joinCourse();
//--------------------
// class library{

// var $titel,$content;

// function setTitle($value){
//     $this->title =$value;
// }
// function setContent($value){
//     $this->content =$value
// }

// function getTitle(){
//     return $this->title;
// }
// function getContent(){
//     return $this->Content;
// }
// //mrto
// function aded_by(){
//     return 'add by admin';
// }
//}
// $obj = new library();
// $obj->title='tdt';
// echo $obj->title;

// class library{

// private $titel,$content;
// }
// $obj = new library();
// // $obj->title='tdt';
// // echo $obj->title;
//-----------------
//dirct acces
// class message{
//     public static $name="root";
//     //method
//     public static function print(){
//         return 'hello' .self::$name;
//     }
// }
// $oj=new message();
// echo $obj-> print();
// echo message :: print();
interface contact{
    //no proprietar
    public function sendMail(){
        return 'mail send';
    }
    public function sendMessage(){
        return 'send message' ;
    }

}
class student implements contact {

public function test(){
    return 'hello errfr';
}
}
// $obj =new student();
// echo $obj->test();
//-----
abstract class car{

 function setName($value){
     private $name;
        return $this-> name=$value;
    }
    function getName(){
        return $this-> name;
    }
public abstract function sendNofication();
}
class bmw extends car{
    function message(){
        return 'weftf';
    }
    public  function sendNofication(){
        return 'fghjnkmgf';
    }
}
$obj = new bmw();
echo $obj->messae();

?>