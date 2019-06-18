<?php
/**
 * Created by PhpStorm.
 * User: dpaz
 * Date: 4/16/19
 * Time: 12:29 PM
 */

include('vendor/autoload.php');

try {

    if(empty($argv[1])) {

        throw new Exception('UIN must be specified');
    }

    if(empty($argv[2])) {

        throw new Exception('Term must be specified');
    }

    print_r(
        \App\Controller\AITS_Student_Enrollment::getStudentEnrollment(
            $argv[1],
            $argv[2]
        )
    );

} catch (\Exception $e) {

    print_r($e->getMessage());
    echo PHP_EOL;

}