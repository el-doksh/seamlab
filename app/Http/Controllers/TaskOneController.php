<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskOneController extends Controller
{
    /**
     * count all numbers between two integers except number with a 5 in it
     * @param int $start
     * @param int $end
     * @return int
     */
    public function count_numbers(int $start, int $end)
    {
        $counter = 0;
        for ($start; $start <= $end ; $start++) { 
            //check if the number doesn't include 5 then add 1 to counter
            if ( !preg_match('~(5)~', $start) ) {
                $counter++;
            }
        }
        return $counter;
    }

    /**
     * get string index for an string input as per letters sequence
     * @param string $input_string
     * @return int
     */
    public function string_index(string $input_string)
    {
        $letters = [
            'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 
            'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'
        ];
        // capitalize all letters to be matched with letters array
        $input_string = strtoupper($input_string);
        //convert input string to array
        $string_to_array = str_split($input_string);
        //reverse order array 
        $string_to_array = array_reverse($string_to_array);

        $output = 0;
        for ($i = 0 ; $i < count($string_to_array) ; $i++) {
            //calculate output number index for each character
            $output += ( count($letters) ** $i ) * ( array_search($string_to_array[$i], $letters)+1 );
        }
        return $output;
    }

    /**
     * count steps to reduce each element in given array to zero as per two rules
     * @param array $Q 
     * @param int $N
     * @return array
     */
    public function steps_count(Request $request)
    {
        $Q = $request->Q;
        $N = $request->N;

        // 1: If we take 2 integers a and b where (X == a * b)
        // And (a != 1, b != 1) then we can change
        // X = max (a, b)
        // 2: Decrease the value of X by 1.

        $output = [];
        for ( $i = 0 ; $i < $N ; $i++) { 
            $steps = 0;
            $output[] = $this->reduce_steps($Q[$i], $steps);
        }
        return $output;

        // 3
        // 3 > 2 > 1 > 0 // 3 steps

        // 4
        // 4 > 2 > 1 > 0 // 3 steps

        // 20
        // 20 > 10 > 5 > 4 > 2 > 1 > 0   // 6 steps
        // 20 > 5 > 4 > 2 > 1 > 0        // 5 steps

        // 100
        // 100 > 50 > 25 > 5 > 4 > 2 > 1 > 0   // 7 steps 
        // 100 > 10 > 5 > 4 > 2 > 1 > 0        // 6 steps 
    }

    private function reduce_steps(int $number, int $steps )
    {
        do {
            // if ( $this->is_prime_number($number) ) {
                //decrease current number by 1
                --$number;
            // } else {
                // get max number of two multiply integers
            //     // 
            // }
            $steps++;
        } while ($number > 0);
        // if($number == 0)
        
        return $steps;
    }

    /**
     * check the given number is prime or not
     * @param int $num
     * @return bool
     */
    private function is_prime_number(int $number)
    {
        if ($number == 1) {
            return false;
        }
        for ($i = 2; $i <= $number/2; $i++) {
            if ($number % $i == 0) {
                return false;
            }
        }
        return true;
    }
}
