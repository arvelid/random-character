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

class Custom extends AbstractCharacter
{
    private $characters;

    public function __construct(string $custom = '#$@|.&*_-*+/%')
    {
        $this->characters = $custom;
    }

    public function getName(): string
    {
        return 'special';
    }

    public function compile(Compiler $compiler): void
    {
        $compiler->write($this->characters);
    }
}