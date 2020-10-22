<?php
/*
 * This file is part of the Arvelid package.
 * (c) Michael M Langitan <michaelmlangitan@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Arvelid\RandomCharacter\Character;

use Arvelid\RandomCharacter\AbstractCharacter;
use Arvelid\RandomCharacter\Compiler;

class Uppercase extends AbstractCharacter
{
    public function getName(): string
    {
        return 'uppercase';
    }

    public function compile(Compiler $compiler): void
    {
        $compiler->write('ABCDEFGHIJKLMNOPQRSTUVWXYZ');
    }
}