<?php
/*
 * This file is part of the Arvelid package.
 * (c) Michael M Langitan <michaelmlangitan@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Arvelid\RandomCharacter;

class AbstractCharacter
{
    abstract public function getName(): string ;
    abstract public function compile(Compiler $compiler): void ;
}