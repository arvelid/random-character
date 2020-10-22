<?php
/*
 * This file is part of the Arvelid package.
 * (c) Michael M Langitan <michaelmlangitan@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Arvelid\RandomCharacter;

use Arvelid\RandomCharacter\AbstractCharacter;
use Arvelid\RandomCharacter\Character\Lowercase;
use Arvelid\RandomCharacter\Character\Number;
use Arvelid\RandomCharacter\Compiler;
use RuntimeException;
use function count;
use function max;
use function mt_rand;

class RandomCharacter
{
    /**
     * @var AbstractCharacter[]
     */
    private $chars;

    public function __construct(array $chars = [])
    {
        $this->resetChars(empty($chars) ? [
            new Number(),
            new Lowercase()
        ] : $chars);
    }

    public function setChar(AbstractCharacter $char)
    {
        $this->chars[$char->getName()] = $char;
    }

    public function hasChar(string $name): bool
    {
        return isset($this->chars[$name]);
    }

    public function removeChar(string $name)
    {
        unset($this->chars[$name]);
    }

    public function resetChars(array $chars)
    {
        $this->chars = [];

        foreach ($chars as $char) {
            $this->setChar($char);
        }
    }

    public function generate(int $length = 10, string $prefix = ''): string
    {
        if (count($this->chars)) {
            $characters = new Compiler();

            foreach ($this->chars as $char) {
                $char->compile($characters);
            }

            $maxRand = max($characters->getLength() - 1, 0);
            $characters = (string) $characters;
            $randomCharacter = new Compiler($prefix);

            for($x=0; $x<$length; $x++) {
                $randomCharacter->write($characters[mt_rand(0, $maxRand)]);
            }

            return (string) $randomCharacter;
        }

        throw new \RuntimeException('One or more types of characters is expected.');
    }
}