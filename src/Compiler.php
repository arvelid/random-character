<?php
/*
 * This file is part of the Arvelid package.
 * (c) Michael M Langitan <michaelmlangitan@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Arvelid\RandomCharacter;

use function strlen;

class Compiler
{
    private $text;

    public function __construct(string $prefix = '')
    {
        $this->text = $prefix;
    }

    public function write($texts)
    {
        foreach ((array) $texts as $text) {
            $this->text .= $text;
        }
    }

    public function getLength(): int
    {
        return strlen($this->text);
    }

    public function __toString()
    {
        return (string) $this->text;
    }
}