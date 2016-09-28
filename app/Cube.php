<?php

namespace App;

use InvalidArgumentException;

class Cube
{
    private $cube;
    private $size;

    public function __construct($size)
    {
        $this->validateInteger($size);
        $this->validateBounds($size, 1, 100);

        $this->size = $size;
        $this->fillCube();
    }

    /**
     * Fill value of all block of the cube with zeros.
     */
    private function fillCube()
    {
        for ($i = 0; $i < $this->size; ++$i) {
            for ($j = 0; $j < $this->size; ++$j) {
                for ($k = 0; $k < $this->size; ++$k) {
                    $this->cube[$i][$j][$k] = 0;
                }
            }
        }
    }

    /**
     * Updates the value of block (x,y,z) to W.
     *
     * @param int $x X coordinate
     * @param int $y X coordinate
     * @param int $z X coordinate
     * @param int $w Value to set in the block
     */
    public function update($x, $y, $z, $w)
    {
        $this->validateInteger($x, $y, $z, $w);
        $this->validateBounds($x, 1, $this->size);
        $this->validateBounds($y, 1, $this->size);
        $this->validateBounds($z, 1, $this->size);
        $this->validateBounds($w, -pow(10, 9), pow(10, 9));

        $this->cube[$x - 1][$y - 1][$z - 1] = $w;
    }

    /**
     * calculates the sum of the value of blocks whose
     * x coordinate is between x1 and x2 (inclusive),
     * y coordinate between y1 and y2 (inclusive)
     * and z coordinate between z1 and z2 (inclusive).
     *
     * @param int $x1 X initial coordinate
     * @param int $y1 Y initial coordinate
     * @param int $z1 Z initial coordinate
     * @param int $x2 X final coordinate
     * @param int $y2 Y final coordinate
     * @param int $z2 Z final coordinate
     *
     * @return int The sum of the values of blocks
     */
    public function query($x1, $y1, $z1, $x2, $y2, $z2)
    {
        $this->validateInteger($x1, $y1, $z1, $x2, $y2, $z2);
        $this->validateBounds($x1, 1, $this->size);
        $this->validateBounds($y1, 1, $this->size);
        $this->validateBounds($z1, 1, $this->size);
        $this->validateBounds($x2, $x1, $this->size);
        $this->validateBounds($y2, $y1, $this->size);
        $this->validateBounds($z2, $z1, $this->size);

        $sum = 0;
        for ($i = $x1 - 1; $i < $x2; ++$i) {
            for ($j = $y1 - 1; $j < $y2; ++$j) {
                for ($k = $z1 - 1; $k < $z2; ++$k) {
                    $sum += $this->cube[$i][$j][$k];
                }
            }
        }

        return $sum;
    }

    /**
     * Validates if all the arguments passed are of type 'integers'.
     *
     * @throws InvalidArgumentException if any of the provided arguments
     *                                  is not of type 'integer'
     */
    private function validateInteger()
    {
        $args = func_get_args();
        foreach ($args as $value) {
            if (!is_int($value)) {
                throw new InvalidArgumentException("$value must be an integer");
            }
        }
    }

    /**
     * Validates if the $value is in range of $min to $max.
     *
     * @param int $value Value to be evaluated
     * @param int $min   Upper range value
     * @param int $max   Lower range value
     *
     * @throws InvalidArgumentException if $value is out of range of $min to $max
     */
    private function validateBounds($value, $min, $max)
    {
        if ($value < $min || $value > $max) {
            throw new InvalidArgumentException("$value is out of valid range");
        }
    }
}
