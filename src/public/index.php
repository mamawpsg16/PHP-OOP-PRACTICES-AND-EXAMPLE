<?php 
// require './App/PaymentGateway/Paddle/CustomerProfile.php';
// require './App/PaymentGateway/Paddle/Transaction.php';
// require './App/PaymentGateway/Stripe/Transaction.php';

// spl_autoload_register(function($class){
//     // var_dump(dirname(__DIR__),getcwd(), dirname(__FILE__),);
//     $path = str_replace('\\','/',$class).'.php';
//     require $path;
// });
// require_once  dirname(__DIR__).'/App/Helpers/format.php';
require_once dirname(__DIR__).'/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();
session_start();
define('STORAGE_PATH',dirname(__DIR__).'/storage');
define('VIEW_PATH',dirname(__DIR__).'/views');

// require '../vendor/autoload.php';
// use App\PaymentGateway\Paddle\CustomerProfile;
// use App\PaymentGateway\Paddle\Transaction as PaddleTransaction;
// use App\PaymentGateway\Paddle\{CustomerProfile,Transaction as PaddleTransaction };

// ABSTRACT & INTERFACE USE CASE
/**
 *  If you have code that can or must be used by the descendant classes, you need an abstract class. 
 *  If you only have method and property declarations, you can use an interface. 
 * */


use App\App;
use App\View;
use App\Config;
use App\Toaster;
use App\Container;
use App\ToasterPro;
use App\Enums\Status;
use Tests\Unit\RouterTest;
use App\MagicMethod\Invoice;
use App\LateStaticBinding\ClassA;
use App\LateStaticBinding\ClassB;
// use App\Controllers\FileUploadController;
use App\Controllers\HomeController;
use App\Controllers\InvoiceController;
use App\Controllers\GeneratorController;
use App\ErrorHandling\Invoice as ErrorHandling;
use App\Controllers\Exercises\TransactionController;
use App\PaymentGateway\Paddle\Transaction as PaddleTransaction;
use App\PaymentGateway\Stripe\Transaction as StripeTransaction;
    // $allinone = new \App\Traits\AllInOneCoffeeMaker;
    // $allinone->setMilkType('all-in-one-milk');
    // echo $allinone->makeLatte();
    /** SUPER GLOBAL */
    // var_dump($_SERVER);
    // $server = new \App\SuperGlobal\SuperGlobal;
    $container = new Container();
    $router = new \App\SuperGlobal\Router\Route($container);

    // $generator = new GeneratorController;
    // $generator->index();
    $router->registerRouteWithAttribute([
        HomeController::class,
        InvoiceController::class
    ]);

    var_dump($router->routes());    
    // $router->get('/', [HomeController::class,'index'])
    // ->get('/invoices', [InvoiceController::class,'index'])
    // ->get('/invoices/create', [InvoiceController::class,'create'])
    // ->post('/invoices/create', [InvoiceController::class,'store'])
    // //  ->get('/users',fn() => [1,2,3])
    // // ->get('/upload', [FileUploadController::class,'index'])
    // // ->post('/upload', [FileUploadController::class,'store'])
    // ->get('/upload', [TransactionController::class,'index'])
    // ->get('/upload/create', [TransactionController::class,'create'])
    // ->post('/upload/create', [TransactionController::class,'store']);
    // var_dump($router->routes());
    (new App($container, $router,['uri' => $_SERVER['REQUEST_URI'],'request_method'=> strtolower($_SERVER['REQUEST_METHOD'])],
    new Config($_ENV)
    ))->run();
    
  
    // $router->register(
    //     '/grape',
    //     function(){
    //         echo 'Grape';
    //     }
    // );
    // $router->register(
    //     '/invoices',
    //     function(){
    //         echo 'Invoices';
    //     }
    // );
    // echo '<pre>';
    // var_dump($_SERVER['PHP_SELF']);
    // echo '<pre>';
    // var_dump($router->showRoutes());
    // $server->print();
    /** END OF SUPER GLOBAL */
    /** ITERABLE */
    // foreach(new \App\Iterate\Invoice(25) as $key => $value){
    //     echo $key .'='.$value .'<br/>';
    // }

    // $invoice_collection = new \App\Iterate\InvoiceCollection([new \App\Iterate\Invoice(25),new \App\Iterate\Invoice(15),new \App\Iterate\Invoice(35)]);
    // foreach($invoice_collection as $key => $value){
    //     echo $value->id .'='.$value->amount .'<br/>';
    // }

    // foo($invoice_collection);
    // foo([1,2,3,4]);
    // function foo(iterable $iterable){
    //     foreach( $iterable as $i => $value){
    //         echo $i .'<br/>';
    //     }
    // }
    /** END OF ITERABLE */
    
    /**  DATETIME */
    // $date_time = new \App\DateTime\DateTime();
    // var_dump(new DateTime(date('M-d-Y')));
    // var_dump(new DateTime());
    // var_dump(new DateTime('tomorrow 3:35pm'));
    // var_dump(new DateTime('yesterday noon'));
    // var_dump(new DateTime('01/23/2023 5:52PM'));
    /** CREATE FROM FORMAT */
    // $date = '01/23/2023';
    // $datetime = new DateTime(str_replace('/','.',$date));
    // $datetime = DateTime::createFromFormat('d/m/Y',$date);

    // var_dump($datetime);


    // echo $datetime->format('Y-m-d H:i:s A');
    // $datetime->setTimezone(new DateTimeZone('Europe/Amsterdam'));
    // echo '<br/>';
    // echo $datetime->format('Y-m-d H:i:s A');
    // $datetime->setTimezone(new DateTimeZone('America/Los_Angeles'));
    // $datetime->setDate(2023,4,5)->setTime(2,15);
    // echo $datetime->format('Y-m-d H:i:s A');

// echo $date_time->showDateTime();

/** END OF DATE TIME  */

/** ERROR HANDLING 
 * 
 * 
 * $error_handling = new ErrorHandling(new \App\ErrorHandling\Customer()) ;
** // try {
** //  $error_handling->process(5);

** // } catch (\App\ErrorHandling\Exception\MissingBillingException | \InvalidArgumentException  $e ) {
**  echo 'NAOL EXCEPTION'. $e->getMessage();
** // }finally{
** //     echo 'SHEEEESH';
** // }

 */

 /** END OF ERROR HANDLING */
/** CLONE OBJECT */

//  __clone()
/** CONSTRUCT IS NOT CALLED AGAIN WHEN AN OBJECT WITH CONSTRUCT IS CALLED */
// $invoice1 = new \App\Traits\Invoice(100,'Description1');
// 
// $invoice2 = clone $invoice1;

// var_dump($invoice1,$invoice2,uniqid('invoice_'));
/** END OF CLONE OBJECT */

/** OBJECT COMPARISON */
// $invoice1 = new \App\Traits\Invoice(100,'Description1');
// $invoice2 = new \App\Traits\Invoice(100,'Description1');
// $invoice3 = $invoice1;
// var_dump($invoice1 == $invoice2);
// echo '<br/>';
// var_dump($invoice1 === $invoice2);
// echo '<br/>';
// var_dump($invoice1 === $invoice3);
/** END OF OBJECT COMPARISON */

// $customer = new \App\Traits\Customer();
// $customer->updateProfile();

// $invoice = new \App\Traits\Invoice();
// $invoice->process();
/** 
 * Interface is good if you want to implement the functions with a different process or logic 
 */

 /** TRAIT RULES
 * #1 YOU CANNOT INSTANTIATE OBJECT OF TRAIT
 * #2 YOU ARE ABLE TO REDEFINE THE METHOD THAT IS DEFINED IN THE TRAIT IF THE CLASS THAT USES TRAIT DEFINES THE SAME METHOD THEN CLASS USE THE TRAIT WITH THE SAME NAME 
 *  WILL BE USED INSTEAD OF THE METHOD IN THE TRAIT
 *   HOW TRAIT WORKS
 *   - IT LIKE COPY AND PASTE TAKES THE CODE WRITTEN IN THE TRAIT FILE AND PASTE IN THE TRAIT IN COMPILE TIME
 */
// $coffee_maker = new \App\Traits\CoffeeMaker();
// $coffee_maker->makeCoffee();
// echo '<br/>';

// $latte_maker = new \App\Traits\LatteMaker();
// $latte_maker->makeCoffee();
// echo '<br/>';
// $latte_maker->makeLatte();
// echo '<br/>';
// $latte_maker::foo();
// echo '<br/>';
// echo $latte_maker::$x;
// echo '<br/>';

// $cappuccino_maker = new \App\Traits\CapuccinoMaker();
// $cappuccino_maker->makeCoffee();
// echo '<br/>';
// $cappuccino_maker->makeCapuccino();
// echo '<br/>';

// $all_in_one_maker = new \App\Traits\AllInOneCoffeeMaker();
// $all_in_one_maker->makeCoffee();
// $all_in_one_maker->setMilkType('all-in-one-maker');
// echo '<br/>';
// $all_in_one_maker->makeCapuccino();
// echo '<br/>';
// $all_in_one_maker->makeLatte();
// echo '<br/>';
/** final keyword on a method excepts in traits means it cannot be override */
/** TRAIT USED FOR CODE REUSING */
// $all_in_one_maker->makeFakeLatte();
// echo '<br/>';
/** MAGIC METHODS */
// $invoice = new Invoice();
/**
 * :: CALLED AS SCOPE RESOLUTION OPERATOR
 */
// $class_a = new ClassA();
// $class_b = new ClassB();

// echo $class_a->getName().PHP_EOL;
// echo $class_b->getName().PHP_EOL;
// echo \App\LateStaticBinding\ClassA::getName();
// echo \App\LateStaticBinding\ClassB::getName();
// var_dump(\App\LateStaticBinding\ClassB::make());

/** __get DYNAMICALLY CREATE PROPERTY IF IT DOENST EXISTS */
// var_dump($invoice->amount);
/** END OF __get */

// var_dump(isset($invoice->amount));
// unset($invoice->amount);
// var_dump(isset($invoice->amount));
// var_dump($invoice->amount = 15);
// var_dump($invoice->amount);
/** __CALL AND __CALLSTATIC */
// App\MagicMethod\Invoice::process();
// $invoice->process(200,'Amouint to brodie');
// var_dump($invoice->shit());



// $collector = new \App\InterfacePractice\CollectionAgency();
// $collector = new \App\Service\DebtCollectionService();

// echo $collector->collectDebt(new \App\InterfacePractice\CollectionAgency()) . PHP_EOL; 
// echo $collector->collectDebt(new \App\InterfacePractice\RockyDebtCollector()) . PHP_EOL; 
// echo $collector->collectDebt(new \App\InterfacePractice\CollectionAgency()) . PHP_EOL; 
// $fields = [
//     // new \App\AbstractPractice\Field('baseField'),
//     // new \App\AbstractPractice\Boolean('baseBoolean'),
//     new \App\AbstractPractice\Radio('baseRadio'),
//     new \App\AbstractPractice\Text('baseText'),
//     new \App\AbstractPractice\Checkbox('baseCheckbox')
// ];

// foreach($fields as $field){
//     echo $field->render() .'<br/>';
// }
// $toaster = new Toaster();
// $toaster_pro = new ToasterPro();
// echo $toaster->addSlice('bread');
// echo $toaster->addSlice('bread');
// echo $toaster->addSlice('bread');
// echo $toaster_pro->addSlice('bagel');
// echo $toaster_pro->addSlice('bagel');
// echo $toaster_pro->addSlice('bagel');
// echo $toaster_pro->addSlice('bagel');
// echo $toaster_pro->addSlice('bagel');
// echo $toaster->toast();
// echo $toaster_pro->toastBagel();



// use App\PaymentGateway\Stripe\Transaction;

// $shit = new PG\CustomerProfile();
// $shit1 = new PG\Transaction();
// $paddle = new PaddleTransaction();
// $stripe = new StripeTransaction('Kevin','kevinmensah114@gmail.com','2023-01-1999');
// echo $paddle->getAmount();
// $paddle->setAmount(100);
// echo '<br/>';
// echo $paddle->getAmount();

// $paddle->setStatus(Status::PAID);
// var_dump(PaddleTransaction::$count);
// var_dump($stripe->getName());

// $shit2 = new Transaction();
// var_dump($shit2);

/** ACCESS CONSTANTS IN CLASS */
// echo PaddleTransaction::STATUS_PAID;
/** GET FULLY QUALIFIED CLASS DIRECTORY WITH NAME */
// echo PaddleTransaction::class;
// echo $paddle::class;

// var_dump($shit);
// var_dump($shit, $shit1, $shit2);

// $parentDir = dirname(dirname(__DIR__));

// Go up another directory
// $rootDir = dirname($parentDir);
// echo $parentDir.'<br />';
// echo $rootDir.'/vendor/autoload.php';
// $id  = new \Ramsey\Uuid\UuidFactory();
// echo $id->uuid4();
// var_dump(  '../vendor/autoload.php');