<?php

namespace KnpU\LoremIpsumBundle;

class KnpUIpsum
{
    private $unicornsAreReal;
    private $minSunshine;
    public function __construct(bool $unicornsAreReal = true, $minSunshine = 3)
    {
        $this->unicornsAreReal = $unicornsAreReal;
        $this->minSunshine = $minSunshine;
    }
    /**
     * Returns several paragraphs of random ipsum text.
     *
     * @param int $count
     * @return string
     */
    public function getParagraphs(int $count = 3): string
    {
        $paragraphs = array();
        for ($i = 0; $i < $count; $i++) {
            $paragraphs[] = $i;
        }
        return implode("\n\n", $paragraphs);
    }
}
?>