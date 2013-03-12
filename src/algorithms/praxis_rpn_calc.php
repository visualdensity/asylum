<?php
/**
 * RPN Calculator
 *
 * Implement an RPN calculator that takes an expression like `19 2.14 + 4.5 2 4.3 / - *`
 * which is usually expressed as (19 + 2.14) * (4.5 - 2 / 4.3) and responds with 
 * 85.2974. The program should read expressions from standard input and print the 
 * top of the stack to standard output when a newline is encountered. The program 
 * should retain the state of the operand stack between expressions.
 *
 * http://programmingpraxis.com/2009/02/19/rpn-calculator/
 *
 * @note: WIP
 */


function rpn($expression)
{
    preg_match_all('/[0-9\.]+/', $expression, $numberMatches);
    preg_match_all('/[+\/*-]+/', $expression, $operandMatches);

    $numbers  = $numberMatches[0];
    $operands = $operandMatches[0];

    $nCount = sizeof($numbers);
    $oCount = sizeof($operands);

    if($nCount-1 != $oCount) {
        throw Exception('Please ensure that number of operands matches the numbers');
        exit;
    }

    $parsedExpr = '';

    for( $i=0; $i < $nCount; $i++ ) {
        $parsedExpr .= $numbers[$i] . ' ';
        if( $i != $oCount-1 ) {
            $parsedExpr .= $operands[$i] . ' ';
        }
    }

    print_r($numbers);
    print_r($operands);
    print_r($parsedExpr);
}

$expression = "19 2.14 + 4.5 2 4.3 / - *";
rpn($expression); 
