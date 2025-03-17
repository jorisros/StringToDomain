<?php
/**
 * Use my own name as string because i am a modest guy
 */
use JorisRos\ConvertStringToDomain\ConvertStringToDomain;

require_once(__DIR__ . '/../vendor/autoload.php');

class ConvertStringToDomainTest extends \PHPUnit\Framework\TestCase
{

    public function testCheckCapitals()
    {
        $this->assertEquals(ConvertStringToDomain::convert('JorisRos'), 'jorisros');
        $this->assertEquals(ConvertStringToDomain::convert('https://jorisros.nl'), 'jorisrosnl');
    }

    public function testCheckEmoticons()
    {
        $this->assertEquals(ConvertStringToDomain::convert('Joris ❤'), 'joris');
        $this->assertEquals(ConvertStringToDomain::convert('❤'), '');

    }

    public function testSpecialCharacters()
    {
        $this->assertEquals(ConvertStringToDomain::convert("joris/ros"), 'jorisros');
        $this->assertEquals(ConvertStringToDomain::convert("joris.ros"), 'jorisros');
        $this->assertEquals(ConvertStringToDomain::convert("joris ros"), 'jorisros');
        $this->assertEquals(ConvertStringToDomain::convert("Joris Ros"), 'jorisros');
        $this->assertEquals(ConvertStringToDomain::convert("Joris/Ros"), 'jorisros');
        $this->assertEquals(ConvertStringToDomain::convert("Joris (Ros)"), 'jorisros');
        $this->assertEquals(ConvertStringToDomain::convert("Joris ros"), 'jorisros');

    }
}
